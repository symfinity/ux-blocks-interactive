# Troubleshooting

## Components render unstyled

**Cause:** ui-kernel theme CSS is missing from the layout, or AssetMapper did not load `ux-blocks-interactive` role CSS.

**Fix:** Include `ui_kernel_theme_boot_script()` and `ui_kernel_css()` in your base layout — see [Quick start](quickstart.md). Run `php bin/console debug:asset-map` and confirm `ux-blocks-interactive` styles are mapped.

## Interactive component not found

**Cause:** Interactive bundle not registered, or core/form/extended tiers missing.

**Fix:** `composer require symfinity/ux-blocks-core symfinity/ux-blocks-form symfinity/ux-blocks-extended symfinity/ux-blocks-interactive`. Confirm `SymfinityUxBlocksInteractiveBundle` appears in `config/bundles.php` and run `php bin/console debug:container --tag=twig.component`.

## Fragment id mismatch in tests

**Cause:** Tests assert legacy `blocks.ext.*` or `blocks.live.*` ids instead of `blocks.int.*`.

**Fix:** Use `blocks.int.*` fragment ids from `config/ux_roles.yaml`. Check `deprecated_fragment_aliases` when migrating from pre-**057** layouts.

## Scheme switch PATCH returns 404

**Cause:** ui-kernel theme-scheme route not imported, or `schemeEndpoint` points to the wrong path.

**Fix:** Ensure **symfinity/ui-kernel** is installed and the Flex recipe imported `theme-scheme.yaml`. Default endpoint is `/_ui/theme/scheme` — see [Scheme switch](components/scheme-switch.md).

## Getting help

- [GitHub Issues](https://github.com/symfinity/ux-blocks-interactive/issues)
- [CONTRIBUTING](../CONTRIBUTING.md)
- [Security](../.github/SECURITY.md)
