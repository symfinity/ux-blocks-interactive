# Rating

Star (or icon) rating control with keyboard-friendly value selection.

**Fragment id:** `blocks.int.rating`  
**Stimulus:** `symfinity--ux-blocks-interactive--rating`

## When to use

Product reviews, satisfaction surveys, and quick feedback where users pick a score on a fixed scale. Prefer a slider when the scale is continuous rather than discrete stars.

## Guidelines

**Do**

- Set `max` to the highest score (often 5) and `value` for the initial selection.
- Use `variant="warning"` or another semantic colour for filled stars.
- Sync submitted forms via the hidden `rating` input Stimulus maintains.

**Don't**

- Use half-star precision unless your Stimulus layer implements it — default is whole steps.
- Rely on rating alone for mandatory feedback — pair with a text field when detail matters.

## Usage

```twig
<twig:Rating variant="warning" max="{{ 5 }}" value="{{ 3 }}" />
```

Aligns with common [shadcn Rating](https://ui.shadcn.com/docs/components/rating) patterns — clickable icons within a `role="group"`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | `string` | `warning` | Semantic colour for active icons |
| `max` | `int` | `5` | Maximum score |
| `value` | `int` | `0` | Initial selected value (0 = none) |

Hidden field: `name="rating"` holds the numeric value for forms.

## Accessibility

- Root exposes `aria-label="Rating"`.
- Ensure each interactive icon has a discernible name or is reached via keyboard roving tabindex.
- Do not convey score by colour alone — expose the numeric value to assistive tech.

## Related

- [Slider](slider.md) · [Toggle](toggle.md) · [Filter Chips](filter-chips.md)
