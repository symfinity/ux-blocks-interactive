<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('AlertDialog:Cancel', template: '@UxBlocksInteractive/components/AlertDialog/Cancel.html.twig')]
final class AlertDialogCancel
{
    public ?string $variant = null;

    public ?string $appearance = null;

    public ?string $size = null;
}
