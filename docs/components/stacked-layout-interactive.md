# Stacked Layout Interactive

Mobile-first stacked panels with a nav strip that switches visible sections.

**Fragment id:** `blocks.int.stacked-layout-interactive`  
**Stimulus:** `symfinity--ux-blocks-interactive--stacked-layout-interactive`

## When to use

Settings apps and multi-step inspectors on narrow screens where only one panel should be visible at a time. Prefer [Resizable](resizable.md) on wide layouts with side-by-side panels.

## Guidelines

**Do**

- Set `defaultPanel` to the id of the initially visible panel.
- Match `panel` on `StackedLayoutInteractive:NavItem` and `StackedLayoutInteractive:Panel`.
- Place navigation items inside `StackedLayoutInteractive:Nav`.

**Don't**

- Omit panel ids — Stimulus cannot show the correct section without matching `data-panel` values.
- Hide the nav strip without an alternative way to change panels.

## Usage

```twig
<twig:StackedLayoutInteractive defaultPanel="overview">
    <twig:StackedLayoutInteractive:Nav>
        <twig:StackedLayoutInteractive:NavItem panel="overview">Overview</twig:StackedLayoutInteractive:NavItem>
        <twig:StackedLayoutInteractive:NavItem panel="billing">Billing</twig:StackedLayoutInteractive:NavItem>
    </twig:StackedLayoutInteractive:Nav>
    <twig:StackedLayoutInteractive:Panel panel="overview">
        Account summary
    </twig:StackedLayoutInteractive:Panel>
    <twig:StackedLayoutInteractive:Panel panel="billing">
        Invoices and payment methods
    </twig:StackedLayoutInteractive:Panel>
</twig:StackedLayoutInteractive>
```

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `defaultPanel` | `string` | `''` | Panel id shown on first paint |

**StackedLayoutInteractive:NavItem** — `panel` (via attribute) identifies the target section.  
**StackedLayoutInteractive:Panel** — `panel` string prop matches nav items.

## Accessibility

- Nav uses `role="navigation"`; items are buttons with `aria-current` toggled on selection.
- Hidden panels use `hidden` and `aria-hidden="true"` until selected.
- Ensure panel headings describe the section content.

## Related

- [Resizable](resizable.md) · [Sidebar](sidebar.md) · [Tabs](tabs.md)
