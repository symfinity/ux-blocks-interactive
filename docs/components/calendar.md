# Calendar

Month grid with previous/next navigation for date picking and scheduling UIs.

**Fragment id:** `blocks.int.calendar`  
**Stimulus:** `symfinity--ux-blocks-interactive--calendar`

## When to use

Inline date exploration in filters, booking widgets, and admin tools where a full date field is not yet required. Pair with a date input when users must submit a precise ISO value.

## Guidelines

**Do**

- Mount inside a labelled region so screen readers announce the control purpose.
- Rely on Stimulus to populate the grid and month label after connect.
- Keep adjacent actions (Apply, Clear) outside the calendar root when submitting forms.

**Don't**

- Embed multiple independent calendars without distinct labels.
- Use as the only date input in critical flows without a visible selected value elsewhere.

## Usage

```twig
<twig:Calendar />
```

Navigation buttons and the day grid are rendered by the template; Stimulus fills cells and updates the month label (`aria-live="polite"`).

Pattern follows [shadcn Calendar](https://ui.shadcn.com/docs/components/calendar) interaction shape.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| — | — | — | Root component has no PHP props; behaviour is Stimulus-driven |

Optional default slot for supplementary chrome below the grid.

## Accessibility

- Previous/next controls are native buttons with visible text.
- Month label updates in a live region for screen reader announcements.
- Day cells should remain keyboard operable when selection is added in consuming apps.

## Related

- [Input OTP](input-otp.md) · [Filter Chips](filter-chips.md) · [Tabs](tabs.md)
