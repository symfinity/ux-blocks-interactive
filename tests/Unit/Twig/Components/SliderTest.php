<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class SliderTest extends ComponentTestCase
{
    #[Test]
    public function rendersRangeWithMountProps(): void
    {
        $html = $this->renderComponent('Slider', [
            'min' => 10,
            'max' => 90,
            'step' => 5,
            'value' => 45,
        ]);

        $this->assertRootAttributes($html, 'slider', 'blocks.int.slider');
        self::assertStringContainsString('data-symfony--ux-blocks-interactive--slider-min-value="10"', $html);
        self::assertStringContainsString('data-symfony--ux-blocks-interactive--slider-max-value="90"', $html);
        self::assertStringContainsString('data-symfony--ux-blocks-interactive--slider-step-value="5"', $html);
        self::assertStringContainsString('min="10"', $html);
        self::assertStringContainsString('max="90"', $html);
        self::assertStringContainsString('step="5"', $html);
        self::assertStringContainsString('value="45"', $html);
        self::assertStringContainsString('<output', $html);
        self::assertStringContainsString('>45</output>', $html);
    }

    #[Test]
    public function rendersSemanticVariantAttribute(): void
    {
        $html = $this->renderComponent('Slider', [
            'variant' => 'success',
            'value' => 50,
        ]);

        self::assertStringContainsString('data-ui-variant="success"', $html);
    }
}
