# Changelog

All notable changes to **symfinity/ux-blocks-interactive** are documented here.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [0.1.0] - 2026-06-27

First public Packagist release — twenty-seven Stimulus-backed interactive roles.

### Added

- Symfony bundle `SymfinityUxBlocksInteractiveBundle`
- **27** `blocks.int.*` UX Twig component roles with package Stimulus controllers and role CSS:
  - **Navigation & layout** — `Tabs`, `Sidebar`, `NavigationMenu`, `Menubar`, `StackedLayoutInteractive`, `BentoBoxPanelInteractive`, `TableOfContents`, `TreeView`
  - **Overlays & menus** — `Drawer`, `Sheet`, `AlertDialog`, `DropdownMenu`, `ContextMenu`, `HoverCard`, `CommandPalette`
  - **Inputs & controls** — `Slider`, `Toggle`, `ToggleGroup`, `Calendar`, `InputOtp`, `Rating`, `FilterChips`, `Collapsible`
  - **Feedback & media** — `Toast`, `CarouselInteractive`, `Resizable`, `SchemeSwitch`
- Role registry (`config/ux_roles.yaml`, revision 1.4) with icon slots on `DropdownMenu` and `Toast`
- Optional `symfinity/ux-runtime` integration for `CommandPalette` JSON command sources
- Deprecated fragment aliases from `blocks.ext.*` and `blocks.live.*` → `blocks.int.*` (sunset next minor)
- Consumer handbook — spine pages plus 27 component-detail pages under `docs/components/`
- Twenty-seven `config/component-examples/{role}.yaml` manifests for symfinity-docs SSR
- Asset Mapper bundle CSS entry and per-role stylesheets
- Split mirror metadata (LICENSE, CONTRIBUTING, CI, PHPStan)

### Requirements

- PHP 8.2+
- Symfony 7.4 or 8.x
- `symfinity/ux-blocks-extended` `^0.1`
- `symfinity/ux-blocks-form` `^0.1`

### Notes

- LiveComponents (`blocks.live.*`) ship in `symfinity/ux-blocks-live`, not this package
- Install the complete catalog with `symfinity/ux-blocks-full` or require tiers individually

[Unreleased]: https://github.com/symfinity/ux-blocks-interactive/compare/v0.1.0...main
[0.1.0]: https://github.com/symfinity/ux-blocks-interactive/releases/tag/v0.1.0
