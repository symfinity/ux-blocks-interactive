<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\DependencyInjection;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocksInteractive\DependencyInjection\SymfinityUxBlocksInteractiveExtension;
use Symfinity\UxBlocksInteractive\Http\ThemeSchemeController;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * `kernel.bundles` maps short names to class names; the scheme endpoint loads when ui-kernel is registered.
 */
final class ThemeSchemeServiceLoadingTest extends TestCase
{
    #[Test]
    public function schemeControllerLoadsWithUiKernel(): void
    {
        $container = $this->load(['UiKernelBundle' => 'Symfinity\\UiKernel\\UiKernelBundle']);

        self::assertTrue($container->hasDefinition(ThemeSchemeController::class));
        self::assertTrue($container->getDefinition(ThemeSchemeController::class)->isAutowired());
    }

    #[Test]
    public function schemeControllerIsAbsentWithoutUiKernel(): void
    {
        $container = $this->load(['FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle']);

        self::assertFalse($container->hasDefinition(ThemeSchemeController::class));
    }

    /**
     * @param array<string, class-string> $bundles
     */
    private function load(array $bundles): ContainerBuilder
    {
        $container = new ContainerBuilder();
        $container->setParameter('kernel.bundles', $bundles);
        (new SymfinityUxBlocksInteractiveExtension())->load([], $container);

        return $container;
    }
}
