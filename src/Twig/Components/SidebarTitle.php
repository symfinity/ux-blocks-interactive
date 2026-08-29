<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Sidebar:Title', template: '@UxBlocksInteractive/components/Sidebar/Title.html.twig')]
final class SidebarTitle
{
}
