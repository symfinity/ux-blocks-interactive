<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Drawer', template: '@UxBlocksInteractive/components/Drawer.html.twig')]
final class Drawer
{
    public string $side = 'bottom';
}

