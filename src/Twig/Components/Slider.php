<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ExposesSemanticVariant;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Slider', template: '@UxBlocksInteractive/components/Slider.html.twig')]
final class Slider
{
    use ExposesSemanticVariant;

    public string $variant = 'primary';

    public int $min = 0;

    public int $max = 100;

    public int $step = 1;

    public int $value = 50;
}
