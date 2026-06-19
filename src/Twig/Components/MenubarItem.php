<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesExplicitIcon;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Menubar:Item', template: '@UxBlocksInteractive/components/Menubar/Item.html.twig')]
final class MenubarItem
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
