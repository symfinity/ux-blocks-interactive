<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class CommandPaletteItemTest extends ComponentTestCase
{
    #[Test]
    public function linkItemRendersAnAnchorAndAHint(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('CommandPalette:Item', [
            'href' => '/layout',
            'hint' => 'Wide table',
        ], 'Open layout');

        self::assertMatchesRegularExpression('/<a[^>]*data-ui-role="command-palette-item"/', $html);
        self::assertStringContainsString('href="/layout"', $html);
        self::assertStringContainsString('<span data-ui-part="hint">', $html);
        self::assertStringContainsString('Wide table', $html);
    }

    #[Test]
    public function itemWithoutHrefStaysAButton(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('CommandPalette:Item', [], 'Stay');

        self::assertMatchesRegularExpression('/<button[^>]*data-ui-role="command-palette-item"/', $html);
        self::assertStringNotContainsString('<a', $html);
    }
}
