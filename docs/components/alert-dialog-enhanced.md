# Alert dialog enhanced

Modal confirmation dialog for destructive or irreversible actions with explicit confirm and cancel paths.

**Fragment:** `blocks.int.alert-dialog-enhanced` · **Stimulus:** `symfinity--ux-blocks-interactive--alert-dialog`

## When to use

Interrupt the user before a destructive commit — delete workspace, revoke access, discard unpublished edits. For general modals and forms, use extended-tier [Dialog](https://docs.symfinity.dev/ux-blocks-extended/components/dialog) instead.

## Guidelines

**Do**

- State the consequence clearly in the title and description.
- Place the destructive action in `AlertDialog:Action` and a safe default in `AlertDialog:Cancel`.
- Keep copy short; link out for policy detail.

**Don't**

- Use alert dialogs for passive information — use [Toast](toast.md) or inline [Alert](https://docs.symfinity.dev/ux-blocks-core/components/alert).
- Stack multiple alert layers without a single dismiss path.

## Usage

```twig
<twig:AlertDialog>
    <twig:AlertDialog:Trigger>Delete project</twig:AlertDialog:Trigger>
    <twig:AlertDialog:Content>
        <twig:AlertDialog:Title>Delete this project?</twig:AlertDialog:Title>
        <twig:AlertDialog:Description>
            All environments and deploy history will be removed permanently.
        </twig:AlertDialog:Description>
        <twig:AlertDialog:Footer>
            <twig:AlertDialog:Cancel>Keep project</twig:AlertDialog:Cancel>
            <twig:AlertDialog:Action>Delete forever</twig:AlertDialog:Action>
        </twig:AlertDialog:Footer>
    </twig:AlertDialog:Content>
</twig:AlertDialog>
```

Patterns align with [shadcn Alert Dialog](https://ui.shadcn.com/docs/components/alert-dialog).

## API Reference

| Component | Prop | Type | Default | Description |
|-----------|------|------|---------|-------------|
| `AlertDialog` | — | — | — | Root wrapper; no props |
| `AlertDialog:Content` | — | — | — | `role="alertdialog"` surface |
| `AlertDialog:Title` | — | — | — | Accessible dialog name |
| `AlertDialog:Description` | — | — | — | Supporting detail |
| `AlertDialog:Action` | — | — | — | Confirms the destructive action |
| `AlertDialog:Cancel` | — | — | — | Dismisses without action |

Region components: `AlertDialog:Trigger`, `AlertDialog:Content`, `AlertDialog:Title`, `AlertDialog:Description`, `AlertDialog:Footer`, `AlertDialog:Action`, `AlertDialog:Cancel`.

## Accessibility

- Content uses `role="alertdialog"` and `aria-modal="true"`.
- Focus moves into the dialog on open and returns to the trigger on cancel.
- Title and description must be present for screen reader context.

## Related

- [Drawer](drawer.md) · [Sheet](sheet.md) · [Toast](toast.md)
