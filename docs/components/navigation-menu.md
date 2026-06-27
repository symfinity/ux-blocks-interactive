# Navigation menu

Site-wide navigation with optional mega-menu panels — top nav bars and marketing headers.

**Fragment:** `blocks.int.navigation-menu` · **Stimulus:** `symfinity--ux-blocks-interactive--navigation-menu`

## When to use

Primary site navigation with flyout sections — product areas, docs hubs, marketing IA. For in-page section switching, use [Tabs](tabs.md). For desktop app menus, use [Menubar](menubar.md).

## Guidelines

**Do**

- Wrap each top-level section in `NavigationMenu:Panel` with matching `NavigationMenu:Trigger` and `NavigationMenu:Content`.
- Use `NavigationMenu:Item` with real `href` values for crawlable links.
- Keep panel content scannable — columns of links, not paragraphs.

**Don't**

- Duplicate the same links in every panel without hierarchy.
- Rely on hover-only mega menus without keyboard paths.

## Usage

```twig
<twig:NavigationMenu>
    <twig:NavigationMenu:Panel>
        <twig:NavigationMenu:Trigger>Product</twig:NavigationMenu:Trigger>
        <twig:NavigationMenu:Content>
            <twig:NavigationMenu:Item href="/features" icon="sparkles">Features</twig:NavigationMenu:Item>
            <twig:NavigationMenu:Item href="/pricing" icon="tag">Pricing</twig:NavigationMenu:Item>
        </twig:NavigationMenu:Content>
    </twig:NavigationMenu:Panel>
    <twig:NavigationMenu:Panel>
        <twig:NavigationMenu:Trigger>Docs</twig:NavigationMenu:Trigger>
        <twig:NavigationMenu:Content>
            <twig:NavigationMenu:Item href="/docs/quickstart">Quick start</twig:NavigationMenu:Item>
        </twig:NavigationMenu:Content>
    </twig:NavigationMenu:Panel>
</twig:NavigationMenu>
```

Panels use native popover anchoring when `NavigationMenu:Panel` provides a generated `panelId`.

## API Reference

| Component | Prop | Type | Default | Description |
|-----------|------|------|---------|-------------|
| `NavigationMenu` | — | — | — | Root `<nav>` wrapper |
| `NavigationMenu:Panel` | `panelId` | `string?` | auto | Popover id shared by trigger and content |
| `NavigationMenu:Item` | `href` | `string` | `#` | Link target |
| `NavigationMenu:Item` | `icon` | `string?` | — | UX icon name |
| `NavigationMenu:Item` | `iconDecorative` | `bool` | `true` | Decorative icon flag |

Region components: `NavigationMenu:Panel`, `NavigationMenu:Trigger`, `NavigationMenu:Content`, `NavigationMenu:Item`.

## Accessibility

- Root renders `<nav role="navigation">`.
- Triggers expose `aria-haspopup` and `aria-expanded`.
- Items use `role="menuitem"` with discernible link text.

## Related

- [Menubar](menubar.md) · [Sidebar](sidebar.md) · [Tabs](tabs.md)
