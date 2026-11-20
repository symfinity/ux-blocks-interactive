<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesExplicitIcon;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('CommandPalette:Item', template: '@UxBlocksInteractive/components/CommandPalette/Item.html.twig')]
final class CommandPaletteItem
{
    use ResolvesExplicitIcon;

    /** Ignored — locked start. */
    public string $iconPosition = 'end';

    public ?string $href = null;

    public ?string $hint = null;

    #[ExposeInTemplate('resolved_menu_item_icon')]
    public function resolvedMenuItemIcon(): ?string
    {
        return $this->resolveExplicitIcon();
    }
}
