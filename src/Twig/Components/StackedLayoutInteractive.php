<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('StackedLayoutInteractive', template: '@UxBlocksInteractive/components/StackedLayoutInteractive.html.twig')]
final class StackedLayoutInteractive
{
    public string $defaultPanel = '';
}
