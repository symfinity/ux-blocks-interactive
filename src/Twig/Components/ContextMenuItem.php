<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('ContextMenu:Item', template: '@UxBlocksInteractive/components/ContextMenu/Item.html.twig')]
final class ContextMenuItem
{
    public bool $disabled = false;
}

