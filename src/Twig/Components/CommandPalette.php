<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('CommandPalette', template: '@UxBlocksInteractive/components/CommandPalette.html.twig')]
final class CommandPalette
{
    public string $commandsUrl = '';

    public string $placeholder = 'Search…';

    public string $openHotkey = 'k';

    /** @var list<array<string, mixed>> */
    public array $fallbackCommands = [];

    public ?string $label = null;

    public string $emptyLabel = 'No matching commands';

    public string $loadingLabel = 'Loading commands';

    public string $failureLabel = 'Could not load commands';
}
