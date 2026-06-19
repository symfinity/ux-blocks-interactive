# Ux Blocks Interactive

**Client interactive tier — default `stl`; package Stimulus widgets.**

Symfinity UX Blocks Interactive ships Stimulus-backed interactive widgets with `blocks.int.*` fragment ids. Requires `symfinity/ux-blocks-extended` (compounds) and transitively `symfinity/ux-blocks-core` (atoms).

## Tier model (057)

| Tier | Package | Prefix | Interaction |
|------|---------|--------|-------------|
| Foundation | `ux-blocks-core` | `blocks` | `nat` atoms |
| Application | `ux-blocks-extended` | `blocks.ext` | `nat`/`act` compounds |
| **Interactive** | **`ux-blocks-interactive`** | **`blocks.int`** | **`stl`** widgets |
| Live | `ux-blocks-live` | `blocks.live` | `live` LiveComponents |

## Registry

See `config/ux_roles.yaml` — **26** shipped `stl` roles (including `scheme-switch` and `command-palette` UI chrome).

## SchemeSwitch

Binary ghost light/dark toggle with Stimulus PATCH to `/_ui/theme/scheme` when **symfinity/ui-kernel** is installed. Import `config/routes/theme-scheme.yaml` in the host app. Wire props from `ui_kernel_theme_shell()` or equivalent; non-interactive hosts should use ui-kernel redirect links or boot script instead.

Deprecated one-cycle aliases: `blocks.live.{role}` → `blocks.int.{role}` for former live-tier stl roles.

Optional: `composer require symfinity/ux-runtime` for command palette JSON backend.

## Requirements

- PHP 8.2+
- Symfony 7.4+ / 8.0+
- `symfinity/ux-blocks-extended`
