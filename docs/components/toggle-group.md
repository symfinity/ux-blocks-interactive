# Toggle Group

Single-select group of toggle buttons — formatting toolbars and segmented controls.

**Fragment id:** `blocks.int.toggle-group`  
**Stimulus:** `symfinity--ux-blocks-interactive--toggle-group`

## When to use

When exactly one option in a small set should appear selected at a time (alignment, view mode, text style). Prefer [Tabs](tabs.md) when content panels swap rather than a toolbar state.

## Guidelines

**Do**

- Wrap each option in `ToggleGroup:Item` with clear text labels.
- Keep groups to a handful of items; split large sets into separate groups.
- Place the group near the content it affects.

**Don't**

- Mix unrelated toggles in one group — split by task.
- Use for navigation between routes — use nav links or tabs instead.

## Usage

```twig
<twig:ToggleGroup>
    <twig:ToggleGroup:Item>Left</twig:ToggleGroup:Item>
    <twig:ToggleGroup:Item>Center</twig:ToggleGroup:Item>
    <twig:ToggleGroup:Item>Right</twig:ToggleGroup:Item>
</twig:ToggleGroup>
```

Default mode is single-select; Stimulus manages `aria-pressed` across items. Aligns with [shadcn Toggle Group](https://ui.shadcn.com/docs/components/toggle-group).

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| — | — | — | Root has no public props; compose `ToggleGroup:Item` children |

**ToggleGroup:Item:** default slot for label; no props on the item class.

## Accessibility

- Root has `role="group"`; items are buttons with `aria-pressed`.
- Ensure one item can receive keyboard focus and arrow keys rove where implemented.
- Do not disable focus indicators on group items.

## Related

- [Toggle](toggle.md) · [Tabs](tabs.md) · [Filter Chips](filter-chips.md)
