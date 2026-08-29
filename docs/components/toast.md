# Toast

Transient notification stack for success, info, and error feedback after user actions.

**Fragment:** `blocks.int.toast` · **Stimulus:** `symfinity--ux-blocks-interactive--toast`

## When to use

Confirm saves, background job completion, and recoverable errors — messages that do not require a modal response. For persistent inline status, use core-tier [Flash](https://docs.symfinity.dev/ux-blocks-core/components/flash).

## Guidelines

**Do**

- Keep messages short and actionable (“Saved”, “Could not connect — retry”).
- Set semantic `variant` on each `Toast:Item` so icons and colour tokens match intent.
- Mount one `Toast` root near the layout edge (often top-right).

**Don't**

- Stack dozens of toasts — coalesce or summarize.
- Put critical errors only in toasts without a persistent inline alert.

## Usage

```twig
<twig:Toast>
    <twig:Toast:Item variant="success">Profile updated</twig:Toast:Item>
    <twig:Toast:Item variant="info">Syncing changes…</twig:Toast:Item>
    <twig:Toast:Item variant="danger">Could not save — try again</twig:Toast:Item>
</twig:Toast>
```

Dispatch new items from Stimulus actions or Turbo streams in your app layer.

## API Reference

| Component | Prop | Type | Default | Description |
|-----------|------|------|---------|-------------|
| `Toast` | — | — | — | Live region container |
| `Toast:Item` | `variant` | `string` | `info` | Semantic tone: `success`, `info`, `warning`, `danger`, … |
| `Toast:Item` | `icon` | `string?` | — | Override default variant icon |
| `Toast:Item` | `iconDecorative` | `bool` | `true` | Decorative icon flag |

Region component: `Toast:Item`.

## Accessibility

- Root sets `aria-live="polite"` for non-critical updates.
- Variant icons should remain decorative unless they add unique meaning.
- Do not steal focus when a toast appears.

## Related

- [Alert dialog enhanced](alert-dialog-enhanced.md) · [Flash](https://docs.symfinity.dev/ux-blocks-core/components/flash) · [Command palette](command-palette.md)
