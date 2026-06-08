<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class StimulusControllersTest extends TestCase
{
    /** @return array<string, array{0: string, 1: string}> */
    public static function overlayControllerProvider(): array
    {
        return [
            'alert-dialog-enhanced' => ['alert-dialog-enhanced', 'alert-dialog'],
            'drawer' => ['drawer', 'drawer'],
            'sheet' => ['sheet', 'sheet'],
            'context-menu' => ['context-menu', 'context-menu'],
            'hover-card' => ['hover-card', 'hover-card'],
        ];
    }

    /** @return array<string, array{0: string, 1: string}> */
    public static function navigationControllerProvider(): array
    {
        return [
            'menubar' => ['menubar', 'menubar'],
            'navigation-menu' => ['navigation-menu', 'navigation-menu'],
            'sidebar' => ['sidebar', 'sidebar'],
            'stacked-layout-interactive' => ['stacked-layout-interactive', 'stacked-layout-interactive'],
        ];
    }

    #[Test]
    #[DataProvider('overlayControllerProvider')]
    public function overlayControllerAssetExists(string $role, string $controllerSlug): void
    {
        $path = \dirname(__DIR__, 2) . '/assets/controllers/' . $controllerSlug . '_controller.js';

        self::assertFileExists($path, sprintf('Missing Stimulus controller for role "%s"', $role));
        self::assertNotSame('', trim((string) file_get_contents($path)));
    }

    #[Test]
    #[DataProvider('navigationControllerProvider')]
    public function navigationControllerAssetExists(string $role, string $controllerSlug): void
    {
        $path = \dirname(__DIR__, 2) . '/assets/controllers/' . $controllerSlug . '_controller.js';

        self::assertFileExists($path, sprintf('Missing Stimulus controller for role "%s"', $role));
        self::assertNotSame('', trim((string) file_get_contents($path)));
        self::assertStringNotContainsString('connect() {}', (string) file_get_contents($path));
    }

    #[Test]
    public function us1ControllersExist(): void
    {
        foreach (['tabs', 'dropdown-menu'] as $slug) {
            $path = \dirname(__DIR__, 2) . '/assets/controllers/' . $slug . '_controller.js';
            self::assertFileExists($path);
        }
    }

    #[Test]
    public function packageJsonRegistersTabsController(): void
    {
        $path = \dirname(__DIR__, 2) . '/assets/package.json';
        self::assertFileExists($path);

        $package = json_decode((string) file_get_contents($path), true);
        self::assertIsArray($package);
        self::assertSame('@symfinity/ux-blocks-interactive', $package['name'] ?? null);
        self::assertSame(
            'controllers/tabs_controller.js',
            $package['symfony']['controllers']['tabs']['main'] ?? null,
        );
    }

    #[Test]
    public function sharedImportsUseRelativePaths(): void
    {
        $dir = \dirname(__DIR__, 2) . '/assets/controllers';
        foreach (glob($dir . '/*_controller.js') ?: [] as $file) {
            $source = (string) file_get_contents($file);
            self::assertDoesNotMatchRegularExpression(
                "/from ['\"]ux-blocks-interactive\\/controllers\\//",
                $source,
                basename($file) . ' must import shared helpers via ./shared/ (AssetMapper resolves relative paths only)',
            );
        }
    }

    #[Test]
    public function toastAndCarouselControllersAreNonEmpty(): void
    {
        $toastPath = \dirname(__DIR__, 2) . '/assets/controllers/toast_controller.js';
        self::assertFileExists($toastPath);
        $toast = (string) file_get_contents($toastPath);
        self::assertStringContainsString('stackLimit', $toast);
        self::assertStringContainsString('dismissItem', $toast);

        $carouselPath = \dirname(__DIR__, 2) . '/assets/controllers/carousel-interactive_controller.js';
        self::assertFileExists($carouselPath);
        $carousel = (string) file_get_contents($carouselPath);
        self::assertStringContainsString('connect()', $carousel);
        self::assertStringContainsString('_onKeydown', $carousel);
    }

    #[Test]
    public function tableOfContentsControllerExists(): void
    {
        $path = \dirname(__DIR__, 2) . '/assets/controllers/table-of-contents_controller.js';

        self::assertFileExists($path);
        $contents = (string) file_get_contents($path);
        self::assertStringContainsString('IntersectionObserver', $contents);
        self::assertStringNotContainsString('connect() {}', $contents);
    }
}
