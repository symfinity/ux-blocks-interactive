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
        self::assertStringContainsString("setAttribute('data-ui-part', 'status')", $source);
        self::assertStringContainsString('fallbackCommandsValue', $source);
        preg_match('/connect\(\)\s*\{([^}]*)\}/', $source, $connect);
        self::assertStringNotContainsString('fetch(', $connect[1] ?? $source);
    }

    #[Test]
    public function openFetchesAndTheListIsACombobox(): void
    {
        $source = $this->controllerSource();

        preg_match('/open\(event\)\s*\{([^}]*)\}/', $source, $open);
        self::assertStringContainsString('this._fetchCommands()', $open[1] ?? '');
        self::assertStringContainsString("setAttribute('role', 'listbox')", $source);
        self::assertStringContainsString("setAttribute('role', 'option')", $source);
        self::assertStringContainsString("setAttribute('role', 'combobox')", $source);
        self::assertStringContainsString('aria-activedescendant', $source);
        self::assertStringContainsString('event.target === this.element', $source);
        self::assertStringContainsString("event.key === 'Tab'", $source);
        self::assertStringContainsString('emptyLabelValue', $source);
        self::assertStringContainsString('loadingLabelValue', $source);
        self::assertStringContainsString('failureLabelValue', $source);
        self::assertStringNotContainsString("textContent = 'No matching commands'", $source);
    }

    #[Test]
    public function localFilteringDoesNotRebuildTheList(): void
    {
        $source = $this->controllerSource();

        preg_match('/_filterExisting\(\)\s*\{(.*?)\n    \}\n\n    _/s', $source, $filter);
        self::assertNotSame('', $filter[1] ?? '');
        self::assertStringNotContainsString('replaceChildren', $filter[1] ?? '');
        self::assertStringNotContainsString('_renderDynamic', $filter[1] ?? '');
        self::assertStringContainsString('item.hidden', $filter[1] ?? '');
    }

    private function controllerSource(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/controllers/command-palette_controller.js';

        return (string) file_get_contents($path);
    }
}
