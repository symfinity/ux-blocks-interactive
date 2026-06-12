<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Css;

final class BlocksInteractiveCssProvider
{
    public function __construct(
        private readonly string $packageDir,
    ) {
    }

    public function assetPath(): string
    {
        return 'ux-blocks-interactive/styles/blocks-interactive.css';
    }

    public function stylesheet(): string
    {
        $bundle = $this->packageDir . '/assets/styles/roles/_bundle.css';
        if (!is_readable($bundle)) {
            return '';
        }

        return (string) file_get_contents($bundle);
    }
}
