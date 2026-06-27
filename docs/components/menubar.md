# Menubar

Horizontal menu bar for desktop-style application menus — File, Edit, View patterns.

**Fragment:** `blocks.int.menubar` · **Stimulus:** `symfinity--ux-blocks-interactive--menubar`

## When to use

Dense desktop UIs mirroring native menu bars — IDE shells, creative tools, admin apps. For site marketing nav, prefer [Navigation menu](navigation-menu.md).

## Guidelines

**Do**

- Group related commands under each `Menubar:Panel` (File, Edit, …).
- Use `Menubar:Item` for direct actions and nested `Menubar:Content` for dropdown sections.
- Keep keyboard shortcuts documented beside labels when applicable.

**Don't**

- Replace mobile navigation with a menubar — use [Sidebar](sidebar.md) or bottom nav.
- Duplicate every command from a toolbar and the menubar without reason.

## Usage

```twig
<twig:Menubar>
    <twig:Menubar:Panel>
        <twig:Menubar:Trigger>File</twig:Menubar:Trigger>
        <twig:Menubar:Content>
            <twig:Menubar:Item icon="file-plus">New</twig:Menubar:Item>
            <twig:Menubar:Item icon="save">Save</twig:Menubar:Item>
        </twig:Menubar:Content>
    </twig:Menubar:Panel>
    <twig:Menubar:Panel>
        <twig:Menubar:Trigger>Edit</twig:Menubar:Trigger>
        <twig:Menubar:Content>
            <twig:Menubar:Item>Undo</twig:Menubar:Item>
            <twig:Menubar:Item>Redo</twig:Menubar:Item>
        </twig:Menubar:Content>
    </twig:Menubar:Panel>
</twig:Menubar>
```

Root renders `role="menubar"`; panels wire popover targets like the navigation menu.

## API Reference

| Component | Prop | Type | Default | Description |
|-----------|------|------|---------|-------------|
| `Menubar` | — | — | — | Root menubar wrapper |
| `Menubar:Panel` | `panelId` | `string?` | auto | Popover id for trigger/content pair |
| `Menubar:Item` | `disabled` | `bool` | `false` | Non-interactive row |
| `Menubar:Item` | `icon` | `string?` | — | UX icon name |
| `Menubar:Item` | `iconDecorative` | `bool` | `true` | Decorative icon flag |

Region components: `Menubar:Panel`, `Menubar:Trigger`, `Menubar:Content`, `Menubar:Item`.

## Accessibility

- Root uses `role="menubar"`.
- Triggers expose `aria-haspopup="true"` and toggle `aria-expanded`.
- Arrow keys navigate items within the bar per WAI-ARIA menubar patterns.

## Related

- [Navigation menu](navigation-menu.md) · [Dropdown menu](dropdown-menu.md) · [Command palette](command-palette.md)
