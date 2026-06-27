# Input OTP

One-time passcode entry with per-digit inputs, paste support, and a hidden aggregate field for forms.

**Fragment id:** `blocks.int.input-otp`  
**Stimulus:** `symfinity--ux-blocks-interactive--input-otp`

## When to use

Two-factor codes, email verification, and short numeric tokens where segmented entry reduces typos. Prefer a single text field when codes are alphanumeric and long.

## Guidelines

**Do**

- Set `length` to match your issuer (typically 4–8 digits).
- Submit via the hidden `otp` input Stimulus keeps in sync.
- Place explicit instructions above the control (“Enter the 6-digit code”).

**Don't**

- Change length dynamically after connect without remounting the component.
- Rely on client-side validation alone — verify server-side.

## Usage

```twig
<twig:InputOtp length="{{ 6 }}" />
```

Stimulus creates `length` single-character inputs on connect if none are supplied. Pattern aligns with [shadcn Input OTP](https://ui.shadcn.com/docs/components/input-otp).

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `length` | `int` | `6` | Number of digit cells |

Hidden field: `name="otp"` aggregates digits for form posts.

## Accessibility

- Each digit input receives `aria-label` (`Digit N of length`).
- `inputMode="numeric"` and `autocomplete="one-time-code"` aid mobile keyboards.
- Announce errors from the surrounding form field, not only via colour.

## Related

- [Calendar](calendar.md) · [Filter Chips](filter-chips.md) · [Rating](rating.md)
