# Dropdown menu

Action menu anchored to a button trigger using native popover and menu semantics.

**Fragment:** `blocks.int.dropdown-menu` · **Stimulus:** `symfinity--ux-blocks-interactive--dropdown-menu`

## When to use

Expose secondary actions from a compact trigger — row actions, account menus, and “more” affordances. Prefer a [Menubar](menubar.md) for desktop app-style menus or [Navigation menu](navigation-menu.md) for site-wide nav.

## Guidelines

**Do**

- Keep item labels short and verb-led (“Edit”, “Duplicate”, “Archive”).
- Group destructive actions last and consider a separate [Alert dialog enhanced](alert-dialog-enhanced.md) for irreversible steps.
- Provide an icon on the trigger when space is tight and the label alone is ambiguous.

**Don't**

- Use a dropdown for primary navigation — use tabs or a navigation menu instead.
- Pack long forms inside menu panels; open a [Sheet](sheet.md) or full page.

## Usage

```twig
<twig:DropdownMenu>
    <twig:DropdownMenu:Trigger>Open menu</twig:DropdownMenu:Trigger>
    <twig:DropdownMenu:Content>
        <twig:DropdownMenu:Item icon="user">Profile</twig:DropdownMenu:Item>
        <twig:DropdownMenu:Item icon="settings">Settings</twig:DropdownMenu:Item>
        <twig:DropdownMenu:Item disabled>Unavailable</twig:DropdownMenu:Item>
    </twig:DropdownMenu:Content>
</twig:DropdownMenu>
```

Composition follows [shadcn Dropdown Menu](https://ui.shadcn.com/docs/components/dropdown-menu) — root, trigger, content, and items.

## API Reference

| Component | Prop | Type | Default | Description |
|-----------|------|------|---------|-------------|
| `DropdownMenu` | `menuId` | `string?` | auto | Stable id for popover anchor wiring |
| `DropdownMenu:Item` | `disabled` | `bool` | `false` | Non-interactive menu row |
| `DropdownMenu:Item` | `icon` | `string?` | — | UX icon name (start slot) |
| `DropdownMenu:Item` | `iconDecorative` | `bool` | `true` | Hide icon from assistive tech when decorative |

Region components: `DropdownMenu:Trigger`, `DropdownMenu:Content`, `DropdownMenu:Item`.

## Accessibility

- Trigger exposes `aria-haspopup="menu"` and toggles `aria-expanded`.
- Content uses `role="menu"`; items use `role="menuitem"`.
- Keyboard: arrow keys move focus; Escape closes the menu.

## Related

- [Context menu](context-menu.md) · [Menubar](menubar.md) · [Navigation menu](navigation-menu.md)
