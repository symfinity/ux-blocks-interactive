<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('SchemeSwitch', template: '@UxBlocksInteractive/components/SchemeSwitch.html.twig')]
final class SchemeSwitch
{
    public ?string $label = null;

    public bool $disabled = false;

    /** Stored preference — may be `auto`; UI resolves via {@see $colorScheme}. */
    public string $scheme = 'auto';

    /** Resolved native scheme for binary switch UI (`light` | `dark`). */
    public string $colorScheme = 'light';

    public bool $enhanced = true;

    public string $schemeEndpoint = '/_ui/theme/scheme';

    /**
     * @var list<array{scheme: string, url: string, active: bool}>
     */
    public array $links = [];
}
