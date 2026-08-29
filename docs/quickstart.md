# Quick start

Use UX Blocks Interactive widgets in a Symfony app with ui-kernel theme CSS.

## Prerequisites

[Installation](installation.md) completed — `symfinity/ux-blocks-core`, `symfinity/ux-blocks-form`, `symfinity/ux-blocks-extended`, and `symfinity/ux-blocks-interactive` installed. Add `symfinity/ui-kernel` for themed apps.

## 1. Include ui-kernel CSS

Interactive roles rely on ui-kernel design tokens. In your base layout `<head>`:

```twig
{# templates/base.html.twig #}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{% block title %}My app{% endblock %}</title>
    {{ ui_kernel_theme_boot_script() }}
    {{ ui_kernel_css()|raw }}
    {% block stylesheets %}{% endblock %}
</head>
<body>
    {% block body %}{% endblock %}
</body>
</html>
```

## 2. Render interactive components

Use UX Twig component tags with nested region components:

```twig
<twig:Tabs defaultValue="account">
    <twig:Tabs:List>
        <twig:Tabs:Trigger value="account">Account</twig:Tabs:Trigger>
        <twig:Tabs:Trigger value="billing">Billing</twig:Tabs:Trigger>
    </twig:Tabs:List>
    <twig:Tabs:Content value="account">Account settings</twig:Tabs:Content>
    <twig:Tabs:Content value="billing">Billing details</twig:Tabs:Content>
</twig:Tabs>

<twig:DropdownMenu>
    <twig:DropdownMenu:Trigger>Open menu</twig:DropdownMenu:Trigger>
    <twig:DropdownMenu:Content>
        <twig:DropdownMenu:Item href="/settings">Settings</twig:DropdownMenu:Item>
    </twig:DropdownMenu:Content>
</twig:DropdownMenu>
```

## Next steps

- [Components](components.md) — handbook index
- [Tabs](components/tabs.md) · [Dropdown menu](components/dropdown-menu.md)
- [Usage](usage.md) — overlay, navigation, and app chrome patterns
- [CHANGELOG](../CHANGELOG.md) · [Contributing](../CONTRIBUTING.md)
