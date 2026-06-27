# Toggle

Two-state press button for bold/italic-style toolbars and on/off affordances that are not form checkboxes.

**Fragment id:** `blocks.int.toggle`  
**Stimulus:** `symfinity--ux-blocks-interactive--toggle`

## When to use

Toolbar modes, view options, and binary filters where the pressed state is visible on the control itself. Prefer [Checkbox](https://docs.symfinity.dev/ux-blocks-core/components/checkbox) in forms when the value submits with a field label.

## Guidelines

**Do**

- Set `pressed` for the initial on state in static renders.
- Use `variant` for semantic colour when the toggle sits on coloured surfaces.
- Keep label text inside the default slot short and action-oriented.

**Don't**

- Use Toggle for mutually exclusive choices in a set — use [Toggle Group](toggle-group.md).
- Rely on colour alone to convey pressed state; `aria-pressed` is wired automatically.

## Usage

```twig
<twig:Toggle variant="primary" pressed="{{ false }}">
    Bold
</twig:Toggle>
```

Pattern follows [shadcn Toggle](https://ui.shadcn.com/docs/components/toggle) — a `button` with `aria-pressed`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | `string` | `primary` | Semantic colour accent |
| `pressed` | `bool` | `false` | Initial pressed state |

Default slot: button label or icon content.

## Accessibility

- Exposes `aria-pressed="true|false"`; Stimulus toggles on click.
- Provide visible focus styles; do not remove outline on the button.
- When using icons only, add `aria-label` on the Toggle.

## Related

- [Toggle Group](toggle-group.md) · [Button](https://docs.symfinity.dev/ux-blocks-core/components/button) · [Filter Chips](filter-chips.md)
