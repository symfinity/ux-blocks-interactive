# Sidebar

Collapsible application sidebar for persistent navigation and workspace chrome.

**Fragment:** `blocks.int.sidebar` · **Stimulus:** `symfinity--ux-blocks-interactive--sidebar`

## When to use

App shells with vertical nav — dashboards, admin consoles, docs apps. Pair with `Sidebar:Trigger` for mobile toggle. For flyout site nav, use [Navigation menu](navigation-menu.md).

## Guidelines

**Do**

- Set `side="left"` (default) for LTR apps; use `right` for auxiliary panels.
- Place primary nav inside `Sidebar:Content` and branding in `Sidebar:Header`.
- Provide a visible `Sidebar:Close` on small viewports.

**Don't**

- Hide the only navigation path inside a closed sidebar on desktop without a persistent trigger.
- Duplicate full page content inside the sidebar.

## Usage

```twig
<twig:Sidebar side="left">
    <twig:Sidebar:Trigger>Menu</twig:Sidebar:Trigger>
    <twig:Sidebar:Content>
        <twig:Sidebar:Header>
            <twig:Sidebar:Title>Acme Admin</twig:Sidebar:Title>
            <twig:Sidebar:Close />
        </twig:Sidebar:Header>
        {# nav links #}
    </twig:Sidebar:Content>
</twig:Sidebar>
```

## API Reference

| Component | Prop | Type | Default | Description |
|-----------|------|------|---------|-------------|
| `Sidebar` | `side` | `string` | `left` | Panel edge: `left` or `right` |

Region components: `Sidebar:Trigger`, `Sidebar:Content`, `Sidebar:Header`, `Sidebar:Title`, `Sidebar:Close`.

## Accessibility

- Trigger exposes `aria-haspopup="dialog"`.
- Content renders as `<aside>` with `aria-hidden` when closed.
- Ensure skip links or landmarks remain reachable when sidebar is collapsed.

## Related

- [Sheet](sheet.md) · [Navigation menu](navigation-menu.md) · [Menubar](menubar.md)
