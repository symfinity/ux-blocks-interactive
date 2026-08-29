<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('StackedLayoutInteractive:NavItem', template: '@UxBlocksInteractive/components/StackedLayoutInteractive/NavItem.html.twig')]
final class StackedLayoutInteractiveNavItem
{
    public string $panel = '';
}
