# Usage

Patterns for **symfinity/ux-blocks-interactive** Stimulus widgets.

## Featured components

- **[Tabs](components/tabs.md)** — sectioned content with keyboard navigation
- **[Dropdown menu](components/dropdown-menu.md)** — action menus from a trigger
- **[Toast](components/toast.md)** — transient notification stack

## Overlays

```twig
<twig:Sheet side="right">
    <twig:Sheet:Trigger>Edit profile</twig:Sheet:Trigger>
    <twig:Sheet:Content>
        {# form fields #}
    </twig:Sheet:Content>
</twig:Sheet>
```

Use [Drawer](components/drawer.md) for bottom/side mobile panels and [Alert dialog enhanced](components/alert-dialog-enhanced.md) for destructive confirmations.

## Navigation chrome

```twig
<twig:Sidebar side="left">
    <twig:Sidebar:Content>
        {# nav links #}
    </twig:Sidebar:Content>
</twig:Sidebar>
```

Combine with [Navigation menu](components/navigation-menu.md) or [Menubar](components/menubar.md) for desktop-style navigation.

## App chrome

| Need | Component |
|------|-----------|
| Light/dark toggle | [Scheme switch](components/scheme-switch.md) — requires ui-kernel theme route |
| Keyboard launcher | [Command palette](components/command-palette.md) — optional ux-runtime backend |
| Long-form docs TOC | [Table of contents](components/table-of-contents.md) — scroll-linked in-page nav |

## Theme CSS

Include UI Kernel theme CSS — see [Quick start](quickstart.md) for the boot snippet.

## See also

- [Components](components.md) · [Quick start](quickstart.md) · [Troubleshooting](troubleshooting.md)
