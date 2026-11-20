<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class CommandPaletteLayerTest extends TestCase
{
    #[Test]
    public function openPaletteIsFixedAndItemsKeepTheirHint(): void
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/_bundle.css';
        self::assertFileExists($path);
        $css = (string) file_get_contents($path);
        $css = (string) preg_replace(
            '/\[(data-ui-[a-z-]+)=([^\]"=\s][^\]"]*)\]/',
            '[$1="$2"]',
            $css,
        );

        self::assertMatchesRegularExpression(
            '/\[data-ui-role="command-palette"\]:not\(\[hidden\]\)\s*\{[^}]*position:\s*fixed/s',
            $css,
        );
        self::assertMatchesRegularExpression(
            '/\[data-ui-role="command-palette-item"\]\s*\{[^}]*box-sizing:\s*border-box[^}]*width:\s*100%[^}]*min-width:\s*0/s',
            $css,
        );
        self::assertMatchesRegularExpression(
            '/\[data-ui-part="hint"\]\s*\{[^}]*overflow:\s*visible/s',
            $css,
        );
        self::assertDoesNotMatchRegularExpression(
            '/\[data-ui-part="hint"\]\s*\{[^}]*text-overflow:\s*ellipsis/s',
            $css,
        );
    }
}
