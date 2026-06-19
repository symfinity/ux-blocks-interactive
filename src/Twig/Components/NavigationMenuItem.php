<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesExplicitIcon;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('NavigationMenu:Item', template: '@UxBlocksInteractive/components/NavigationMenu/Item.html.twig')]
final class NavigationMenuItem
{
    use ResolvesExplicitIcon;

    public string $href = '#';

    /** Ignored — locked start. */
    public string $iconPosition = 'end';

    #[ExposeInTemplate('resolved_menu_item_icon')]
    public function resolvedMenuItemIcon(): ?string
    {
        return $this->resolveExplicitIcon();
    }
}
