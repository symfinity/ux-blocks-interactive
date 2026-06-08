# `combobox`

- **Twig:** `<twig:Combobox />`
- **Fragment:** `blocks.int.combobox`
- **Stimulus:** `symfony--ux-blocks-interactive--combobox`
- **Interaction:** stl
- **A11y pattern:** `aria-activedescendant` on the combobox input when the listbox is open (see [a11y-listbox-hardening](../../../../../specs/symfinity/symfinity/046-ux-blocks-interactive-r2/contracts/a11y-listbox-hardening.md))

## Creatable mode (046)

Set `creatable: true` to commit free-text on Enter when no option is active. Optional `preventDuplicates` (default `true`) blocks duplicate labels.

```twig
<twig:Combobox :creatable="true" placeholder="Search or create…" />
```

Dispatches `ux-blocks-interactive:combobox-create` with `{ label, value }` detail.

See templates under `templates/components/` and the package README component table.
