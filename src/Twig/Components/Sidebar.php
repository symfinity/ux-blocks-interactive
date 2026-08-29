<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Sidebar', template: '@UxBlocksInteractive/components/Sidebar.html.twig')]
final class Sidebar
{
    public string $side = 'left';

}
