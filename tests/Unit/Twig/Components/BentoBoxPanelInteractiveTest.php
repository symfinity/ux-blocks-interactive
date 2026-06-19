<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;
use Symfinity\UxBlocksExtended\Fixture\ElectronicsSixBoxFixture;

final class BentoBoxPanelInteractiveTest extends ComponentTestCase
{
    #[Test]
    public function emptyBoxesDefaultToDrillDownFixture(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoBoxPanelInteractive');

        self::assertStringContainsString('data-ui-action="bento-drill-open"', $html);
        self::assertStringContainsString('Televisions', $html);
    }

    #[Test]
    public function rootHasInteractiveFragmentAndController(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoBoxPanelInteractive', [
            'boxes' => ElectronicsSixBoxFixture::boxes(),
        ]);

        $this->assertRootAttributes($html, 'bento-box-panel-interactive', 'blocks.int.bento-box-panel-interactive');
        self::assertStringContainsString('data-controller="symfinity--ux-blocks-interactive--bento-box-panel"', $html);
        self::assertStringContainsString('data-ui-role="bento-box-panel"', $html);
        self::assertStringNotContainsString('data-controller="symfony--ux-blocks-extended', $html);
    }

    #[Test]
    public function drillDownFixtureRendersDrillAffordances(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoBoxPanelInteractive', [
            'boxes' => ElectronicsSixBoxFixture::boxes(true),
        ]);

        self::assertStringContainsString('data-ui-action="bento-drill-open"', $html);
        self::assertStringContainsString('data-ui-part="drill-stack-shell"', $html);
    }
}
