# Installation

## Prerequisites

1. Add the [symfinity/recipes](https://github.com/symfinity/recipes) Flex endpoint to your project's `composer.json` (see [recipes README](https://github.com/symfinity/recipes/blob/main/README.md)).
2. Install **core**, **form**, and **extended** tiers first — interactive widgets compose their primitives:

```bash
composer require symfinity/ux-blocks-core symfinity/ux-blocks-form symfinity/ux-blocks-extended
```

3. For **styled** apps, install **ui-kernel** (theme CSS). The registry SDK `symfinity/ux-blocks` is pulled transitively from Packagist.

```bash
composer require symfinity/ui-kernel   # optional — themed apps only
```

See [UX Blocks install profiles](https://github.com/symfinity/ux-blocks#install-profiles) for tier choices.

## Composer

```bash
composer require symfinity/ux-blocks-interactive
```

## Symfony Flex

The `0.1` recipe applies:

- Registers `SymfinityUxBlocksInteractiveBundle` for **all** environments
- Wires AssetMapper paths, Twig namespaces, and UX Twig components
- Optionally imports `theme-scheme.yaml` routes when **ui-kernel** is present (for `SchemeSwitch`)

## Manual installation

When Flex is unavailable:

1. `composer require symfinity/ux-blocks symfinity/ux-blocks-core symfinity/ux-blocks-form symfinity/ux-blocks-extended symfinity/ux-blocks-interactive`
2. Register `Symfinity\UxBlocksInteractive\SymfinityUxBlocksInteractiveBundle` in `config/bundles.php`
3. Ensure AssetMapper, Stimulus, and UX Twig Component bundles are enabled

## Verify installation

```bash
php bin/console debug:container --tag=twig.component | grep -i DropdownMenu
```

## Next steps

[Quick start](quickstart.md).
