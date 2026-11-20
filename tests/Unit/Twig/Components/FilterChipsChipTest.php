<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class FilterChipsChipTest extends ComponentTestCase
{
    #[Test]
    public function chipCarriesItsValue(): void
    {
        $html = $this->renderComponent('FilterChips:Chip', ['value' => 'brand:acme']);

        self::assertStringContainsString('data-value="brand:acme"', $html);
    }

    #[Test]
    public function chipWithoutValueHasNoDataValue(): void
    {
        $html = $this->renderComponent('FilterChips:Chip');

        self::assertStringNotContainsString('data-value', $html);
    }
}
