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

Org maintainer dogfood:

```bash
make dogfood-new SLUG=ux-blocks-kiosk-lab VERSION='7.4.*' FORCE=1
make dogfood-serve SLUG=ux-blocks-kiosk-lab
```

## See also

- [Quick start](quickstart.md)
- [CHANGELOG](../CHANGELOG.md)
