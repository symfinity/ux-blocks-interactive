# Tree View

Hierarchical list with expand/collapse and optional single selection.

**Fragment id:** `blocks.int.tree-view`  
**Stimulus:** `symfinity--ux-blocks-interactive--tree-view`

## When to use

File browsers, category pickers, and settings trees where parent nodes contain nested children. Prefer [Navigation Menu](navigation-menu.md) for site-wide mega-menus with links.

## Guidelines

**Do**

- Pass `nodes` as a nested array with stable string `id` and `label` keys.
- Set `expanded` to the list of open branch ids; use `selected` when `selectable` is true.
- Provide `label` on the root when multiple trees appear on one page.

**Don't**

- Deeply nest hundreds of nodes without lazy loading — set `lazyLoad` for async branches when implemented.
- Mix selection and navigation semantics without clear `selectable` intent.

## Usage

```twig
<twig:TreeView
    label="Project files"
    selectable="{{ true }}"
    selected="readme"
    expanded="{{ ['src', 'docs'] }}"
    :nodes="[
        { id: 'src', label: 'src', children: [
            { id: 'readme', label: 'README.md' }
        ]},
        { id: 'docs', label: 'docs', children: [] }
    ]"
/>
```

Keyboard: arrow keys rove focus; Enter/Space toggles expand or selects when `selectable` is enabled.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `nodes` | `list<array>` | `[]` | Tree nodes (`id`, `label`, optional `children`, `disabled`) |
| `expanded` | `list<string>` | `[]` | Branch ids shown open |
| `selected` | `string?` | `null` | Selected node id when `selectable` |
| `selectable` | `bool` | `false` | Enables selection semantics |
| `label` | `string?` | `null` | Accessible name for the tree |
| `lazyLoad` | `string?` | `null` | Hook for async child loading (app-specific) |

## Accessibility

- Root uses `role="tree"`; branches expose `aria-expanded`.
- Selected items set `aria-selected` when `selectable` is true.
- Disabled nodes use `aria-disabled="true"`.

## Related

- [Filter Chips](filter-chips.md) · [Sidebar](sidebar.md) · [Navigation Menu](navigation-menu.md)
