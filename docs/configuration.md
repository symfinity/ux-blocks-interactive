# Configuration

UX Blocks Interactive ships **zero required app YAML**. The bundle prepends AssetMapper paths, Twig template paths, and UX Twig Component defaults at compile time.

## What the bundle configures

| Concern | Behavior |
|---------|----------|
| AssetMapper | Maps `assets/` to logical namespace `ux-blocks-interactive` |
| Twig templates | Namespace `UxBlocksInteractive` → `templates/` |
| UX Twig components | `Symfinity\UxBlocksInteractive\Twig\Components\` → `components/` templates |
| Role registry | `config/ux_roles.yaml` (revision **1.4**) — read-only reference inside the package |
| Services | Autowired listeners — see bundle `config/services.yaml` |

Applications **do not** copy bundle `config/` into `config/packages/`.

## Routes (optional ui-kernel)

When **symfinity/ui-kernel** is installed, the Flex recipe may import `theme-scheme.yaml` so `SchemeSwitch` can PATCH the active color scheme at `/_ui/theme/scheme`. Without ui-kernel, use `SchemeSwitch` in local-only mode or omit the component.

## Themed apps (optional ui-kernel)

Role CSS uses `var(--ui-*)` tokens. When **symfinity/ui-kernel** is installed, include theme CSS in your layout — see ui-kernel [theme-preference](https://github.com/symfinity/ui-kernel/blob/main/docs/theme-preference.md).

## Optional integrations

| Package | Purpose |
|---------|---------|
| [symfinity/ux-runtime](https://packagist.org/packages/symfinity/ux-runtime) | Server-backed `CommandPalette` command list (`commandsUrl`) |

## See also

- [Installation](installation.md)
- [Components](components.md)
- [ui-kernel configuration](https://github.com/symfinity/ui-kernel/blob/main/docs/configuration.md)
