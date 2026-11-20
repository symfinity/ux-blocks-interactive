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
| `label` | `string?` | — | Accessible name of the command list |
| `emptyLabel` | `string` | `No matching commands` | Status when nothing matches. Pass a translated string |
| `loadingLabel` | `string` | `Loading commands` | Status while a search request is in flight |
| `failureLabel` | `string` | `Could not load commands` | Status when the search request fails |

Opening the list asks `commandsUrl` immediately, including an empty query. Typing searches again. The field is a combobox and the results are a listbox: the highlighted result is `aria-activedescendant`. A dimmed backdrop covers the page; clicking it closes the list. Tab stays inside the list. With no `commandsUrl`, keystrokes hide existing results instead of replacing the list. Arrow keys, Enter, and Escape move through it.

Region components: `CommandPalette:Input`, `CommandPalette:List`, `CommandPalette:Item` (`icon`, `iconDecorative`, `href`, `hint`). A link result stays inside the list. `hint` is shown in full.

## Accessibility

- Root uses `role="dialog"` and `aria-modal="true"`.
- The search field is a combobox; results are options in a listbox.
- Focus moves to the search input when opened and stays in the palette until it closes.
- Escape closes the palette and restores focus.

## Related

- [Menubar](menubar.md) · [Navigation menu](navigation-menu.md) · [Dropdown menu](dropdown-menu.md)
