<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class ExtendedR2SmokeTest extends ComponentTestCase
{
    #[Test]
    public function treeViewHasBlocksIntFragment(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('TreeView', [
            'nodes' => [
                ['id' => 'root', 'label' => 'Root', 'children' => [
                    ['id' => 'child', 'label' => 'Child'],
                ]],
            ],
            'expanded' => ['root'],
        ]);

        $this->assertRootAttributes($html, 'tree-view', 'blocks.int.tree-view');
        self::assertStringContainsString('role="treeitem"', $html);
    }
}
