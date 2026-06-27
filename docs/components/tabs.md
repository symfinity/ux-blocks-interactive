# Tabs

Switch between related views in the same screen without navigation.

**Fragment:** `blocks.int.tabs` · **Stimulus:** `symfinity--ux-blocks-interactive--tabs`

## When to use

Settings sections, record detail with multiple facets, and dashboard panels where content is mutually exclusive. For site-wide navigation, use [Navigation menu](navigation-menu.md) or linked tab triggers with `href`.

## Guidelines

**Do**

- Set `defaultValue` to the tab users land on most often.
- Keep tab labels short (one or two words).
- Use `orientation="vertical"` for side-by-side settings sidebars.

**Don't**

- Hide critical content behind many tabs — consolidate or paginate.
- Use tabs when all sections should be visible at once — use a [Stack](https://docs.symfinity.dev/ux-blocks-core/components/stack) instead.

## Usage

```twig
<twig:Tabs defaultValue="account" orientation="horizontal">
    <twig:Tabs:List>
        <twig:Tabs:Trigger value="account">Account</twig:Tabs:Trigger>
        <twig:Tabs:Trigger value="billing">Billing</twig:Tabs:Trigger>
    </twig:Tabs:List>
    <twig:Tabs:Content value="account" active>Account settings</twig:Tabs:Content>
    <twig:Tabs:Content value="billing">Billing details</twig:Tabs:Content>
</twig:Tabs>
```

Linked navigation variant:

```twig
<twig:Tabs:Trigger value="docs" href="/docs">Docs</twig:Tabs:Trigger>
```

## API Reference

| Component | Prop | Type | Default | Description |
|-----------|------|------|---------|-------------|
| `Tabs` | `orientation` | `string` | `horizontal` | `horizontal` or `vertical` |
| `Tabs` | `defaultValue` | `string` | `''` | Active tab value for Stimulus + SSR |
| `Tabs:Trigger` | `value` | `string` | `''` | Tab id matching content panel |
| `Tabs:Trigger` | `disabled` | `bool` | `false` | Non-selectable tab |
| `Tabs:Trigger` | `active` | `bool` | `false` | SSR selected state |
| `Tabs:Trigger` | `href` | `string` | `''` | When set, renders link tab instead of button |
| `Tabs:Content` | `value` | `string` | `''` | Panel id |
| `Tabs:Content` | `active` | `bool` | `false` | SSR visibility before Stimulus connects |

Region components: `Tabs:List`, `Tabs:Trigger`, `Tabs:Content`.

## Accessibility

- List uses `role="tablist"` with `aria-orientation`.
- Triggers use `role="tab"` and `aria-selected`.
- Panels use `role="tabpanel"` and `aria-hidden` when inactive.
- Arrow keys move between tabs per orientation.

## Related

- [Navigation menu](navigation-menu.md) · [Sidebar](sidebar.md) · [Table of contents](table-of-contents.md)
