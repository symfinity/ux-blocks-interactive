# Table of contents

In-page navigation that tracks scroll position and jumps to document sections.

**Fragment:** `blocks.int.table-of-contents` · **Stimulus:** `symfinity--ux-blocks-interactive--table-of-contents`

## When to use

Long handbook pages, legal docs, and README-style content beside a scrolling main column. Pass heading ids that match anchors in `scrollTarget`.

## Guidelines

**Do**

- Align `sections[].id` with heading `id` attributes in the main column.
- Set `offset` to your sticky header height so targets are not hidden.
- Use `level: 3` for nested headings — renders indented list styling.

**Don't**

- Build TOC from headings that are not in the DOM — stale links frustrate users.
- Rely on TOC as the only navigation for short pages.

## Usage

```twig
<twig:TableOfContents
    :sections="[
        { id: 'intro', label: 'Introduction', level: 2 },
        { id: 'setup', label: 'Setup', level: 2 },
        { id: 'config', label: 'Configuration', level: 3 },
    ]"
    scrollTarget="#content"
    :offset="80"
    ariaLabel="On this page"
/>
```

Main column:

```twig
<article id="content">
    <h2 id="intro">Introduction</h2>
    {# … #}
</article>
```

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `sections` | `list<array>` | `[]` | `{ id, label, level? }` entries |
| `scrollTarget` | `string` | `#content` | Scroll container selector |
| `offset` | `int` | `80` | Pixel offset for sticky headers |
| `smooth` | `bool` | `true` | Smooth scroll behavior |
| `ariaLabel` | `string` | `On this page` | Nav accessible name |

## Accessibility

- Renders `<nav aria-label="…">` with a list of in-page links.
- Active section styling updates on scroll — ensure contrast meets theme tokens.
- Keyboard users can tab through anchor links normally.

## Related

- [Tabs](tabs.md) · [Navigation menu](navigation-menu.md) · symfinity-docs handbook routing
