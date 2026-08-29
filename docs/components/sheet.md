# Sheet

Side panel overlay for secondary tasks — edit forms, detail views, and settings without leaving the page.

**Fragment:** `blocks.int.sheet` · **Stimulus:** `symfinity--ux-blocks-interactive--sheet`

## When to use

Edit-in-place flows, filter panels, and contextual detail beside a list. Use [Drawer](drawer.md) when the panel should originate from the bottom on mobile.

## Guidelines

**Do**

- Default `side="right"` for LTR detail panels; use `left` for mirrored layouts.
- Pair `Sheet:Trigger` with a concise verb (“Edit”, “Filters”).
- Keep primary page context visible behind the scrim when possible.

**Don't**

- Stack multiple sheets without closing the previous layer.
- Move entire multi-page flows into a sheet — promote to a route when depth grows.

## Usage

```twig
<twig:Sheet side="right">
    <twig:Sheet:Trigger>Edit profile</twig:Sheet:Trigger>
    <twig:Sheet:Content>
        <twig:Sheet:Header>
            <twig:Sheet:Title>Profile</twig:Sheet:Title>
            <twig:Sheet:Close />
        </twig:Sheet:Header>
        {# form fields #}
    </twig:Sheet:Content>
</twig:Sheet>
```

Patterns align with [shadcn Sheet](https://ui.shadcn.com/docs/components/sheet).

## API Reference

| Component | Prop | Type | Default | Description |
|-----------|------|------|---------|-------------|
| `Sheet` | `side` | `string` | `right` | Panel edge: `top`, `bottom`, `left`, `right` |

Region components: `Sheet:Trigger`, `Sheet:Content`, `Sheet:Header`, `Sheet:Title`, `Sheet:Close`.

## Accessibility

- Trigger exposes `aria-haspopup="dialog"`.
- Content uses `role="dialog"` and `aria-modal="true"`.
- Include a labelled title and a dismiss control.

## Related

- [Drawer](drawer.md) · [Sidebar](sidebar.md) · [Alert dialog enhanced](alert-dialog-enhanced.md)
