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

See `config/ux_roles.yaml` — **25** shipped `stl` roles (including `command-palette` UI chrome).

Deprecated one-cycle aliases: `blocks.live.{role}` → `blocks.int.{role}` for former live-tier stl roles.

Optional: `composer require symfinity/ux-runtime` for command palette JSON backend.

## Requirements

- PHP 8.2+
- Symfony 7.4+ / 8.0+
- `symfinity/ux-blocks-extended`
