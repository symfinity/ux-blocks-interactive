<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Integration;

use PHPUnit\Framework\Attributes\Test;
use Symfinity\UxBlocksCore\Twig\UxBlocksUiAssetsRenderer;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;

/**
 * Tier styles are activated from every installed tier's role catalogue, not core's only.
 */
final class UiAssetsTierActivationTest extends KernelTestCase
{
    use InteractsWithTwigComponents;

    protected static function getKernelClass(): string
    {
        return UxBlocksInteractiveTestKernel::class;
    }

    #[Test]
    public function extendedAndInteractiveComponentsActivateTheirTiers(): void
    {
        self::bootKernel();
        $this->renderTwigComponent('Card', ['title' => 'Card']);
        $this->renderTwigComponent('Tabs');

        $ids = $this->styleIds();

        self::assertContains('ux-blocks-core-css', $ids);
        self::assertContains('ux-blocks-extended-css', $ids);
        self::assertContains('ux-blocks-interactive-css', $ids);
        self::assertSame(
            array_values(array_filter(
                ['ux-blocks-core-css', 'ux-blocks-form-css', 'ux-blocks-extended-css', 'ux-blocks-interactive-css'],
                static fn (string $id): bool => \in_array($id, $ids, true),
            )),
            $ids,
            'tier styles come in tier order, with nothing beyond interactive',
        );
    }

    #[Test]
    public function coreOnlyPagesGetCoreStylesOnly(): void
    {
        self::bootKernel();
        $this->renderTwigComponent('Button', ['label' => 'Go']);

        self::assertSame(['ux-blocks-core-css'], $this->styleIds());
    }

    /**
     * @return list<string>
     */
    private function styleIds(): array
    {
        $renderer = self::getContainer()->get(UxBlocksUiAssetsRenderer::class);
        self::assertInstanceOf(UxBlocksUiAssetsRenderer::class, $renderer);

        preg_match_all('/<style id="([^"]+)"/', $renderer->renderInlineStylesOnce(), $matches);

        return $matches[1];
    }
}
