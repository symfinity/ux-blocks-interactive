import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['viewport', 'item'];

    connect() {
        this._onKeydown = this._onKeydown.bind(this);
        this.element.addEventListener('keydown', this._onKeydown);
        this._syncControls();
    }

    disconnect() {
        this.element.removeEventListener('keydown', this._onKeydown);
    }

    next() {
        this._scrollByStep(1);
    }

    prev() {
        this._scrollByStep(-1);
    }

    _scrollByStep(direction) {
        const vp = this.viewportTarget;
        const item = this.itemTargets[0];
        if (!item) {
            return;
        }

        const step = item.offsetWidth + this._gapPx(vp);
        const maxScroll = vp.scrollWidth - vp.clientWidth;
        const target = Math.max(0, Math.min(maxScroll, vp.scrollLeft + direction * step));

        vp.scrollTo({ left: target, behavior: 'smooth' });
        window.setTimeout(() => this._syncControls(), 300);
    }

    _gapPx(viewport) {
        const style = window.getComputedStyle(viewport);
        const gap = parseFloat(style.columnGap || style.gap || '0');

        return Number.isFinite(gap) ? gap : 0;
    }

    _syncControls() {
        const vp = this.viewportTarget;
        const atStart = vp.scrollLeft <= 1;
        const atEnd = vp.scrollLeft + vp.clientWidth >= vp.scrollWidth - 1;

        this.element.querySelectorAll('[data-carousel-action="prev"]').forEach((btn) => {
            btn.toggleAttribute('disabled', atStart);
            btn.setAttribute('aria-disabled', atStart ? 'true' : 'false');
        });
        this.element.querySelectorAll('[data-carousel-action="next"]').forEach((btn) => {
            btn.toggleAttribute('disabled', atEnd);
            btn.setAttribute('aria-disabled', atEnd ? 'true' : 'false');
        });
    }

    _onKeydown(event) {
        if (event.key === 'ArrowRight') {
            event.preventDefault();
            this.next();
        } else if (event.key === 'ArrowLeft') {
            event.preventDefault();
            this.prev();
        }
    }
}
