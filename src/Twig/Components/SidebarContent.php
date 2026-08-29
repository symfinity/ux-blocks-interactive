<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Sidebar:Content', template: '@UxBlocksInteractive/components/Sidebar/Content.html.twig')]
final class SidebarContent
{
}
