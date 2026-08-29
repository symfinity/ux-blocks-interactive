# Bento Box Panel Interactive

Drill-down category grid with interactive bento tiles — extends extended-tier `BentoBoxPanel` with Stimulus navigation.

**Fragment id:** `blocks.int.bento-box-panel-interactive`  
**Stimulus:** `symfinity--ux-blocks-interactive--bento-box-panel`

## When to use

Electronics-style category landing pages where users drill from a six-box grid into subcategories. Prefer static [Bento Box Panel](https://docs.symfinity.dev/ux-blocks-extended/components/bento-box-panel) when links alone suffice without drill-down animation.

## Guidelines

**Do**

- Pass `boxes` with `heading`, `items`, and `column` for each tile; optional `size`, `layout`, `icon`, `categoryHref`.
- Leave `boxes` empty in demos to load the bundled electronics fixture via `PostMount`.
- Keep item `href` values stable for deep-linking and analytics.

**Don't**

- Mix unrelated taxonomies in one panel without clear headings per box.
- Rely on hover-only cues for primary navigation actions.

## Usage

```twig
<twig:BentoBoxPanelInteractive :boxes="myBoxes" />
```

When `boxes` is empty, the component applies `ElectronicsSixBoxFixture` for workshop and handbook previews. Internally delegates rendering to extended-tier `BentoBoxPanel`.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `boxes` | `list<array>` | `[]` | Bento tile definitions (see extended BentoBoxPanel shape) |

Each box entry supports `heading`, `items` (with `label`, `href`, optional `children`), `column`, and optional `icon`, `size`, `layout`, `categoryHref`.

## Accessibility

- Category links must have discernible names from `label` text.
- Drill-down stacks should preserve focus order when Stimulus swaps views.
- Do not trap keyboard users inside a tile without an exit path.

## Related

- [Bento Box Panel](https://docs.symfinity.dev/ux-blocks-extended/components/bento-box-panel) · [Carousel Interactive](carousel-interactive.md) · [Navigation Menu](navigation-menu.md)
