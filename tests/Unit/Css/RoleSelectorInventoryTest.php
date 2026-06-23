<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * 120 SC-003 — primary role selector inventory for coverage measurement.
 */
final class RoleSelectorInventoryTest extends TestCase
{
    /**
     * Literal selector inventory — scanned by {@see \Symfinity\UxBlocks\DevTools\CssSelectorCoverageReporter}.
     */
    private const SELECTOR_INVENTORY = <<<'SELECTORS'
[data-ui-role="alert-dialog-enhanced"]
[data-ui-role="calendar"]
[data-ui-role="carousel-interactive"]
[data-ui-role="carousel-interactive-controls"]
[data-ui-role="carousel-interactive-item"]
[data-ui-role="carousel-interactive-viewport"]
[data-ui-role="collapsible"]
[data-ui-role="collapsible-content"]
[data-ui-role="collapsible-trigger"]
[data-ui-role="command-palette"]
[data-ui-role="command-palette-item"]
[data-ui-role="context-menu"]
[data-ui-role="context-menu-content"]
[data-ui-role="context-menu-item"]
[data-ui-role="context-menu-trigger"]
[data-ui-role="drawer"]
[data-ui-role="drawer-close"]
[data-ui-role="drawer-content"]
[data-ui-role="drawer-header"]
[data-ui-role="drawer-title"]
[data-ui-role="drawer-trigger"]
[data-ui-role="dropdown-menu"]
[data-ui-role="dropdown-menu-content"]
[data-ui-role="dropdown-menu-item"]
[data-ui-role="dropdown-menu-trigger"]
[data-ui-role="filter-chips"]
[data-ui-role="hover-card"]
[data-ui-role="hover-card-content"]
[data-ui-role="hover-card-trigger"]
[data-ui-role="input-otp"]
[data-ui-role="menu"]
[data-ui-role="menubar"]
[data-ui-role="menubar-content"]
[data-ui-role="menubar-item"]
[data-ui-role="navigation-menu"]
[data-ui-role="navigation-menu-content"]
[data-ui-role="navigation-menu-item"]
[data-ui-role="rating"]
[data-ui-role="resizable"]
[data-ui-role="resizable-handle"]
[data-ui-role="resizable-panel"]
[data-ui-role="scheme-switch"]
[data-ui-role="sheet"]
[data-ui-role="sheet-close"]
[data-ui-role="sheet-content"]
[data-ui-role="sheet-header"]
[data-ui-role="sheet-title"]
[data-ui-role="sheet-trigger"]
[data-ui-role="sidebar"]
[data-ui-role="sidebar-content"]
[data-ui-role="slider"]
[data-ui-role="stacked-layout-interactive"]
[data-ui-role="table-of-contents"]
[data-ui-role="tabs"]
[data-ui-role="tabs-content"]
[data-ui-role="tabs-list"]
[data-ui-role="tabs-trigger"]
[data-ui-role="toast"]
[data-ui-role="toast-item"]
[data-ui-role="toggle"]
[data-ui-role="toggle-group"]
[data-ui-role="toggle-group-item"]
[data-ui-role="tree-view"]
[data-ui-role="tree-view-item"]
SELECTORS;

    private static function bundleCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/_bundle.css';
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function bundleIncludesPrimaryRoleSelectors(): void
    {
        $css = self::bundleCss();

        foreach (self::inventoryRoles() as $role) {
            self::assertStringContainsString('[data-ui-role="' . $role . '"]', $css, $role);
        }
    }

    /**
     * @return list<string>
     */
    private static function inventoryRoles(): array
    {
        preg_match_all('/\[data-ui-role="([^"]+)"\]/', self::SELECTOR_INVENTORY, $matches);

        return $matches[1];
    }
}
