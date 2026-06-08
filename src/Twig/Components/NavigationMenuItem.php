<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('NavigationMenu:Item', template: '@UxBlocksInteractive/components/NavigationMenu/Item.html.twig')]
final class NavigationMenuItem
{
    public string $href = '#';
}
