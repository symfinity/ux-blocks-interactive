<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Sidebar:Header', template: '@UxBlocksInteractive/components/Sidebar/Header.html.twig')]
final class SidebarHeader
{
}
