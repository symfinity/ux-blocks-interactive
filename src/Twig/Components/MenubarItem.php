<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Menubar:Item', template: '@UxBlocksInteractive/components/Menubar/Item.html.twig')]
final class MenubarItem
{
    public bool $disabled = false;
}
