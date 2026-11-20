<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('AlertDialog:Trigger', template: '@UxBlocksInteractive/components/AlertDialog/Trigger.html.twig')]
final class AlertDialogTrigger
{
    public ?string $variant = null;

    public ?string $appearance = null;

    public ?string $size = null;
}
