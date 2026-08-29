<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesFeedbackVariantIcon;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Toast:Item', template: '@UxBlocksInteractive/components/Toast/Item.html.twig')]
final class ToastItem
{
    use ResolvesFeedbackVariantIcon;

    /** Ignored — locked start. */
    public string $iconPosition = 'end';

    #[ExposeInTemplate('resolved_toast_icon')]
    public function resolvedToastIcon(): ?string
    {
        return $this->resolveFeedbackVariantIcon();
    }
}
