<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Stimulus;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ToastShowTest extends TestCase
{
    #[Test]
    public function showReadsMessageAndVariantFromParamsThenDetail(): void
    {
        $path = dirname(__DIR__, 3) . '/assets/controllers/toast_controller.js';
        $source = (string) file_get_contents($path);

        self::assertStringContainsString('event?.params', $source);
        self::assertStringContainsString('event?.detail', $source);
        self::assertStringContainsString("variant === 'success'", $source);
        self::assertStringContainsString("setAttribute('role', 'status')", $source);
        self::assertStringContainsString("setAttribute('data-ui-variant', 'success')", $source);
        self::assertStringContainsString("variant === 'error'", $source);
        self::assertStringContainsString("setAttribute('role', 'alert')", $source);
        self::assertStringContainsString("setAttribute('data-ui-variant', 'error')", $source);
        self::assertStringContainsString("message === ''", $source);
        self::assertStringContainsString('return;', $source);
        self::assertStringContainsString('dismissItem', $source);
        self::assertStringContainsString('this.durationValue', $source);
    }
}
