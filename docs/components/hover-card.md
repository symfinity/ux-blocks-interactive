# Hover card

Rich preview panel shown on hover or focus — user profiles, link previews, and compact detail without a click.

**Fragment:** `blocks.int.hover-card` · **Stimulus:** `symfinity--ux-blocks-interactive--hover-card`

## When to use

Preview metadata anchored to inline triggers — @mentions, repo links, glossary terms. For click-to-open panels, use extended-tier [Popover](https://docs.symfinity.dev/ux-blocks-extended/components/popover).

## Guidelines

**Do**

- Tune `openDelay` / `closeDelay` so accidental hovers do not flash content.
- Keep preview content scannable — avatar, title, one line of detail.
- Leave `nativeInterest="true"` (default) when the browser supports `interestfor` popovers.

**Don't**

- Hide essential instructions only inside a hover card.
- Put interactive forms in hover cards — open a sheet or dialog instead.

## Usage

```twig
<twig:HoverCard openDelay="300" closeDelay="150">
    <twig:HoverCard:Trigger href="/team/alice">@alice</twig:HoverCard:Trigger>
    <twig:HoverCard:Content>
        <strong>Alice Chen</strong>
        <p>Design systems · Berlin</p>
    </twig:HoverCard:Content>
</twig:HoverCard>
```

Native `popover="hint"` wiring follows [Popover interest API](https://developer.mozilla.org/en-US/docs/Web/API/Popover_API) where supported; Stimulus handles fallback timing.

## API Reference

| Component | Prop | Type | Default | Description |
|-----------|------|------|---------|-------------|
| `HoverCard` | `openDelay` | `int` | `200` | Milliseconds before open |
| `HoverCard` | `closeDelay` | `int` | `100` | Milliseconds before close |
| `HoverCard` | `cardId` | `string?` | auto | Stable id linking trigger and content |
| `HoverCard` | `nativeInterest` | `bool` | `true` | Use `interestfor` anchor when available |

Region components: `HoverCard:Trigger`, `HoverCard:Content`.

## Accessibility

- Trigger must remain keyboard-focusable (link or focusable wrapper).
- Do not rely on hover-only information for required tasks.
- Preview content should not trap focus.

## Related

- [Context menu](context-menu.md) · [Dropdown menu](dropdown-menu.md) · [Tooltip](https://docs.symfinity.dev/ux-blocks-extended/components/tooltip)
