<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('CommandPalette:Item', template: '@UxBlocksInteractive/components/CommandPalette/Item.html.twig')]
final class CommandPaletteItem
{
}
