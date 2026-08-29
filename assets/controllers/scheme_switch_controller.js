import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {
        scheme: String,
        endpoint: String,
        colorScheme: String,
    };

    connect() {
        this.syncChromeState();
    }

    toggle(event) {
        const input = event.currentTarget;
        this.syncChromeState();
        const scheme = input.checked ? 'dark' : 'light';
        if (!this.endpointValue) {
            this.fallbackNavigate(input);
            return;
        }

        fetch(this.endpointValue, {
            method: 'PATCH',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
            },
            body: JSON.stringify({ scheme }),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('scheme update failed');
                }

                return response.json();
            })
            .then((payload) => this.apply(payload))
            .catch(() => {
                this.fallbackNavigate(input);
            });
    }

    apply(payload) {
        const style = document.getElementById('ui-kernel-theme-css');
        if (style && payload.css) {
            style.textContent = payload.css;
        }

        if (payload.themeId) {
            document.documentElement.dataset.theme = payload.themeId;
        }

        if (payload.colorScheme === 'light' || payload.colorScheme === 'dark') {
            document.documentElement.dataset.scheme = payload.colorScheme;
            document.documentElement.style.colorScheme = payload.colorScheme;
            this.element.checked = payload.colorScheme === 'dark';
            this.colorSchemeValue = payload.colorScheme;
            this.syncChromeState();
        }

        if (typeof payload.scheme === 'string') {
            this.schemeValue = payload.scheme;
        }
    }

    fallbackNavigate(input) {
        const scheme = input.checked ? 'dark' : 'light';
        const url =
            scheme === 'dark' ? input.dataset.schemeDarkUrl : input.dataset.schemeLightUrl;
        if (url) {
            window.location.href = url;
            return;
        }

        input.checked = this.colorSchemeValue === 'dark';
        this.syncChromeState();
    }

    syncChromeState() {
        const chrome = this.element.closest('[data-ui-part="scheme-switch-chrome"]');
        if (!chrome) {
            return;
        }

        chrome.dataset.schemeSwitchState = this.element.checked ? 'dark' : 'light';
    }
}
