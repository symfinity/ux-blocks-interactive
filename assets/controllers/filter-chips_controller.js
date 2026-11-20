import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['chip', 'input'];

    connect() {
        this.element.setAttribute('role', 'list');
    }

    removeChip(event) {
        event.preventDefault();
        event.stopPropagation();

        const button = event.currentTarget;
        const chip = this.chipTargets.find((el) => el.contains(button));

        if (!chip) {
            return;
        }

        const label = (chip.textContent || '').replace(/×\s*$/, '').trim();
        const value = chip.dataset.value ?? null;
        chip.remove();

        this.element.dispatchEvent(
            new CustomEvent('ux-blocks-interactive:filter-chips-remove', {
                bubbles: true,
                detail: { label, value },
            }),
        );
    }
}
