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
        this._onKeydown = this._onKeydown.bind(this);
        this._onOpen = () => this.open();
        document.addEventListener('keydown', this._onKeydown);
        this.element.addEventListener('command-palette:open', this._onOpen);

        if (this.hasInputTarget) {
            this.inputTarget.placeholder = this.placeholderValue;
            this.inputTarget.addEventListener('input', () => this._filter());
        }

        if (this.commandsUrlValue) {
            fetch(this.commandsUrlValue)
                .then((r) => r.json())
                .then((data) => {
                    this._commands = Array.isArray(data.commands) ? data.commands : data;
                    this._renderDynamic();
                })
                .catch(() => {});
        } else if (this.fallbackCommandsValue.length > 0) {
            this._commands = this.fallbackCommandsValue;
            this._renderDynamic();
        }
    }

    disconnect() {
        document.removeEventListener('keydown', this._onKeydown);
        this.element.removeEventListener('command-palette:open', this._onOpen);
    }

    open(event) {
        event?.preventDefault();
        this.element.hidden = false;
        if (this.hasInputTarget) {
            this.inputTarget.focus();
            this.inputTarget.select();
        }
    }

    close() {
        this.element.hidden = true;
    }

    _onKeydown(event) {
        if ((event.metaKey || event.ctrlKey) && event.key === this.openHotkeyValue) {
            event.preventDefault();
            this.open(event);
        }
        if (event.key === 'Escape' && !this.element.hidden) {
            this.close();
        }
    }

    visit(event) {
        const url = event.currentTarget.dataset.url;
        if (url) {
            window.location.href = url;
        }
    }

    _filter() {
        const q = this.hasInputTarget ? this.inputTarget.value.toLowerCase().trim() : '';
        const tokens = q === '' ? [] : q.split(/\s+/).filter(Boolean);

        this.itemTargets.forEach((el) => {
            const haystack = [
                el.textContent || '',
                el.dataset.searchKeywords || '',
                el.dataset.searchCategory || '',
            ]
                .join(' ')
                .toLowerCase();

            el.hidden = tokens.length > 0 && !tokens.every((token) => haystack.includes(token));
        });
    }

    _renderDynamic() {
        if (!this.hasListTarget || this.itemTargets.length > 0) {
            return;
        }

        this.listTarget.innerHTML = '';
        this._commands.forEach((cmd) => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.setAttribute('data-ui-role', 'command-palette-item');
            btn.setAttribute('data-symfinity--ux-blocks-interactive--command-palette-target', 'item');
            btn.textContent = cmd.title || cmd.label || cmd.id || 'Command';
            if (cmd.category) {
                btn.dataset.searchCategory = cmd.category;
            }
            if (Array.isArray(cmd.keywords) && cmd.keywords.length > 0) {
                btn.dataset.searchKeywords = cmd.keywords.join(' ');
            }
            const url = cmd.url || cmd.handler?.url;
            if (url) {
                btn.dataset.url = url;
                btn.addEventListener('click', () => {
                    window.location.href = url;
                });
            }
            this.listTarget.appendChild(btn);
        });
    }
}
