<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesSurfaceSubstrate;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Drawer:Content', template: '@UxBlocksInteractive/components/Drawer/Content.html.twig')]
final class DrawerContent
{
    use ResolvesSurfaceSubstrate;

    public function mount(): void
    {
        $this->mountSurfaceSubstrate();
    }
}

