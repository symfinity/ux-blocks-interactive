<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ExposesSemanticVariant;
use Symfinity\UxBlocksCore\Twig\NormalizesSemanticColourVariant;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Toggle', template: '@UxBlocksInteractive/components/Toggle.html.twig')]
final class Toggle
{
    use ExposesSemanticVariant;
    use NormalizesSemanticColourVariant;

    public string $variant = 'primary';

    public bool $pressed = false;
}
