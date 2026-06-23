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

See `config/ux_roles.yaml` — **27** shipped `stl` roles (including `scheme-switch` and `command-palette` UI chrome). Registry schema **1.4** declares composition-language facets where roles use the shared modifier lexicon (`variant` on `Slider`, `Toggle`, `Rating`). Universal region components (`Header`, `Footer`, `Media`, `Actions`, `Aside`) live in `symfinity/ux-blocks-core`.

## SchemeSwitch

Binary ghost light/dark toggle with Stimulus PATCH to `/_ui/theme/scheme` when **symfinity/ui-kernel** is installed. Import `config/routes/theme-scheme.yaml` in the host app. Wire props from `ui_kernel_theme_shell()` or equivalent; non-interactive hosts should use ui-kernel redirect links or boot script instead.

Deprecated one-cycle aliases: `blocks.live.{role}` → `blocks.int.{role}` for former live-tier stl roles.

Optional: `composer require symfinity/ux-runtime` for command palette JSON backend.

## Maintainer Sass pipeline (120)

Author role CSS in `assets/scss/` (`_shared/`, `partials/`, per-role files). From product monorepo root:

```bash
cd src/symfinity
bin/blocks-css-compile --package=ux-blocks-interactive --check
bin/ux-blocks-scss-audit --package=ux-blocks-interactive --check
```

See [ux-blocks maintainer Sass pipeline](../ux-blocks/README.md#maintainer--sass-author-pipeline-120).

## Requirements

- PHP 8.2+
- Symfony 7.4+ / 8.0+
- `symfinity/ux-blocks-extended`


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
