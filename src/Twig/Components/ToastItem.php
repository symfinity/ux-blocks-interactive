<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Toast:Item', template: '@UxBlocksInteractive/components/Toast/Item.html.twig')]
final class ToastItem
{
}
