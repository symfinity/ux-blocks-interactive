<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('AlertDialog:Cancel', template: '@UxBlocksInteractive/components/AlertDialog/Cancel.html.twig')]
final class AlertDialogCancel
{
}
