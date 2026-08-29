<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfinity\UxBlocksExtended\Fixture\ElectronicsSixBoxFixture;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent('BentoBoxPanelInteractive', template: '@UxBlocksInteractive/components/BentoBoxPanelInteractive.html.twig')]
final class BentoBoxPanelInteractive
{
    /**
     * @var list<array{
     *     heading: string,
     *     items: list<array{
     *         label: string,
     *         href: string,
     *         children?: list<array{label: string, href: string}>
     *     }>,
     *     column: int,
     *     icon?: string|null,
     *     size?: string,
     *     layout?: string,
     *     categoryHref?: string|null
     * }>
     */
    public array $boxes = [];

    #[PostMount]
    public function applyMoodboardFixtureWhenEmpty(): void
    {
        if ([] === $this->boxes) {
            $this->boxes = ElectronicsSixBoxFixture::boxes(true);
        }
    }
}
