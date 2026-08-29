# Drawer

Edge-attached panel that slides in from a screen side — ideal for mobile-first workflows and bottom sheets.

**Fragment:** `blocks.int.drawer` · **Stimulus:** `symfinity--ux-blocks-interactive--drawer`

## When to use

Mobile filters, cart summaries, and thumb-reachable actions from the bottom edge. On desktop, prefer a [Sheet](sheet.md) from the right for detail panels.

## Guidelines

**Do**

- Set `side="bottom"` for thumb-friendly mobile patterns (default).
- Include `Drawer:Header`, `Drawer:Title`, and `Drawer:Close` for wayfinding.
- Keep scrollable body content inside `Drawer:Content`.

**Don't**

- Open drawers automatically on page load.
- Use drawers for multi-step wizards that need full viewport — use a dedicated route or sheet.

## Usage

```twig
<twig:Drawer side="bottom">
    <twig:Drawer:Trigger>View cart</twig:Drawer:Trigger>
    <twig:Drawer:Content>
        <twig:Drawer:Header>
            <twig:Drawer:Title>Your cart</twig:Drawer:Title>
            <twig:Drawer:Close />
        </twig:Drawer:Header>
        {# line items #}
    </twig:Drawer:Content>
</twig:Drawer>
```

Side variants mirror [shadcn Drawer](https://ui.shadcn.com/docs/components/drawer): `top`, `bottom`, `left`, `right`.

## API Reference

| Component | Prop | Type | Default | Description |
|-----------|------|------|---------|-------------|
| `Drawer` | `side` | `string` | `bottom` | Slide-in edge: `top`, `bottom`, `left`, `right` |
| `Drawer:Content` | — | — | — | Modal dialog surface (supports glass substrate via ui-kernel) |

Region components: `Drawer:Trigger`, `Drawer:Content`, `Drawer:Header`, `Drawer:Title`, `Drawer:Close`.

## Accessibility

- Trigger exposes `aria-haspopup="dialog"`.
- Content uses `role="dialog"` and `aria-modal="true"`.
- Provide a visible close control and restore focus on dismiss.

## Related

- [Sheet](sheet.md) · [Sidebar](sidebar.md) · [Alert dialog enhanced](alert-dialog-enhanced.md)
