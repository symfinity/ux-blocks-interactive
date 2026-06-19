<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class TableOfContentsTest extends ComponentTestCase
{
    #[Test]
    public function rootHasBlocksExtFragmentAndStimulus(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('TableOfContents', [
            'sections' => [
                ['id' => 'intro', 'label' => 'Introduction', 'level' => 2],
                ['id' => 'setup', 'label' => 'Setup', 'level' => 3],
            ],
            'scrollTarget' => '#docs-content',
            'offset' => 64,
        ]);

        $this->assertRootAttributes($html, 'table-of-contents', 'blocks.int.table-of-contents');
        self::assertStringContainsString('data-controller="symfinity--ux-blocks-interactive--table-of-contents"', $html);
        self::assertStringContainsString('data-symfinity--ux-blocks-interactive--table-of-contents-scroll-target-value="#docs-content"', $html);
        self::assertStringContainsString('href="#intro"', $html);
        self::assertStringContainsString('ux-ext-toc__item--nested', $html);
        self::assertStringContainsString('aria-label="On this page"', $html);
    }
}
