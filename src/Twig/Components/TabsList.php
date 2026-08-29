<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Tabs:List', template: '@UxBlocksInteractive/components/Tabs/List.html.twig')]
final class TabsList
{
    public string $orientation = 'horizontal';
}
