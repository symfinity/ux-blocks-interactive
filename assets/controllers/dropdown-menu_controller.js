import { Controller } from '@hotwired/stimulus';
import { applyRovingTabindex, rovingKeydown } from './shared/menu-roving.js';

export default class extends Controller {
    static targets = ['trigger', 'content', 'item'];

    connect() {
        this._activeIndex = 0;
        this._onContentToggle = this._onContentToggle.bind(this);
        this._onContentKeydown = this._onContentKeydown.bind(this);

        this.contentTargets.forEach((content) => {
            content.addEventListener('toggle', this._onContentToggle);
            content.addEventListener('keydown', this._onContentKeydown);
        });
    }

    disconnect() {
        this.contentTargets.forEach((content) => {
            content.removeEventListener('toggle', this._onContentToggle);
            content.removeEventListener('keydown', this._onContentKeydown);
        });
    }

    _onContentToggle(event) {
        const content = event.target;
        const trigger = this._triggerForContent(content);
        if (trigger) {
            trigger.setAttribute('aria-expanded', event.newState === 'open' ? 'true' : 'false');
        }

        if (event.newState !== 'open') {
            return;
        }

        const items = this.itemTargets.filter((element) => !element.disabled);
        if (items.length === 0) {
            return;
        }

        applyRovingTabindex(items, 0);
        this._activeIndex = 0;
    }

    _triggerForContent(content) {
        const id = content.id;
        if (id) {
            const matched = document.querySelector(`[popovertarget="${CSS.escape(id)}"]`);
            if (matched) {
                return matched;
            }
        }

        return this.hasTriggerTarget ? this.triggerTarget : null;
    }

    _onContentKeydown(event) {
        if (!event.target.matches(':popover-open')) {
            return;
        }

        const items = this.itemTargets.filter((element) => !element.disabled);
        const next = rovingKeydown(event, items, this._activeIndex, 'vertical');
        if (next !== this._activeIndex) {
            this._activeIndex = next;
            applyRovingTabindex(items, next);
        }
    }
}
