import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['layout'];

    connect() {
        this._layout = this.hasLayoutTarget
            ? this.layoutTarget
            : this.element.querySelector('[data-ui-part="masonry-layout"]');
        if (!this._layout) {
            return;
        }

        this._debounceTimer = null;
        this._relayout = this._relayout.bind(this);
        this._scheduleRelayout = this._scheduleRelayout.bind(this);

        this._resizeObserver = new ResizeObserver(this._scheduleRelayout);
        this._resizeObserver.observe(this.element);

        this._layout.querySelectorAll('img').forEach((img) => {
            if (img.complete) {
                return;
            }
            img.addEventListener('load', this._scheduleRelayout, { once: true });
        });

        this._relayout();
    }

    disconnect() {
        if (this._debounceTimer !== null) {
            clearTimeout(this._debounceTimer);
        }
        this._resizeObserver?.disconnect();

        if (!this._layout) {
            return;
        }

        Array.from(this._layout.children).forEach((child) => {
            if (child instanceof HTMLElement) {
                child.style.gridRowEnd = '';
            }
        });
    }

    _scheduleRelayout() {
        if (this._debounceTimer !== null) {
            clearTimeout(this._debounceTimer);
        }
        this._debounceTimer = window.setTimeout(this._relayout, 24);
    }

    _relayout() {
        if (!this._layout) {
            return;
        }

        const styles = getComputedStyle(this._layout);
        const gap = Number.parseFloat(styles.rowGap) || 0;
        const rowUnit = 1;

        Array.from(this._layout.children).forEach((child) => {
            if (!(child instanceof HTMLElement)) {
                return;
            }

            const height = child.offsetHeight;
            const span = Math.max(1, Math.ceil((height + gap) / (rowUnit + gap)));
            child.style.gridRowEnd = `span ${span}`;
        });
    }
}
