<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocksInteractive\Css\BlocksInteractiveCssProvider;

final class BlocksInteractiveCssTest extends TestCase
{
    private static function bundleCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/_bundle.css';
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function bundleIncludesInteractiveTierRootRoles(): void
    {
        $css = self::bundleCss();

        foreach ([
            'collapsible', 'tabs', 'slider', 'toggle', 'drawer', 'sheet', 'dropdown-menu',
            'command-palette', 'table-of-contents',
        ] as $role) {
            self::assertStringContainsString('[data-ui-role="' . $role . '"]', $css, $role);
        }
    }

    #[Test]
    public function bundleIncludesAnchorMenuRules(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString('[data-ui-anchor="trigger"]', $css);
        self::assertStringContainsString('[data-ui-role="menu"]', $css);
        self::assertStringContainsString('[data-ui-role="menu"][popover][anchor]', $css);
        self::assertStringContainsString('top: anchor(bottom)', $css);
        self::assertStringContainsString('left: anchor(left)', $css);
        self::assertStringContainsString('anchor-name: --ui-menu-trigger', $css);
        self::assertStringContainsString('@supports not (anchor-name: --ui-menu-trigger)', $css);
        self::assertStringContainsString('[data-ui-role="menu"]:not([popover])', $css);
    }

    #[Test]
    public function menuItemHoverUsesOverlaySurfaceMixNotElevatedToken(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString(
            '[data-ui-role="dropdown-menu-item"]:hover:not(:disabled):not([aria-disabled="true"])',
            $css,
        );
        self::assertStringContainsString(
            'color-mix(in srgb, var(--ui-color-text-muted) 14%, var(--ui-overlay-surface))',
            $css,
        );
        self::assertDoesNotMatchRegularExpression(
            '/\[data-ui-role="dropdown-menu-item"\]:hover[^\{]*\{[^}]*var\(--ui-color-surface-elevated\)/s',
            $css,
        );
    }

    #[Test]
    public function overlayPanelRulesCoverDrawerSheetAndHoverCard(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString('[data-ui-role="drawer-content"][data-ui-side="bottom"]', $css);
        self::assertStringContainsString('[data-ui-role="sheet-content"][data-ui-side="right"]', $css);
        self::assertStringContainsString('[data-ui-role="hover-card-content"]:not([hidden])', $css);
        self::assertStringContainsString('z-index: var(--ui-z-popover)', $css);
    }

    #[Test]
    public function bundleDoesNotOwnExtendedDialogOrPopoverRoots(): void
    {
        $css = self::bundleCss();

        foreach (['dialog', 'modal', 'popover'] as $role) {
            self::assertDoesNotMatchRegularExpression(
                '/^\[data-ui-role="' . preg_quote($role, '/') . '"\]/m',
                $css,
                $role,
            );
        }
    }

    #[Test]
    public function bundleIncludesSchemeSwitchRootRole(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString('[data-ui-role="scheme-switch"]', $css);
    }

    #[Test]
    public function stylesheetResolvesEntryImportsIncludingSchemeSwitch(): void
    {
        $packageDir = dirname(__DIR__, 3);
        $css = (new BlocksInteractiveCssProvider($packageDir))->stylesheet();

        self::assertStringContainsString('[data-ui-role="scheme-switch"]', $css);
        self::assertStringContainsString('--scheme-switch-track-width', $css);
        self::assertStringContainsString('[data-ui-part="scheme-switch-chrome"]', $css);
        self::assertStringContainsString('[data-ui-role="collapsible"]', $css);
    }
}
