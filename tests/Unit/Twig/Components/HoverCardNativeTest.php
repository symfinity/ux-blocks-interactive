<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class HoverCardNativeTest extends ComponentTestCase
{
    #[Test]
    public function hoverCardUsesNativeInterestMarkupByDefault(): void
    {
        self::bootKernel();
        $html = $this->renderTwig(<<<'TWIG'
{% component 'HoverCard' %}
    {% block content %}
        {% component 'HoverCard:Trigger' %}
            {% block content %}Label{% endblock %}
        {% endcomponent %}
        {% component 'HoverCard:Content' %}
            {% block content %}Preview{% endblock %}
        {% endcomponent %}
    {% endblock %}
{% endcomponent %}
TWIG);

        self::assertStringContainsString('interestfor="hover-card-', $html);
        self::assertStringContainsString('popover="hint"', $html);
        self::assertStringContainsString('data-ui-fragment="blocks.int.hover-card"', $html);
    }

    #[Test]
    public function hoverCardFallbackUsesStimulusTargetsWhenNativeDisabled(): void
    {
        self::bootKernel();
        $html = $this->renderTwig(<<<'TWIG'
{% component 'HoverCard' with { nativeInterest: false } %}
    {% block content %}
        {% component 'HoverCard:Trigger' %}
            {% block content %}Label{% endblock %}
        {% endcomponent %}
        {% component 'HoverCard:Content' %}
            {% block content %}Preview{% endblock %}
        {% endcomponent %}
    {% endblock %}
{% endcomponent %}
TWIG);

        self::assertStringContainsString('data-symfinity--ux-blocks-interactive--hover-card-target="trigger"', $html);
        self::assertStringContainsString('data-symfinity--ux-blocks-interactive--hover-card-target="content"', $html);
        self::assertStringNotContainsString('interestfor=', $html);
    }
}
