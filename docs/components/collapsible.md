# Collapsible

Single-region expand/collapse — one trigger and one content panel. Distinct from [Accordion](https://docs.symfinity.dev/ux-blocks-extended/components/accordion) (multi-item stack).

**Fragment id:** `blocks.int.collapsible`  
**Stimulus:** `symfinity--ux-blocks-core--collapsible` when `open` is set (controlled mode); native `<details>` when uncontrolled.

## When to use

Optional settings blocks, shipping details, and progressive disclosure where only one panel toggles. Prefer Accordion when users compare several sections in one stack.

## Guidelines

**Do**

- Pair `Collapsible:Trigger` with `Collapsible:Content` inside the root.
- Use `defaultOpen` for static SSR; pass `open` when Stimulus should sync toggle state client-side.
- Use `as="summary"` on the trigger when the root renders as `<details>`.

**Don't**

- Nest multiple independent panels inside one Collapsible — use Accordion instead.
- Hide critical instructions only inside a collapsed panel users may never open.

## Usage

```twig
<twig:Collapsible defaultOpen="{{ false }}">
    <twig:Collapsible:Trigger>Shipping options</twig:Collapsible:Trigger>
    <twig:Collapsible:Content>
        Free delivery on orders over €50.
    </twig:Collapsible:Content>
</twig:Collapsible>
```

Controlled mode wires the **core** Stimulus controller from `symfinity/ux-blocks-core` (cross-package):

```twig
<twig:Collapsible :open="true">
    <twig:Collapsible:Trigger>Billing</twig:Collapsible:Trigger>
    <twig:Collapsible:Content forceMount="{{ true }}">
        Invoice history loads here.
    </twig:Collapsible:Content>
</twig:Collapsible>
```

Semantics align with [shadcn Collapsible](https://ui.shadcn.com/docs/components/collapsible) — one activator, one panel.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `defaultOpen` | `bool` | `false` | Initial expanded state (uncontrolled) |
| `open` | `bool?` | `null` | When set, enables controlled mode + core Stimulus |
| `disabled` | `bool` | `false` | Disables the trigger |

**Collapsible:Trigger:** `as` — `button` (default) or `summary`.  
**Collapsible:Content:** `forceMount` — keep panel in DOM when closed.

## Accessibility

- Trigger exposes `aria-expanded` and `aria-controls` in controlled mode.
- Use visible trigger text — do not rely on icon-only toggles without `aria-label`.
- When `forceMount` is false, closed content is removed or hidden from the accessibility tree appropriately.

## Related

- [Accordion](https://docs.symfinity.dev/ux-blocks-extended/components/accordion) · [Drawer](drawer.md) · [Tabs](tabs.md)
