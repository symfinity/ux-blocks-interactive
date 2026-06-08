<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('TreeView:Item', template: '@UxBlocksInteractive/components/TreeView/Item.html.twig')]
final class TreeViewItem
{
    public string $id = '';

    public string $label = '';

    public bool $disabled = false;

    public bool $expanded = false;

    public bool $selected = false;

    public bool $hasChildren = false;
}
