# Resizable

Drag handles to resize adjacent panels — IDE-style split layouts.

**Fragment id:** `blocks.int.resizable`  
**Stimulus:** `symfinity--ux-blocks-interactive--resizable`

## When to use

Mail clients, documentation sidebars, and dashboards where users adjust column width. Prefer [Stacked Layout Interactive](stacked-layout-interactive.md) on narrow viewports when panels stack instead of sitting side by side.

## Guidelines

**Do**

- Alternate `Resizable:Panel` and `Resizable:Handle` children inside the root flex container.
- Provide minimum content in each panel so handles remain usable after resize.
- Persist user sizes in app storage when layouts should survive reloads (app layer).

**Don't**

- Nest more than two or three handles without clear visual affordances.
- Resize essential controls below usable minimum widths.

## Usage

```twig
<twig:Resizable>
    <twig:Resizable:Panel>
        Sidebar
    </twig:Resizable:Panel>
    <twig:Resizable:Handle />
    <twig:Resizable:Panel>
        Main content
    </twig:Resizable:Panel>
</twig:Resizable>
```

Pattern follows [shadcn Resizable](https://ui.shadcn.com/docs/components/resizable) panel groups.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| — | — | — | Root has no props; compose panels and handles |

**Resizable:Panel** and **Resizable:Handle** — default slots for content and grip chrome.

## Accessibility

- Handles must be keyboard reachable where drag is supported, or provide alternative layout controls.
- Do not trap focus inside a panel during resize.
- Maintain readable text reflow when panels shrink.

## Related

- [Stacked Layout Interactive](stacked-layout-interactive.md) · [Sidebar](sidebar.md) · [Drawer](drawer.md)
