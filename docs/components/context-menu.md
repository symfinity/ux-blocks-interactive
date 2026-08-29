# Context menu

Right-click (or long-press) menu for contextual actions on a surface.

**Fragment:** `blocks.int.context-menu` · **Stimulus:** `symfinity--ux-blocks-interactive--context-menu`

## When to use

Canvas, table row, or media targets where actions depend on selection context — duplicate, rename, open in new tab. For button-triggered menus, use [Dropdown menu](dropdown-menu.md).

## Guidelines

**Do**

- Mirror the most common actions users expect on the target (file, row, card).
- Disable unavailable items rather than hiding them when the reason is unclear.
- Keep menus shallow — nest sparingly.

**Don't**

- Replace primary navigation with context menus alone.
- Use context menus on elements that already expose the same actions inline.

## Usage

```twig
<twig:ContextMenu>
    <twig:ContextMenu:Trigger>
        <div class="ux-canvas">Right-click here</div>
    </twig:ContextMenu:Trigger>
    <twig:ContextMenu:Content>
        <twig:ContextMenu:Item icon="copy">Copy</twig:ContextMenu:Item>
        <twig:ContextMenu:Item icon="trash">Delete</twig:ContextMenu:Item>
    </twig:ContextMenu:Content>
</twig:ContextMenu>
```

## API Reference

| Component | Prop | Type | Default | Description |
|-----------|------|------|---------|-------------|
| `ContextMenu` | — | — | — | Root wrapper |
| `ContextMenu:Item` | `disabled` | `bool` | `false` | Non-interactive row |
| `ContextMenu:Item` | `icon` | `string?` | — | UX icon name |
| `ContextMenu:Item` | `iconDecorative` | `bool` | `true` | Decorative icon flag |

Region components: `ContextMenu:Trigger`, `ContextMenu:Content`, `ContextMenu:Item`.

## Accessibility

- Trigger is focusable (`tabindex="0"`) for keyboard context menu patterns where supported.
- Content uses `role="menu"`; items use `role="menuitem"`.
- Provide equivalent actions outside the menu for keyboard-only users when possible.

## Related

- [Dropdown menu](dropdown-menu.md) · [Menubar](menubar.md)
