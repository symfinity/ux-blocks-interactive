<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesExplicitIcon;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('ContextMenu:Item', template: '@UxBlocksInteractive/components/ContextMenu/Item.html.twig')]
final class ContextMenuItem
{
    use ResolvesExplicitIcon;

    public bool $disabled = false;

    /** Ignored — locked start. */
    public string $iconPosition = 'end';

    #[ExposeInTemplate('resolved_menu_item_icon')]
    public function resolvedMenuItemIcon(): ?string
    {
        return $this->resolveExplicitIcon();
    }
}
