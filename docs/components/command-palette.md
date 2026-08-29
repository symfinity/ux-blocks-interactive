# Command palette

Keyboard-driven command launcher — search actions, routes, and entities from a modal palette.

**Fragment:** `blocks.int.command-palette` · **Stimulus:** `symfinity--ux-blocks-interactive--command-palette`

## When to use

Power-user shortcuts in apps with many routes — open with ⌘K / Ctrl+K by default. Wire `commandsUrl` to a `symfinity/ux-runtime` backend for live search, or ship static `fallbackCommands` for demos.

## Guidelines

**Do**

- Provide `fallbackCommands` for offline handbook previews and smoke tests.
- Set `placeholder` to match your domain (“Search commands…”, “Jump to page…”).
- Keep result labels action-oriented.

**Don't**

- Hide the only path to critical settings behind the palette.
- Return unstructured HTML from `commandsUrl` — return JSON command objects.

## Usage

```twig
<twig:CommandPalette
    placeholder="Search commands…"
    openHotkey="k"
    :fallbackCommands="[
        { id: 'home', title: 'Go home', url: '/' },
        { id: 'settings', title: 'Settings', url: '/settings' },
    ]"
>
    <twig:CommandPalette:Input />
    <twig:CommandPalette:List>
        <twig:CommandPalette:Item icon="home">Go home</twig:CommandPalette:Item>
    </twig:CommandPalette:List>
</twig:CommandPalette>
```

Optional runtime integration:

```twig
<twig:CommandPalette commandsUrl="/ux-runtime/commands" />
```

Requires `symfinity/ux-runtime` when using remote command search.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `commandsUrl` | `string` | `''` | JSON endpoint for live commands (ux-runtime) |
| `placeholder` | `string` | `Search…` | Input placeholder |
| `openHotkey` | `string` | `k` | Letter combined with Ctrl/⌘ to open |
| `fallbackCommands` | `list<array>` | `[]` | Static commands `{ id, title, url, … }` |

Region components: `CommandPalette:Input`, `CommandPalette:List`, `CommandPalette:Item` (`icon`, `iconDecorative`).

## Accessibility

- Root uses `role="dialog"` and `aria-modal="true"`.
- Focus moves to the search input when opened.
- Escape closes the palette and restores focus.

## Related

- [Menubar](menubar.md) · [Navigation menu](navigation-menu.md) · [Dropdown menu](dropdown-menu.md)
