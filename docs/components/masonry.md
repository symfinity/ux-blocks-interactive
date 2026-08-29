# Masonry

Packed uneven-tile layout for galleries, testimonial walls, and mixed-height cards.

**Fragment:** `blocks.int.masonry` · **Stimulus:** `symfinity--ux-blocks-interactive--masonry`

## When to use

Use Masonry when tiles have **different heights** and you want a dense packed wall on wide viewports. Prefer [`Grid`](https://github.com/symfinity/ux-blocks-core/blob/main/docs/components/grid.md) when every row should align to a uniform grid.

## Guidelines

**Do**

- Wrap image + caption in one tile (`Card`, `figure`, or a single `div`).
- Keep DOM order equal to reading order — unlike CSS multi-column masonry.
- Set explicit `columns` when you need a fixed column count at `@container` breakpoints.

- Plan for a single-column fallback when JavaScript is unavailable.
- Keep each masonry tile in one direct child of `<twig:Masonry>`.


## Usage

```twig
<twig:Masonry columns="3" density="comfortable">
    <twig:Card>
        <twig:block name="content">Short tile</twig:block>
    </twig:Card>
    <twig:Card>
        <twig:block name="content">
            Longer copy that makes this tile taller than siblings in the masonry wall.
        </twig:block>
    </twig:Card>
    <figure>
        <img src="{{ asset('photos/example.jpg') }}" alt="Example" loading="lazy" style="max-width:100%;height:auto;">
        <figcaption>Caption stays with the image</figcaption>
    </figure>
</twig:Masonry>
```

Optional cell wrapper:

```twig
<twig:Masonry columns="2">
    <twig:Masonry:Cell>
        <twig:Alert variant="info">Wrapped tile</twig:Alert>
    </twig:Masonry:Cell>
</twig:Masonry>
```

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `columns` | `int\|null` | `null` | Fixed column count at wide breakpoints (`2`–`4`); omit for auto-fit |
| `density` | `string` | `comfortable` | Gap ladder: `compact`, `comfortable`, `spacious` |

## Accessibility

- Reading order follows DOM order — place tiles in the sequence screen readers should consume.
- No motion is required for layout; relayout is instant under `prefers-reduced-motion`.
- Ensure each tile’s interactive controls remain keyboard reachable after relayout.

## Related

- [Grid](https://github.com/symfinity/ux-blocks-core/blob/main/docs/components/grid.md) · [Card](https://github.com/symfinity/ux-blocks-core/blob/main/docs/components/card.md) · kiosk `/kiosk/blocks/interactive/masonry`

## Local Stimulus smoke (optional)

Run a browser check with `@group stimulus` locally when changing `masonry_controller.js` — not part of default CI.
