<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ExposesSemanticVariant;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Rating', template: '@UxBlocksInteractive/components/Rating.html.twig')]
final class Rating
{
    use ExposesSemanticVariant;

    public string $variant = 'warning';

    public int $max = 5;

    public int $value = 0;
}
