<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('AlertDialog:Title', template: '@UxBlocksInteractive/components/AlertDialog/Title.html.twig')]
final class AlertDialogTitle
{
}
