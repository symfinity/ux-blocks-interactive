<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesContainerStyle;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Masonry', template: '@UxBlocksInteractive/components/Masonry.html.twig')]
final class Masonry
{
    use ResolvesContainerStyle;

    public ?int $columns = null;

    public string $density = 'comfortable';

    public function mount(): void
    {
        $this->density = $this->normalizeDensity($this->density);
    }
}
