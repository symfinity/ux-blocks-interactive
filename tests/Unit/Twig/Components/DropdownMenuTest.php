<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class DropdownMenuTest extends ComponentTestCase
{
    #[Test]
    public function rootUsesNativePopoverMenuMarkup(): void
    {
        self::bootKernel();
        $html = $this->renderTwig(<<<'TWIG'
{% component 'DropdownMenu' %}
    {% block content %}
        {% component 'DropdownMenu:Trigger' %}
            {% block content %}Open{% endblock %}
        {% endcomponent %}
        {% component 'DropdownMenu:Content' %}
            {% block content %}
                {% component 'DropdownMenu:Item' %}
                    {% block content %}Profile{% endblock %}
                {% endcomponent %}
            {% endblock %}
        {% endcomponent %}
    {% endblock %}
{% endcomponent %}
TWIG);

        self::assertStringContainsString('data-controller="symfinity--ux-blocks-interactive--dropdown-menu"', $html);
        self::assertStringContainsString('popovertarget="dropdown-menu-', $html);
        self::assertStringContainsString('popover', $html);
        self::assertStringContainsString('anchor="dropdown-menu-', $html);
        self::assertStringContainsString('id="dropdown-menu-', $html);
        self::assertStringContainsString('-trigger"', $html);
        self::assertStringContainsString('data-ui-role="menu"', $html);
        self::assertStringContainsString('data-ui-fragment="blocks.int.dropdown-menu"', $html);
        self::assertStringContainsString('data-ui-anchor="trigger"', $html);
        self::assertDoesNotMatchRegularExpression('/data-action="click->symfinity--ux-blocks-interactive--dropdown-menu#toggle"/', $html);
    }
}
