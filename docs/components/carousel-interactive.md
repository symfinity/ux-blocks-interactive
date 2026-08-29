# Carousel Interactive

Horizontal scroll-snap carousel with previous/next controls and keyboard focus.

**Fragment id:** `blocks.int.carousel-interactive`  
**Stimulus:** `symfinity--ux-blocks-interactive--carousel-interactive`

## When to use

Marketing highlights, image galleries, and card decks where one slide is primary but peers remain peek-visible. Prefer static [Carousel](https://docs.symfinity.dev/ux-blocks-marketing/components/carousel) sections when motion is decorative only.

## Guidelines

**Do**

- Wrap each slide in `CarouselInteractive:Item`.
- Keep slide count modest; lazy-load heavy media inside items.
- Ensure prev/next buttons remain visible or provide swipe on touch devices.

**Don't**

- Autoplay without a reduced-motion guard in consuming apps.
- Hide all navigation affordances on keyboard-only workflows.

## Usage

```twig
<twig:CarouselInteractive>
    <twig:CarouselInteractive:Item>Slide 1</twig:CarouselInteractive:Item>
    <twig:CarouselInteractive:Item>Slide 2</twig:CarouselInteractive:Item>
    <twig:CarouselInteractive:Item>Slide 3</twig:CarouselInteractive:Item>
</twig:CarouselInteractive>
```

Viewport scroll-snap and Stimulus prev/next align with [shadcn Carousel](https://ui.shadcn.com/docs/components/carousel) behaviour.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| — | — | — | Root has no props; compose item children |

**CarouselInteractive:Item:** default slot for slide body.

## Accessibility

- Root is focusable (`tabindex="0"`) for keyboard scroll where implemented.
- Provide meaningful content in each slide — not empty placeholders.
- Respect `prefers-reduced-motion` for any animated transitions in app CSS.

## Related

- [Bento Box Panel Interactive](bento-box-panel-interactive.md) · [Tabs](tabs.md) · [Drawer](drawer.md)
