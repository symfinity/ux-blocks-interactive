<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ExposesSemanticVariant;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Toggle', template: '@UxBlocksInteractive/components/Toggle.html.twig')]
final class Toggle
{
    use ExposesSemanticVariant;

    public string $variant = 'primary';

    public bool $pressed = false;
}
