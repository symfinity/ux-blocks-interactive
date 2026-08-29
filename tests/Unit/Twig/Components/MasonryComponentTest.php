<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class MasonryComponentTest extends ComponentTestCase
{
    #[Test]
    public function rootHasRoleFragmentControllerAndColumns(): void
    {
        self::bootKernel();

        $html = $this->renderComponent('Masonry', [
            'columns' => 3,
            'density' => 'comfortable',
        ], <<<'TWIG'
            <twig:Card><twig:block name="content">Tile</twig:block></twig:Card>
            TWIG);

        $this->assertRootAttributes($html, 'masonry', 'blocks.int.masonry');
        self::assertStringContainsString('data-controller="symfinity--ux-blocks-interactive--masonry"', $html);
        self::assertStringContainsString('data-ui-part="masonry-layout"', $html);
        self::assertStringContainsString('data-ui-columns="3"', $html);
        self::assertStringContainsString('data-ui-density="comfortable"', $html);
        self::assertStringContainsString('--ui-density: comfortable;', $html);
    }

    #[Test]
    public function cellRendersMasonryCellRoleWithoutSpan(): void
    {
        self::bootKernel();

        $html = $this->renderComponent('Masonry:Cell', [], '<span>Wrapped</span>');

        self::assertStringContainsString('data-ui-role="masonry-cell"', $html);
        self::assertStringNotContainsString('data-ui-span', $html);
        self::assertStringContainsString('Wrapped', $html);
    }
}
