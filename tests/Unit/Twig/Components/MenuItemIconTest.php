<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class MenuItemIconTest extends ComponentTestCase
{
    #[Test]
    public function dropdownMenuItemRendersLeadingIcon(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('DropdownMenu:Item', [
            'icon' => 'lucide:copy',
            'iconPosition' => 'end',
        ], 'Copy');

        self::assertStringContainsString('data-ui-part="menu-item-body"', $html);
        self::assertMatchesRegularExpression('/data-ui-part="icon"[\s\S]*Copy/', $html);
    }

    #[Test]
    public function commandPaletteItemRendersLeadingIcon(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('CommandPalette:Item', [
            'icon' => 'lucide:search',
        ], 'Find');

        self::assertStringContainsString('data-ui-role="command-palette-item"', $html);
        self::assertStringContainsString('data-ui-part="icon"', $html);
    }
}
