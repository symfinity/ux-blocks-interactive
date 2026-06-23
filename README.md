<div align="center">

# UX Blocks Interactive

### Stimulus-backed interactive widgets with blocks.int fragments

[![PHP Version](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)](composer.json)
[![Symfony](https://img.shields.io/badge/Symfony-7.4+-343434?style=flat&logo=symfony&logoColor=white)](composer.json)
<br/>
[![CI](https://github.com/symfinity/ux-blocks-interactive/actions/workflows/ci.yml/badge.svg)](https://github.com/symfinity/ux-blocks-interactive/actions/workflows/ci.yml)
<br/>
[![Release](https://img.shields.io/packagist/v/symfinity/ux-blocks-interactive.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ux-blocks-interactive)
[![Downloads](https://img.shields.io/packagist/dt/symfinity/ux-blocks-interactive.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ux-blocks-interactive)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)

</div>

> [!NOTE]
> **Read-only mirror.**
> See [CONTRIBUTING.md](CONTRIBUTING.md) for how to propose changes.

## Features

- **27 interactive roles** — tabs, drawers, menus, toasts, and scheme switch
- **Client widgets (`stl`)** — package Stimulus controllers with ui-kernel styling
- **Registry-aligned** — `blocks.int.*` fragment ids
- **Requires extended tier** — compounds from `symfinity/ux-blocks-extended`
- **Flex recipe** — bundle and Stimulus assets on install

## Interaction profile

| Token | In this package |
|-------|-----------------|
| `stl` | Default for all roles — Stimulus widgets with package CSS |
| `runtime` | Optional on `CommandPalette` when `symfinity/ux-runtime` is installed |
| `live` | **Not included** — LiveComponents ship in `symfinity/ux-blocks-live` |

## Component inventory


<!-- ux-blocks:registry:start -->
| Role | Twig | Interaction | Fragment | Status |
|------|------|-------------|----------|--------|
| collapsible | Collapsible | stl | `blocks.int.collapsible` | shipped |
| tabs | Tabs | stl | `blocks.int.tabs` | shipped |
| alert-dialog-enhanced | AlertDialog | stl | `blocks.int.alert-dialog-enhanced` | shipped |
| drawer | Drawer | stl | `blocks.int.drawer` | shipped |
| sheet | Sheet | stl | `blocks.int.sheet` | shipped |
| dropdown-menu | DropdownMenu | stl | `blocks.int.dropdown-menu` | shipped |
| slider | Slider | stl | `blocks.int.slider` | shipped |
| toggle | Toggle | stl | `blocks.int.toggle` | shipped |
| toggle-group | ToggleGroup | stl | `blocks.int.toggle-group` | shipped |
| scheme-switch | SchemeSwitch | stl | `blocks.int.scheme-switch` | shipped |
| calendar | Calendar | stl | `blocks.int.calendar` | shipped |
| input-otp | InputOtp | stl | `blocks.int.input-otp` | shipped |
| sidebar | Sidebar | stl | `blocks.int.sidebar` | shipped |
| stacked-layout-interactive | StackedLayoutInteractive | stl | `blocks.int.stacked-layout-interactive` | shipped |
| command-palette | CommandPalette | stl, runtime | `blocks.int.command-palette` | shipped |
| toast | Toast | stl | `blocks.int.toast` | shipped |
| context-menu | ContextMenu | stl | `blocks.int.context-menu` | shipped |
| hover-card | HoverCard | stl | `blocks.int.hover-card` | shipped |
| resizable | Resizable | stl | `blocks.int.resizable` | shipped |
| menubar | Menubar | stl | `blocks.int.menubar` | shipped |
| navigation-menu | NavigationMenu | stl | `blocks.int.navigation-menu` | shipped |
| carousel-interactive | CarouselInteractive | stl | `blocks.int.carousel-interactive` | shipped |
| rating | Rating | stl | `blocks.int.rating` | shipped |
| filter-chips | FilterChips | stl | `blocks.int.filter-chips` | shipped |
| table-of-contents | TableOfContents | stl | `blocks.int.table-of-contents` | shipped |
| tree-view | TreeView | stl | `blocks.int.tree-view` | shipped |
| bento-box-panel-interactive | BentoBoxPanelInteractive | stl | `blocks.int.bento-box-panel-interactive` | shipped |
<!-- ux-blocks:registry:end -->

**Highlights:** scheme switch for light/dark toggle; command palette UI chrome; sidebar and navigation menus.

Handbook: [docs/components.md](docs/components.md).

## Prerequisites

Add the [symfinity/recipes](https://github.com/symfinity/recipes) Flex endpoint to your project's `composer.json` (see [recipes README](https://github.com/symfinity/recipes/blob/main/README.md)) — recipes are not in Symfony's official recipe repository yet.

## Installation

```bash
composer require symfinity/ux-blocks-interactive
```

See [Installation](docs/installation.md).

## Quick Start

```twig
<twig:Tabs>
  <twig:Header>Account</twig:Header>
</twig:Tabs>
<twig:SchemeSwitch />
```

See [Quick start](docs/quickstart.md) for the full walkthrough.

## Documentation

- **[Quick start](docs/quickstart.md)** — minimal setup path
- **[Installation](docs/installation.md)** — Flex, dependencies, verify
- **[Configuration](docs/configuration.md)** — bundle and app options
- **[Usage](docs/usage.md)** — day-to-day patterns
- **[Upgrade](docs/upgrade.md)** — version migrations

## Requirements

- PHP 8.2 or higher
- Symfony 7.4 or 8.x
- `symfinity/ux-blocks-extended` ^0.1

## Support

- [GitHub Issues](https://github.com/symfinity/ux-blocks-interactive/issues)
- [Security](.github/SECURITY.md)
- [Contributing](CONTRIBUTING.md)

## License

[MIT](LICENSE)
