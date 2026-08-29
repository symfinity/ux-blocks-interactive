<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Integration;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;
use Symfinity\UxBlocksCore\SymfinityUxBlocksCoreBundle;
use Symfinity\UxBlocksInteractive\SymfinityUxBlocksInteractiveBundle;

final class BundleRegistrationTest extends KernelTestCase
{
    use InteractsWithTwigComponents;

    protected static function getKernelClass(): string
    {
        return UxBlocksInteractiveTestKernel::class;
    }

    #[Test]
    public function extendedTestKernelRegistersCoreAndExtendedBundles(): void
    {
        self::bootKernel();
        $bundleClasses = array_map(static fn (object $bundle): string => $bundle::class, static::$kernel->getBundles());

        self::assertContains(SymfinityUxBlocksCoreBundle::class, $bundleClasses);
        self::assertContains(SymfinityUxBlocksInteractiveBundle::class, $bundleClasses);
    }

    #[Test]
    public function commandPaletteTwigComponentRenders(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('CommandPalette');

        self::assertStringContainsString('data-ui-fragment="blocks.int.command-palette"', $html);
        self::assertStringContainsString('data-ui-role="command-palette"', $html);
    }
}
