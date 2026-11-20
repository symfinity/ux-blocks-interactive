<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('AlertDialog:Action', template: '@UxBlocksInteractive/components/AlertDialog/Action.html.twig')]
final class AlertDialogAction
{
    public ?string $variant = null;

    public ?string $appearance = null;

    public ?string $size = null;
}
