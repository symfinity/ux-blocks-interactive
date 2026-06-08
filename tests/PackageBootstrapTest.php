<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests;

use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocksInteractive\SymfinityUxBlocksInteractiveBundle;

final class PackageBootstrapTest extends TestCase
{
    public function testBundleClassExists(): void
    {
        self::assertTrue(class_exists(SymfinityUxBlocksInteractiveBundle::class));
    }
}
