<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class CollapsibleNativeTest extends ComponentTestCase
{
    #[Test]
    public function defaultCollapsibleUsesDetailsWithoutController(): void
    {
        self::bootKernel();
        $html = $this->renderTwig(<<<'TWIG'
{% component 'Collapsible' %}
    {% block content %}
        {% component 'Collapsible:Trigger' with { as: 'summary' } %}
            {% block content %}More{% endblock %}
        {% endcomponent %}
        {% component 'Collapsible:Content' %}
            {% block content %}Body{% endblock %}
        {% endcomponent %}
    {% endblock %}
{% endcomponent %}
TWIG);

        self::assertStringContainsString('<details', $html);
        self::assertStringContainsString('<summary', $html);
        self::assertStringContainsString('data-ui-fragment="blocks.int.collapsible"', $html);
        self::assertDoesNotMatchRegularExpression('/data-controller="symfinity--ux-blocks-core--collapsible"/', $html);
    }

    #[Test]
    public function controlledCollapsibleKeepsStimulusRemainder(): void
    {
        self::bootKernel();
        $html = $this->renderTwig(<<<'TWIG'
{% component 'Collapsible' with { open: false } %}
    {% block content %}
        {% component 'Collapsible:Trigger' %}
            {% block content %}Toggle{% endblock %}
        {% endcomponent %}
        {% component 'Collapsible:Content' %}
            {% block content %}Body{% endblock %}
        {% endcomponent %}
    {% endblock %}
{% endcomponent %}
TWIG);

        self::assertStringContainsString('data-controller="symfinity--ux-blocks-core--collapsible"', $html);
        self::assertStringContainsString('data-action="click->symfinity--ux-blocks-core--collapsible#toggle"', $html);
    }
}
