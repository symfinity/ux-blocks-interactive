<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('StackedLayoutInteractive:Panel', template: '@UxBlocksInteractive/components/StackedLayoutInteractive/Panel.html.twig')]
final class StackedLayoutInteractivePanel
{
    public string $panel = '';
}
