<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Tabs:Content', template: '@UxBlocksInteractive/components/Tabs/Content.html.twig')]
final class TabsContent
{
    public string $value = '';

    /** Matches Tabs defaultValue for SSR visibility before Stimulus connects. */
    public bool $active = false;
}
