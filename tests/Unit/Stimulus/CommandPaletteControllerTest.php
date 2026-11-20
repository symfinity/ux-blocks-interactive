<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Stimulus;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class CommandPaletteControllerTest extends TestCase
{
    #[Test]
    public function searchKeyboardAndEmptyStateAreInTheController(): void
    {
        $path = dirname(__DIR__, 3) . '/assets/controllers/command-palette_controller.js';
        $source = (string) file_get_contents($path);

        self::assertStringContainsString("url.searchParams.set('q', query)", $source);
        self::assertStringContainsString('seq !== this._requestSeq', $source);
        self::assertStringContainsString("event.key === 'ArrowDown'", $source);
        self::assertStringContainsString("event.key === 'ArrowUp'", $source);
        self::assertStringContainsString("setAttribute('aria-selected', 'true')", $source);
        self::assertStringContainsString("event.key === 'Enter'", $source);
        self::assertStringContainsString('item.href', $source);
        self::assertStringContainsString('dataset.url', $source);
        self::assertStringContainsString('this._opener', $source);
        self::assertStringContainsString("setAttribute('data-ui-part', 'empty')", $source);
        self::assertStringContainsString('fallbackCommandsValue', $source);
        preg_match('/connect\(\)\s*\{([^}]*)\}/', $source, $connect);
        self::assertStringNotContainsString('fetch(', $connect[1] ?? $source);
    }
}
