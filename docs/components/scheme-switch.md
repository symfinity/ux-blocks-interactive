# Scheme switch

Binary light/dark toggle wired to UI Kernel theme scheme persistence.

**Fragment:** `blocks.int.scheme-switch` · **Stimulus:** `symfinity--ux-blocks-interactive--scheme-switch`

## When to use

Global color-scheme control in app chrome — headers, settings, marketing footers. Requires UI Kernel theme boot and the default scheme endpoint (`/_ui/theme/scheme`).

## Guidelines

**Do**

- Pass resolved `colorScheme` and `scheme` from your theme resolver for SSR checkbox state.
- Supply `links` with `{ scheme, url, active }` when not using the enhanced Stimulus endpoint.
- Set `label` when the control stands alone without visible text.

**Don't**

- Render multiple scheme switches that fight the same cookie — one control per layout region.
- Expect the switch to work without `ui_kernel_theme_boot_script()` and theme CSS.

## Usage

```twig
{# SSR from UI Kernel theme resolver #}
<twig:SchemeSwitch
    label="Color scheme"
    scheme="auto"
    colorScheme="light"
    :links="[
        { scheme: 'light', url: path('ui_kernel_theme_scheme', { scheme: 'light' }), active: true },
        { scheme: 'dark', url: path('ui_kernel_theme_scheme', { scheme: 'dark' }), active: false },
    ]"
/>
```

Minimal enhanced mode (Stimulus PATCHes `schemeEndpoint`):

```twig
<twig:SchemeSwitch enhanced colorScheme="dark" />
```

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | `string?` | — | Accessible name for the switch |
| `disabled` | `bool` | `false` | Non-interactive state |
| `scheme` | `string` | `auto` | Stored preference (`auto`, `light`, `dark`) |
| `colorScheme` | `string` | `light` | Resolved UI state (`light` \| `dark`) |
| `enhanced` | `bool` | `true` | Stimulus toggle vs inline `onchange` navigation |
| `schemeEndpoint` | `string` | `/_ui/theme/scheme` | UI Kernel scheme PATCH route |
| `links` | `list<array>` | `[]` | Fallback navigation URLs per scheme |

## Accessibility

- Input uses `role="switch"` with `aria-label`.
- Sun/moon icons are `aria-hidden`; state is conveyed by the switch role.
- Respect `prefers-color-scheme` when `scheme="auto"`.

## Related

- [Sidebar](sidebar.md) · [Navigation menu](navigation-menu.md) · UI Kernel theme docs
