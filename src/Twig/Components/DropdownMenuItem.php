<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('DropdownMenu:Item', template: '@UxBlocksInteractive/components/DropdownMenu/Item.html.twig')]
final class DropdownMenuItem
{
    public bool $disabled = false;
}
