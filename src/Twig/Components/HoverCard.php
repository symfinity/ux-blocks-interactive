<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('HoverCard', template: '@UxBlocksInteractive/components/HoverCard.html.twig')]
final class HoverCard
{
    public int $openDelay = 200;

    public int $closeDelay = 100;

    public ?string $cardId = null;

    public bool $nativeInterest = true;

    private string $generatedCardId = '';

    public function mount(): void
    {
        if ($this->generatedCardId === '') {
            $this->generatedCardId = null !== $this->cardId && '' !== $this->cardId
                ? $this->cardId
                : 'hover-card-' . bin2hex(random_bytes(4));
        }
    }

    #[ExposeInTemplate('hover_card_id')]
    public function cardId(): string
    {
        return $this->generatedCardId;
    }

    #[ExposeInTemplate('hover_card_native_interest')]
    public function usesNativeInterest(): bool
    {
        return $this->nativeInterest;
    }
}
