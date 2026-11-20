<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class AlertDialogTest extends ComponentTestCase
{
    #[Test]
    public function rootHasBlocksExtFragment(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('AlertDialog');

        $this->assertRootAttributes($html, 'alert-dialog-enhanced', 'blocks.int.alert-dialog-enhanced');
        self::assertStringContainsString('data-controller="symfinity--ux-blocks-interactive--alert-dialog"', $html);
    }

    #[Test]
    public function contentHasAlertDialogAria(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('AlertDialog:Content');

        self::assertStringContainsString('role="alertdialog"', $html);
        self::assertStringContainsString('aria-modal="true"', $html);
        self::assertStringContainsString('data-ui-role="alert-dialog-content"', $html);
    }

    #[Test]
    public function triggerExposesDialogPopupSemantics(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('AlertDialog:Trigger');

        self::assertStringContainsString('aria-haspopup="dialog"', $html);
        self::assertStringContainsString('aria-expanded="false"', $html);
        self::assertStringContainsString('data-ui-role="button"', $html);
        self::assertStringNotContainsString('alert-dialog-trigger', $html);
    }

    #[Test]
    public function triggerCancelAndActionAreButtons(): void
    {
        self::bootKernel();

        $trigger = $this->renderComponent('AlertDialog:Trigger', [
            'variant' => 'danger',
            'appearance' => 'outline',
            'size' => 'sm',
        ], 'Open alert');
        $cancel = $this->renderComponent('AlertDialog:Cancel', [], 'Cancel');
        $action = $this->renderComponent('AlertDialog:Action', [], 'Delete');

        foreach ([$trigger, $cancel, $action] as $html) {
            self::assertStringContainsString('data-ui-role="button"', $html);
            self::assertStringNotContainsString('alert-dialog-trigger', $html);
            self::assertStringNotContainsString('alert-dialog-cancel', $html);
        }

        self::assertStringContainsString('aria-haspopup="dialog"', $trigger);
        self::assertStringContainsString('alert-dialog#open', $trigger);
        self::assertStringContainsString('alert-dialog#close', $cancel);
        self::assertStringContainsString('alert-dialog#confirm', $action);
        self::assertStringContainsString('data-ui-variant="danger"', $trigger);
        self::assertStringContainsString('data-ui-appearance="outline"', $trigger);
        self::assertStringContainsString('data-ui-size="sm"', $trigger);
        self::assertStringContainsString('data-ui-variant="neutral"', $cancel);
        self::assertStringContainsString('data-ui-appearance="outline"', $cancel);
        self::assertStringContainsString('data-ui-variant="danger"', $action);
        self::assertStringContainsString('Open alert', $trigger);
        self::assertStringContainsString('Cancel', $cancel);
        self::assertStringContainsString('Delete', $action);
    }

    #[Test]
    public function titleAndDescriptionRolesPresent(): void
    {
        self::bootKernel();
        $title = $this->renderComponent('AlertDialog:Title');
        $description = $this->renderComponent('AlertDialog:Description');

        self::assertStringContainsString('data-ui-role="alert-dialog-title"', $title);
        self::assertStringContainsString('data-ui-role="alert-dialog-description"', $description);
    }
}
