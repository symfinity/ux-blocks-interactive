<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;
use Symfinity\UxBlocksExtended\Fixture\ElectronicsSixBoxFixture;

final class BentoBoxPanelCompositionTest extends ComponentTestCase
{
    #[Test]
    public function drillDownComponentConnectsBentoBoxPanelController(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoBoxPanelInteractive', [
            'boxes' => ElectronicsSixBoxFixture::boxes(true),
        ]);

        self::assertStringContainsString('data-controller="symfinity--ux-blocks-interactive--bento-box-panel"', $html);
        self::assertStringContainsString('data-ui-action="bento-drill-open"', $html);
        self::assertStringContainsString('data-ui-part="drill-stack-shell"', $html);
        self::assertStringNotContainsString('data-controller="symfony--ux-blocks-extended', $html);
    }
}
