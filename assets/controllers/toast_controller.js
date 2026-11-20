import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['item'];

    static values = {
        stackLimit: { type: Number, default: 5 },
        duration: { type: Number, default: 4000 },
        dismissLabel: { type: String, default: 'Dismiss notification' },
    };

    show(event) {
        const params = event?.params ?? {};
        const detail = event?.detail ?? {};
        const message = params.message !== undefined ? params.message : detail.message;
        if (message === undefined || message === '') {
            return;
        }
        const variant = params.variant !== undefined ? params.variant : detail.variant;

        while (this.itemTargets.length >= this.stackLimitValue) {
            this.itemTargets[0].remove();
        }

        const el = document.createElement('div');
        el.setAttribute('data-ui-role', 'toast-item');
        el.setAttribute(`data-${this.identifier}-target`, 'item');
        if (variant === 'error') {
            el.setAttribute('role', 'alert');
            el.setAttribute('data-ui-variant', 'error');
        } else if (variant === 'success') {
            el.setAttribute('role', 'status');
            el.setAttribute('data-ui-variant', 'success');
        } else {
            el.setAttribute('role', 'status');
        }

        const body = document.createElement('div');
        body.setAttribute('data-ui-part', 'toast-body');

        const text = document.createElement('span');
        text.setAttribute('data-ui-part', 'content');
        text.textContent = message;
        body.appendChild(text);

        const dismiss = document.createElement('button');
        dismiss.type = 'button';
        dismiss.setAttribute('data-ui-part', 'dismiss');
        dismiss.setAttribute('aria-label', this.dismissLabelValue);
        dismiss.textContent = '×';
        dismiss.addEventListener('click', () => this.dismissItem(el));
        body.appendChild(dismiss);
        el.appendChild(body);

        this.element.appendChild(el);

        if (this.durationValue > 0) {
            window.setTimeout(() => this.dismissItem(el), this.durationValue);
        }
    }

    dismiss(event) {
        const item = event.currentTarget.closest('[data-ui-role="toast-item"]');
        if (item) {
            this.dismissItem(item);
        }
    }

    dismissItem(item) {
        if (item.isConnected) {
            item.remove();
        }
    }
}
