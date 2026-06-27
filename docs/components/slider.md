# Slider

Range input with live value readout for filters, volume, and numeric preferences.

**Fragment id:** `blocks.int.slider`  
**Stimulus:** `symfinity--ux-blocks-interactive--slider`

## When to use

Single-axis numeric selection where a precise value matters more than free text. Prefer a number field when users need to type exact amounts or paste values.

## Guidelines

**Do**

- Set `min`, `max`, and `step` to match the domain (percentages, ratings scale, etc.).
- Use semantic `variant` for accent colour on the track and thumb.
- Keep the output element adjacent to the control so sighted users see the current value.

**Don't**

- Use a slider for unbounded ranges or non-linear scales without clear tick marks.
- Rely on the slider alone when exact entry is required — pair with a numeric input if needed.

## Usage

```twig
<twig:Slider
    variant="primary"
    min="{{ 0 }}"
    max="{{ 100 }}"
    step="{{ 5 }}"
    value="{{ 40 }}"
/>
```

Keyboard and pointer interaction follow native `<input type="range">` behaviour with Stimulus syncing the readout.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | `string` | `primary` | Semantic colour accent |
| `min` | `int` | `0` | Minimum value |
| `max` | `int` | `100` | Maximum value |
| `step` | `int` | `1` | Step increment |
| `value` | `int` | `50` | Initial value |

## Accessibility

- The range input must have an accessible name via surrounding `label` or `aria-label`.
- Ensure sufficient contrast for track and thumb in all theme variants.
- Do not disable keyboard adjustment on the native input.

## Related

- [Toggle](toggle.md) · [Rating](rating.md) · [Filter Chips](filter-chips.md)
