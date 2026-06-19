<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Menubar:Panel', template: '@UxBlocksInteractive/components/Menubar/Panel.html.twig')]
final class MenubarPanel
{
    public ?string $panelId = null;

    private string $generatedPanelId = '';

    public function mount(): void
    {
        if ($this->generatedPanelId === '') {
            $this->generatedPanelId = null !== $this->panelId && '' !== $this->panelId
                ? $this->panelId
                : 'menubar-panel-' . bin2hex(random_bytes(4));
        }
    }

    #[ExposeInTemplate('menubar_panel_id')]
    public function panelId(): string
    {
        return $this->generatedPanelId;
    }
}
