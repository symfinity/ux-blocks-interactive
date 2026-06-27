# Filter Chips

Removable filter tags for active search facets and multi-select narrowing.

**Fragment id:** `blocks.int.filter-chips`  
**Stimulus:** `symfinity--ux-blocks-interactive--filter-chips`

## When to use

Listing pages and data tables where users apply several filters and need to see and dismiss them quickly. Prefer plain [Badge](https://docs.symfinity.dev/ux-blocks-core/components/badge) when tags are read-only.

## Guidelines

**Do**

- Add one `FilterChips:Chip` per active filter with a readable label.
- Keep chip text short; use the remove control to clear individual facets.
- Mirror chip state in URL or form state when filters affect server results.

**Don't**

- Stack dozens of chips without a “Clear all” escape hatch elsewhere.
- Use chips for primary navigation — use links or tabs instead.

## Usage

```twig
<twig:FilterChips>
    <twig:FilterChips:Chip>Design</twig:FilterChips:Chip>
    <twig:FilterChips:Chip>Published</twig:FilterChips:Chip>
</twig:FilterChips>
```

Each chip includes a remove button; Stimulus removes the chip from the list on click.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| — | — | — | Root has no props; compose `FilterChips:Chip` children |

**FilterChips:Chip:** default slot for chip label text.

## Accessibility

- Remove buttons expose `aria-label="Remove"`.
- Chips use `role="listitem"` inside the chip list container.
- Announce filter changes to assistive tech when results update (app responsibility).

## Related

- [Toggle Group](toggle-group.md) · [Tree View](tree-view.md) · [Badge](https://docs.symfinity.dev/ux-blocks-core/components/badge)
