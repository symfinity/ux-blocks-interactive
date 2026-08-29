<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesSurfaceSubstrate;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('DropdownMenu:Content', template: '@UxBlocksInteractive/components/DropdownMenu/Content.html.twig')]
final class DropdownMenuContent
{
    use ResolvesSurfaceSubstrate;

    public function mount(): void
    {
        $this->mountSurfaceSubstrate();
    }
}
