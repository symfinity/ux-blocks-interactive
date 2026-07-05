# Changelog

All notable changes to **symfinity/ux-blocks-interactive** are documented here.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.1.3] - 2026-07-05

### Added

- Handbook [verification.md](docs/verification.md) — P2 integration profile and clean-app smoke (`composer require`, interactive tier CSS markers with ux-blocks-core auto-inject)
- **`integration_profile: P2`** frontmatter on handbook index

### Changed

- **Grouped component examples** — all twenty-seven `config/component-examples/*.yaml` manifests use `groups[]` with `slot_twig` for symfinity-docs handbook SSR
- **Role CSS cascade** — committed `blocks-interactive.css` and `BlocksInteractiveCssProvider::stylesheet()` wrap tier output in `@layer blocks.interactive`; dedicated `icon-slot.css` collapses empty icon gutters when optional UX Icons are absent
- **PHPUnit bootstrap** — `tests/bootstrap.php` resolves monorepo or split-mirror Composer autoload; optional `tests/bootstrap.local.php` hook

### Notes

- No Twig component props or registry role ids changed — OOTB handbook and CSS cascade hygiene after **v0.1.2**
- Pair with `symfinity/ux-blocks-core` **^0.1.6** (or newer) for automatic inline tier CSS when interactive fragments render
- **Toast:Item** uses `ResolvesFeedbackVariantIcon` from core — require `symfinity/ux-blocks-core` **^0.1.3** when upgrading from early **0.1.x** patches
- Upgrading from **0.1.2** needs no config edits; clear Symfony cache if AssetMapper or Twig cached CSS in dev

## [0.1.2] - 2026-06-29

### Added

- **[ROADMAP.md](ROADMAP.md)** — public milestone table for the 0.1.x → 1.0.x release line
- **[SUPPORTERS.md](SUPPORTERS.md)** — sponsor acknowledgment page linked from Symfinity OSS funding
- **`.github/FUNDING.yml`** — GitHub Sponsors link on the split mirror (Composer `funding` metadata shipped in **0.1.1**)

### Notes

- No registry role id, Twig prop, or Stimulus API changes — maintainer metadata and split-mirror hygiene after **0.1.1**
- PHPUnit CSS regression coverage asserts **SchemeSwitch** `appearance: none` chrome delivered in **0.1.1**
- Hard-refresh Asset Mapper assets in dev after upgrade if interactive widgets look stale

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
