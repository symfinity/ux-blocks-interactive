import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['input', 'list', 'item'];

    static values = {
        commandsUrl: String,
        placeholder: { type: String, default: 'Search…' },
        openHotkey: { type: String, default: 'k' },
        fallbackCommands: { type: Array, default: [] },
        emptyLabel: { type: String, default: 'No matching commands' },
        loadingLabel: { type: String, default: 'Loading commands' },
        failureLabel: { type: String, default: 'Could not load commands' },
    };

    connect() {
        this._commands = [];
        this._requestSeq = 0;
        this._selectedIndex = -1;
        this._opener = null;
        this._debounce = null;
        this._onKeydown = this._onKeydown.bind(this);
        this._onOpen = () => this.open();
        this._onBackdropClick = (event) => {
            if (event.target === this.element) {
                this.close();
            }
        };
        document.addEventListener('keydown', this._onKeydown);
        this.element.addEventListener('command-palette:open', this._onOpen);
        this.element.addEventListener('click', this._onBackdropClick);

        if (this.hasInputTarget) {
            this.inputTarget.placeholder = this.placeholderValue;
            this.inputTarget.addEventListener('input', () => this._onInput());
        }

        this._ensureListbox();
        this._seedFallback();
    }

    disconnect() {
        document.removeEventListener('keydown', this._onKeydown);
        this.element.removeEventListener('command-palette:open', this._onOpen);
        this.element.removeEventListener('click', this._onBackdropClick);
        window.clearTimeout(this._debounce);
    }

    open(event) {
        event?.preventDefault();
        this._opener = document.activeElement;
        this.element.hidden = false;
        this._syncExpanded(true);
        this.commandsUrlValue && this._fetchCommands();
        if (this.hasInputTarget) {
            this.inputTarget.focus();
            this.inputTarget.select();
        }
    }

    close() {
        this.element.hidden = true;
        this._syncExpanded(false);
        window.clearTimeout(this._debounce);
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
        if (event.key === 'Tab') {
            this._trapTab(event);
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
        this._filterExisting();
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
        this._setStatus('loading');
        fetch(url.toString())
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Command search failed');
                }

                return response.json();
            })
            .then((data) => {
                if (seq !== this._requestSeq) {
                    return;
                }
                this._commands = Array.isArray(data?.commands) ? data.commands : [];
                this._renderDynamic();
            })
            .catch(() => {
                if (seq !== this._requestSeq) {
                    return;
                }
                this._setStatus('failure');
            });
    }

    _seedFallback() {
        if (this.commandsUrlValue || !this.hasListTarget || this.itemTargets.length > 0 || this.fallbackCommandsValue.length === 0) {
            return;
        }
        this._commands = this.fallbackCommandsValue;
        this._renderDynamic();
    }

    _filterExisting() {
        const query = (this.hasInputTarget ? this.inputTarget.value : '').toLowerCase().trim();
        const tokens = query === '' ? [] : query.split(/\s+/).filter(Boolean);
        let visible = 0;
        this.itemTargets.forEach((item) => {
            const haystack = (item.textContent || '').toLowerCase();
            const match = tokens.every((token) => haystack.includes(token));
            item.hidden = !match;
            if (!match) {
                item.removeAttribute('aria-selected');
            }
            if (match) {
                visible += 1;
            }
        });
        this._selectedIndex = -1;
        this._clearActiveDescendant();
        this._setStatus(visible === 0 ? 'empty' : null);
    }

    _move(delta) {
        const items = this.itemTargets.filter((item) => !item.hidden);
        if (items.length === 0) {
            return;
        }
        items.forEach((item) => item.removeAttribute('aria-selected'));
        const start = this._selectedIndex < 0 ? (delta > 0 ? -1 : 0) : this._selectedIndex;
        const next = (start + delta + items.length) % items.length;
        this._selectedIndex = next;
        const current = items[next];
        this._markOption(current, next);
        current.setAttribute('aria-selected', 'true');
        if (this.hasInputTarget) {
            this.inputTarget.setAttribute('aria-activedescendant', current.id);
        }
    }

    _activateSelected() {
        const visible = this.itemTargets.filter((entry) => !entry.hidden);
        const item = visible.find((entry) => entry.getAttribute('aria-selected') === 'true')
            || visible[0];
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
        this._clearActiveDescendant();
        if (this._commands.length === 0) {
            this._setStatus('empty');
            return;
        }

        this._commands.forEach((command, index) => {
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
            this._markOption(el, index);
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

    _ensureListbox() {
        if (this.hasListTarget) {
            if (!this.listTarget.id) {
                this.listTarget.id = `command-palette-list-${Math.random().toString(16).slice(2, 10)}`;
            }
            this.listTarget.setAttribute('role', 'listbox');
        }
        if (this.hasInputTarget) {
            this.inputTarget.setAttribute('role', 'combobox');
            this.inputTarget.setAttribute('aria-autocomplete', 'list');
            this.inputTarget.setAttribute('aria-expanded', this.element.hidden ? 'false' : 'true');
            if (this.hasListTarget) {
                this.inputTarget.setAttribute('aria-controls', this.listTarget.id);
            }
        }
        this.itemTargets.forEach((item, index) => this._markOption(item, index));
    }

    _markOption(el, index) {
        el.setAttribute('role', 'option');
        if (!el.id) {
            const prefix = this.hasListTarget && this.listTarget.id ? this.listTarget.id : 'command-palette';
            el.id = `${prefix}-option-${index}`;
        }
    }

    _syncExpanded(open) {
        if (!this.hasInputTarget) {
            return;
        }
        this.inputTarget.setAttribute('aria-expanded', open ? 'true' : 'false');
        if (!open) {
            this._clearActiveDescendant();
        }
    }

    _clearActiveDescendant() {
        if (this.hasInputTarget) {
            this.inputTarget.removeAttribute('aria-activedescendant');
        }
    }

    _setStatus(kind) {
        if (!this.hasListTarget) {
            return;
        }
        this.listTarget.querySelectorAll('[data-ui-part="status"]').forEach((node) => node.remove());
        if (kind === null) {
            return;
        }
        const labels = {
            empty: this.emptyLabelValue,
            loading: this.loadingLabelValue,
            failure: this.failureLabelValue,
        };
        const status = document.createElement('p');
        status.setAttribute('data-ui-part', 'status');
        status.setAttribute('data-ui-state', kind);
        status.setAttribute('role', 'status');
        status.textContent = labels[kind] ?? '';
        this.listTarget.appendChild(status);
    }

    _trapTab(event) {
        const focusable = [...this.element.querySelectorAll('a, button, input, textarea, select, [tabindex]')]
            .filter((node) => !node.hidden && node.getAttribute('tabindex') !== '-1');
        if (focusable.length === 0) {
            event.preventDefault();
            return;
        }
        const first = focusable[0];
        const last = focusable[focusable.length - 1];
        if (event.shiftKey && document.activeElement === first) {
            event.preventDefault();
            last.focus();
        } else if (!event.shiftKey && document.activeElement === last) {
            event.preventDefault();
            first.focus();
        }
    }
}
