<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class ToastIconTest extends ComponentTestCase
{
    #[Test]
    public function successVariantRendersLockedStartIcon(): void
    {
        self::bootKernel();
        $html = (string) $this->renderTwigComponent('Toast:Item', [
            'variant' => 'success',
            'iconPosition' => 'end',
        ], 'Saved');

        self::assertStringContainsString('data-ui-variant="success"', $html);
        self::assertStringContainsString('data-ui-part="icon"', $html);
        self::assertMatchesRegularExpression('/data-ui-part="icon"[\s\S]*Saved/', $html);
    }

    #[Test]
    public function headlessKernelRendersEmptyIconPartWithoutUxIcons(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Toast:Item', [
            'variant' => 'info',
        ]);

        self::assertStringContainsString('data-ui-part="icon"', $html);
    }
}
