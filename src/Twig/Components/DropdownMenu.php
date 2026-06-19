<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('DropdownMenu', template: '@UxBlocksInteractive/components/DropdownMenu.html.twig')]
final class DropdownMenu
{
    public ?string $menuId = null;

    private string $generatedMenuId = '';

    public function mount(): void
    {
        if ($this->generatedMenuId === '') {
            $this->generatedMenuId = null !== $this->menuId && '' !== $this->menuId
                ? $this->menuId
                : 'dropdown-menu-' . bin2hex(random_bytes(4));
        }
    }

    #[ExposeInTemplate('dropdown_menu_id')]
    public function menuId(): string
    {
        return $this->generatedMenuId;
    }
}
