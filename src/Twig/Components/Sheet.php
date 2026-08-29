<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Sheet', template: '@UxBlocksInteractive/components/Sheet.html.twig')]
final class Sheet
{
    public string $side = 'right';
}

