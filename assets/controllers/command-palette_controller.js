import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['input', 'list', 'item'];

    static values = {
        commandsUrl: String,
        placeholder: { type: String, default: 'Search…' },
        openHotkey: { type: String, default: 'k' },
        fallbackCommands: { type: Array, default: [] },
    };

    connect() {
        this._commands = [];
        this._requestSeq = 0;
        this._selectedIndex = -1;
        this._opener = null;
        this._debounce = null;
        this._onKeydown = this._onKeydown.bind(this);
        this._onOpen = () => this.open();
        document.addEventListener('keydown', this._onKeydown);
        this.element.addEventListener('command-palette:open', this._onOpen);

        if (this.hasInputTarget) {
            this.inputTarget.placeholder = this.placeholderValue;
            this.inputTarget.addEventListener('input', () => this._onInput());
        }

        if (!this.commandsUrlValue && this.fallbackCommandsValue.length > 0) {
            this._commands = this.fallbackCommandsValue;
            this._renderDynamic();
        }
    }

    disconnect() {
        document.removeEventListener('keydown', this._onKeydown);
        this.element.removeEventListener('command-palette:open', this._onOpen);
        window.clearTimeout(this._debounce);
    }

    open(event) {
        event?.preventDefault();
        this._opener = document.activeElement;
        this.element.hidden = false;
        if (this.hasInputTarget) {
            this.inputTarget.focus();
            this.inputTarget.select();
        }
    }

    close() {
        this.element.hidden = true;
        if (this._opener instanceof HTMLElement) {
            this._opener.focus();
        }
    }

    _onKeydown(event) {
        if ((event.metaKey || event.ctrlKey) && event.key === this.openHotkeyValue) {
            event.preventDefault();
            this.open(event);
        }
        if (this.element.hidden) {
            return;
        }
        if (event.key === 'Escape') {
            event.preventDefault();
            this.close();
            return;
        }
        if (event.key === 'ArrowDown') {
            event.preventDefault();
            this._move(1);
            return;
        }
        if (event.key === 'ArrowUp') {
            event.preventDefault();
            this._move(-1);
            return;
        }
        if (event.key === 'Enter') {
            event.preventDefault();
            this._activateSelected();
        }
    }

    visit(event) {
        const url = event.currentTarget.dataset.url || event.currentTarget.getAttribute('href');
        if (url) {
            window.location.href = url;
        }
    }

    _onInput() {
        if (this.commandsUrlValue) {
            this._scheduleFetch();
            return;
        }
        this._filterFallback();
    }

    _scheduleFetch() {
        window.clearTimeout(this._debounce);
        this._debounce = window.setTimeout(() => this._fetchCommands(), 150);
    }

    _fetchCommands() {
        const query = this.hasInputTarget ? this.inputTarget.value : '';
        const seq = ++this._requestSeq;
        const url = new URL(this.commandsUrlValue, window.location.href);
        url.searchParams.set('q', query);
        fetch(url.toString())
            .then((response) => response.json())
            .then((data) => {
                if (seq !== this._requestSeq) {
                    return;
                }
                this._commands = Array.isArray(data?.commands) ? data.commands : [];
                this._renderDynamic();
            })
            .catch(() => {});
    }

    _filterFallback() {
        const query = (this.hasInputTarget ? this.inputTarget.value : '').toLowerCase().trim();
        const tokens = query === '' ? [] : query.split(/\s+/).filter(Boolean);
        this._commands = this.fallbackCommandsValue.filter((command) => {
            const haystack = [command.title, command.label, command.id, command.hint, ...(command.keywords || [])]
                .filter(Boolean)
                .join(' ')
                .toLowerCase();

            return tokens.every((token) => haystack.includes(token));
        });
        this._renderDynamic();
    }

    _move(delta) {
        const items = this.itemTargets;
        if (items.length === 0) {
            return;
        }
        if (this._selectedIndex >= 0 && items[this._selectedIndex]) {
            items[this._selectedIndex].removeAttribute('aria-selected');
        }
        const next = (this._selectedIndex + delta + items.length) % items.length;
        this._selectedIndex = next;
        items[next].setAttribute('aria-selected', 'true');
    }

    _activateSelected() {
        const item = this.itemTargets.find((entry) => entry.getAttribute('aria-selected') === 'true')
            || this.itemTargets[0];
        if (!item) {
            return;
        }
        const destination = item.href || item.dataset.url;
        if (destination) {
            window.location.href = destination;
        }
    }

    _renderDynamic() {
        if (!this.hasListTarget) {
            return;
        }

        this.listTarget.replaceChildren();
        this._selectedIndex = -1;
        if (this._commands.length === 0) {
            const empty = document.createElement('p');
            empty.setAttribute('data-ui-part', 'empty');
            empty.textContent = 'No matching commands';
            this.listTarget.appendChild(empty);
            return;
        }

        this._commands.forEach((command) => {
            const url = command.url || command.handler?.url;
            const el = url ? document.createElement('a') : document.createElement('button');
            if (url) {
                el.href = url;
                el.dataset.url = url;
            } else {
                el.type = 'button';
            }
            el.setAttribute('data-ui-role', 'command-palette-item');
            el.setAttribute('data-symfinity--ux-blocks-interactive--command-palette-target', 'item');
            const text = document.createElement('span');
            text.textContent = command.title || command.label || command.id || 'Command';
            el.appendChild(text);
            if (command.hint) {
                const hint = document.createElement('span');
                hint.setAttribute('data-ui-part', 'hint');
                hint.textContent = command.hint;
                el.appendChild(hint);
            }
            if (command.category) {
                el.dataset.searchCategory = command.category;
            }
            if (Array.isArray(command.keywords) && command.keywords.length > 0) {
                el.dataset.searchKeywords = command.keywords.join(' ');
            }
            if (url) {
                el.addEventListener('click', () => {
                    window.location.href = url;
                });
            }
            this.listTarget.appendChild(el);
        });
    }
}
