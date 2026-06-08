<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('TableOfContents', template: '@UxBlocksInteractive/components/TableOfContents.html.twig')]
final class TableOfContents
{
    /** @var list<array{id: string, label: string, level?: int}> */
    public array $sections = [];

    public string $scrollTarget = '#content';

    public int $offset = 80;

    public bool $smooth = true;

    public string $ariaLabel = 'On this page';
}
