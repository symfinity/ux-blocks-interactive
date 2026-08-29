<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig;

use Symfinity\UxBlocksInteractive\Css\BlocksInteractiveCssProvider;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class BlocksInteractiveStylesExtension extends AbstractExtension
{
    public function __construct(
        private readonly BlocksInteractiveCssProvider $cssProvider,
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('ux_blocks_interactive_stylesheet', $this->cssProvider->stylesheet(...), ['is_safe' => ['html']]),
        ];
    }
}
