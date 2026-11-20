<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('FilterChips:Chip', template: '@UxBlocksInteractive/components/FilterChips/Chip.html.twig')]
final class FilterChipsChip
{
    /** Machine value sent in the remove event (`detail.value`), e.g. `brand:acme`. */
    public ?string $value = null;
}
