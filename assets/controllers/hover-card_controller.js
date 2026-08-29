import { Controller } from '@hotwired/stimulus';
import { uiZIndex } from './shared/kernel_tokens.js';

export default class extends Controller {
    static targets = ['trigger', 'content'];

    static values = {
        openDelay: { type: Number, default: 200 },
        closeDelay: { type: Number, default: 100 },
        nativeInterest: { type: Boolean, default: true },
    };

    connect() {
        if (this.usesNativeInterest()) {
            return;
        }

        this._open = false;
        this._openTimer = null;
        this._closeTimer = null;
        this._onEnter = this._scheduleOpen.bind(this);
        this._onLeave = this._scheduleClose.bind(this);

        if (this.hasTriggerTarget) {
            this.triggerTarget.addEventListener('mouseenter', this._onEnter);
            this.triggerTarget.addEventListener('mouseleave', this._onLeave);
            this.triggerTarget.addEventListener('focusin', this._onEnter);
            this.triggerTarget.addEventListener('focusout', this._onLeave);
        }

        if (this.hasContentTarget) {
            this.contentTarget.addEventListener('mouseenter', this._cancelClose.bind(this));
            this.contentTarget.addEventListener('mouseleave', this._onLeave);
        }
    }

    disconnect() {
        if (this.usesNativeInterest()) {
            return;
        }

        this._clearTimers();
        if (this.hasTriggerTarget) {
            this.triggerTarget.removeEventListener('mouseenter', this._onEnter);
            this.triggerTarget.removeEventListener('mouseleave', this._onLeave);
            this.triggerTarget.removeEventListener('focusin', this._onEnter);
            this.triggerTarget.removeEventListener('focusout', this._onLeave);
        }
        this.close();
    }

    usesNativeInterest() {
        if (!this.nativeInterestValue) {
            return false;
        }

        return typeof HTMLAnchorElement !== 'undefined'
            && 'interestForElement' in HTMLAnchorElement.prototype;
    }

    _scheduleOpen() {
        this._clearTimers();
        this._openTimer = window.setTimeout(() => this.open(), this.openDelayValue);
    }

    _scheduleClose() {
        this._clearTimers();
        this._closeTimer = window.setTimeout(() => this.close(), this.closeDelayValue);
    }

    _cancelClose() {
        if (this._closeTimer) {
            clearTimeout(this._closeTimer);
            this._closeTimer = null;
        }
    }

    open() {
        if (!this.hasContentTarget || this._open) {
            return;
        }

        this._open = true;
        const content = this.contentTarget;
        if (typeof content.showPopover === 'function') {
            content.showPopover();
        } else {
            content.hidden = false;
            content.style.position = 'absolute';
            content.style.zIndex = uiZIndex('popover');
            content.style.marginBlockStart = 'var(--ui-space-xs)';
        }

        if (this.hasTriggerTarget) {
            this.triggerTarget.setAttribute('aria-expanded', 'true');
        }
    }

    close() {
        if (!this._open || !this.hasContentTarget) {
            return;
        }

        this._open = false;
        const content = this.contentTarget;
        if (typeof content.hidePopover === 'function') {
            content.hidePopover();
        } else {
            content.hidden = true;
        }

        if (this.hasTriggerTarget) {
            this.triggerTarget.setAttribute('aria-expanded', 'false');
        }
    }

    _clearTimers() {
        if (this._openTimer) {
            clearTimeout(this._openTimer);
            this._openTimer = null;
        }
        if (this._closeTimer) {
            clearTimeout(this._closeTimer);
            this._closeTimer = null;
        }
    }
}
