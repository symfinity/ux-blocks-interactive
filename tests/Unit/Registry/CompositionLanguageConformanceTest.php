<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Registry;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocks\Registry\LanguageConformance;
use Symfinity\UxBlocks\Registry\RoleLanguageDefinition;
use Symfinity\UxBlocksInteractive\Tests\Support\CompositionLanguageAssertions;
use Symfony\Component\Yaml\Yaml;

final class CompositionLanguageConformanceTest extends TestCase
{
    use CompositionLanguageAssertions;

    /** @return list<array<string, mixed>> */
    private static function roleRows(): array
    {
        /** @var array<string, mixed> $registry */
        $registry = Yaml::parseFile(\dirname(__DIR__, 3) . '/config/ux_roles.yaml');

        /** @var list<array<string, mixed>> $rows */
        $rows = $registry['roles'] ?? [];

        return $rows;
    }

    #[Test]
    public function everyInteractiveRoleDefinitionIsConformant(): void
    {
        foreach (self::roleRows() as $row) {
            $def = RoleLanguageDefinition::fromRegistryRow('interactive', $row);
            $this->assertRoleDefinitionConformant($def);
        }
    }

    #[Test]
    public function noInteractiveRoleIsAPerConceptCompound(): void
    {
        $roleIds = array_map(static fn (array $row): string => (string) ($row['role'] ?? ''), self::roleRows());

        $this->assertNoCompoundRoles($roleIds);
    }

    #[Test]
    public function variantControlsDeclareModifierLexiconAttributes(): void
    {
        $byRole = [];
        foreach (self::roleRows() as $row) {
            $byRole[(string) ($row['role'] ?? '')] = RoleLanguageDefinition::fromRegistryRow('interactive', $row);
        }

        foreach (['slider', 'toggle', 'rating'] as $role) {
            self::assertContains('variant', $byRole[$role]->attributes, $role);
        }
    }

    #[Test]
    public function registrySchemaIsOnePointFour(): void
    {
        /** @var array<string, mixed> $registry */
        $registry = Yaml::parseFile(\dirname(__DIR__, 3) . '/config/ux_roles.yaml');

        self::assertSame('1.4', (string) ($registry['ux_role_registry'] ?? ''));
    }

    #[Test]
    public function regionVocabularyStaysClosed(): void
    {
        $this->assertRegionVocabularyClosed();
        self::assertSame([], LanguageConformance::checkRegionVocabularyClosed());
    }
}
