<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Css;

/**
 * Inline role CSS for workshop previews and hosts without AssetMapper link tags.
 * Themed apps SHOULD load {@see assetPath()} via AssetMapper after kernel tokens.
 */
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
        $entry = $this->packageDir . '/assets/styles/blocks-interactive.css';
        if (!is_readable($entry)) {
            return $this->readRoleFile('roles/_bundle.css');
        }

        $content = (string) file_get_contents($entry);
        if (!preg_match_all("/@import\\s+url\\('([^']+)'\\)\\s*;/", $content, $matches)) {
            return $this->readRoleFile('roles/_bundle.css');
        }

        $css = '';
        foreach ($matches[1] as $importPath) {
            $css .= $this->readRoleFile($importPath);
            if ('' !== $css && !str_ends_with($css, "\n")) {
                $css .= "\n";
            }
        }

        return $css;
    }

    private function readRoleFile(string $relativeToStylesDir): string
    {
        $path = $this->packageDir . '/assets/styles/' . $relativeToStylesDir;
        if (!is_readable($path)) {
            return '';
        }

        return (string) file_get_contents($path);
    }
}
