# Changelog

All notable changes to **symfinity/ux-blocks-interactive** are documented here.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.1.1] - 2026-06-29

### Added

- **CommandPalette** — `open()` / `close()` Stimulus actions and a `command-palette:open` DOM event for programmatic open from toolbar buttons or custom shortcuts
- **CommandPalette** — multi-token search across item label, `category`, and `keywords` when loading commands from a runtime JSON endpoint
- **TableOfContents** — reads `--ui-scroll-offset` from ui-kernel CSS and listens for `docs:header-offset-changed` when sticky handbook chrome resizes
- Composer **`funding`** metadata for [GitHub Sponsors](https://github.com/sponsors/serotoninja)

### Changed

- **SchemeSwitch** role CSS — native toggle chrome (`appearance: none`), focus-visible ring, disabled state, and `color-scheme: light dark` on the thumb track
- **TableOfContents** — scroll-to-section honours the configured offset for fixed headers and nested scroll roots
- **Split mirror CI** — Composer package cache and `GITHUB_TOKEN` authentication so GitHub Actions reliably resolves `symfinity/*` dependencies across the PHP × Symfony matrix; PHPStan on every cell
- Explicit **`symfinity/ux-blocks-core` `^0.1`** require (transitive-only at `v0.1.0`)

### Fixed

- **CommandPalette** — runtime-rendered items use the correct `data-symfinity--ux-blocks-interactive--command-palette-target` attribute so keyboard filtering applies to fetched commands

### Notes

- No registry role id or Twig prop changes — patch after first public `v0.1.0`
- Hard-refresh Asset Mapper assets in dev after upgrade if command palette or scheme switch behaviour looks stale
- Upgrading from **0.1.0** needs no config or template edits unless you wire `command-palette:open` or handbook header-offset events

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
