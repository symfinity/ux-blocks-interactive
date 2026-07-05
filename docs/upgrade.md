# Upgrade guide

## First public release (`v0.1.0`)

This is the first tagged release on Packagist. There is no migration from a prior semver line.

### Install

```bash
composer require symfinity/ux-blocks:^0.1 symfinity/ux-blocks-core:^0.1 symfinity/ux-blocks-form:^0.1 symfinity/ux-blocks-extended:^0.1 symfinity/ux-blocks-interactive:^0.1
# optional themed app:
composer require symfinity/ui-kernel:^0.1
```

Ensure the [symfinity/recipes](https://github.com/symfinity/recipes) Flex endpoint is configured so the install recipe runs.

### What you get

- Symfony bundle registered for all environments
- **27** interactive UX Twig component roles with `blocks.int.*` fragment ids
- Registry revision **1.4** in package `config/ux_roles.yaml`
- AssetMapper + Twig + UX Twig Component auto-configuration

### After install

1. Include ui-kernel head partial in your base layout — [Quick start](quickstart.md)
2. Replace local overlay/navigation templates with `<twig:*>` components
3. Clear Symfony cache in each environment

## Fragment alias migration (**057** four-tier split)

Roles that previously lived in **ux-blocks-extended** or **ux-blocks-live** now use `blocks.int.*` ids. Deprecated aliases remain in `deprecated_fragment_aliases` until the next minor release.

| Deprecated | Current |
|------------|---------|
| `blocks.ext.tabs` | `blocks.int.tabs` |
| `blocks.ext.dropdown-menu` | `blocks.int.dropdown-menu` |
| `blocks.ext.table-of-contents` | `blocks.int.table-of-contents` |
| `blocks.live.tabs` | `blocks.int.tabs` |
| … | See `config/ux_roles.yaml` for the full alias table |

Update tests and custom templates to use `blocks.int.{role}` fragment ids.

## 0.1.3

OOTB handbook and CSS cascade hygiene after [v0.1.2](https://github.com/symfinity/ux-blocks-interactive/releases/tag/v0.1.2). Grouped component example manifests, `@layer blocks.interactive` tier CSS, verification page, and PHPUnit bootstrap cleanup — no component props or registry ids changed.

```bash
composer update symfinity/ux-blocks-interactive symfinity/ux-blocks-core
```

After upgrade:

1. Clear Symfony cache and hard-refresh the browser if AssetMapper serves cached CSS in dev.
2. Pair with `symfinity/ux-blocks-core` **^0.1.6** so interactive fragments get auto-injected inline tier CSS (`id="ux-blocks-interactive-css"`).
3. Optional: run the [verification](verification.md) clean-app smoke if you embed interactive components without ui-kernel.

## Future releases

See [CHANGELOG](https://github.com/symfinity/ux-blocks-interactive/blob/main/CHANGELOG.md) for version-to-version notes.
