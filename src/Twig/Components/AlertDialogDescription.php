<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('AlertDialog:Description', template: '@UxBlocksInteractive/components/AlertDialog/Description.html.twig')]
final class AlertDialogDescription
{
}
