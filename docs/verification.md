# Verification

**Integration profile:** P2 — embed (interactive tier; CSS via ux-blocks-core auto stack).

## Local commands

```bash
composer test
composer phpstan
```

## Clean-app smoke

```bash
composer require symfinity/ux-blocks-interactive
```

Render an interactive component (e.g. `<twig:Tabs />` with items) — expect `data-ui-role` markers and inline CSS through `id="ux-blocks-interactive-css"`.

## See also

- [Quick start](quickstart.md)
- [CHANGELOG](../CHANGELOG.md)
