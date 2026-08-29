import { Controller } from '@hotwired/stimulus';

function stackSizeForChildCount(count) {
    if (count <= 4) {
        return 'small';
    }
    if (count <= 8) {
        return 'medium';
    }

    return 'large';
}

export default class extends Controller {
    connect() {
        this._onClick = this._onClick.bind(this);
        this._triggerButton = null;
        this._hiddenBoxes = [];
        this.element.addEventListener('click', this._onClick);
    }

    disconnect() {
        this.element.removeEventListener('click', this._onClick);
        this._closeAllDrills();
    }

    _onClick(event) {
        const openButton = event.target.closest('[data-ui-action="bento-drill-open"]');
        if (openButton) {
            event.preventDefault();
            this._openDrill(openButton);

            return;
        }

        const backButton = event.target.closest('[data-ui-action="bento-drill-back"]');
        if (backButton) {
            event.preventDefault();
            this._closeDrill();
        }
    }

    _openDrill(button) {
        const sourceBox = button.closest('[data-ui-role="bento-box-panel-box"]');
        if (!sourceBox) {
            return;
        }

        const column = sourceBox.dataset.uiColumn;
        const label = button.dataset.uiDrillLabel;
        const children = JSON.parse(button.dataset.uiDrillChildren || '[]');
        if (!column || !label || !Array.isArray(children) || children.length === 0) {
            return;
        }

        this._closeAllDrills();

        const columnBoxes = this._boxesInColumn(column);
        columnBoxes.forEach((box) => {
            box.hidden = true;
        });
        this._hiddenBoxes = columnBoxes;
        this._triggerButton = button;

        const stack = this._buildStack(column, label, children);
        const columnHost = sourceBox.closest('[data-ui-part="bento-box-panel-column"]');
        if (columnHost) {
            columnHost.appendChild(stack);
        } else {
            sourceBox.insertAdjacentElement('afterend', stack);
        }
        stack.hidden = false;
        stack.querySelector('[data-ui-action="bento-drill-back"]')?.focus();
    }

    _closeDrill() {
        const trigger = this._triggerButton;
        this._closeAllDrills();

        if (trigger) {
            trigger.focus();
            this._triggerButton = null;
        }
    }

    _closeAllDrills() {
        this.element
            .querySelectorAll('[data-ui-role="bento-box-panel-box"][data-ui-drill-stack="active"]')
            .forEach((stack) => {
                stack.remove();
            });
        this._restoreColumn();
    }

    _restoreColumn() {
        this._hiddenBoxes.forEach((box) => {
            box.hidden = false;
        });
        this._hiddenBoxes = [];
    }

    _boxesInColumn(column) {
        return Array.from(
            this.element.querySelectorAll(`[data-ui-role="bento-box-panel-box"][data-ui-column="${column}"]:not([data-ui-drill-stack="active"])`),
        );
    }

    _buildStack(column, label, children) {
        const template = this.element.querySelector('[data-ui-part="drill-stack-shell"]');
        const stack = template
            ? template.content.firstElementChild.cloneNode(true)
            : document.createElement('div');

        stack.dataset.uiColumn = column;
        stack.dataset.uiBoxSize = stackSizeForChildCount(children.length);
        stack.dataset.uiBoxLayout = 'vertical';
        stack.hidden = false;

        const heading = stack.querySelector('[data-ui-part="bento-box-panel-heading"]');
        if (heading) {
            heading.textContent = label;
        }

        const list = stack.querySelector('[data-ui-part="bento-box-panel-links"]');
        if (list) {
            list.replaceChildren();
            children.forEach((child) => {
                const item = document.createElement('li');
                const link = document.createElement('a');
                link.href = child.href;
                link.textContent = child.label;
                item.appendChild(link);
                list.appendChild(item);
            });
        }

        return stack;
    }
}
