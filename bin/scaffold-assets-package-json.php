#!/usr/bin/env php
<?php

declare(strict_types=1);

/**
 * Regenerate assets/package.json Stimulus controller registry from assets/controllers/.
 *
 * Usage: php packages/ux-blocks-interactive/bin/scaffold-assets-package-json.php
 */

$root = dirname(__DIR__);
$controllersDir = $root . '/assets/controllers';
$outFile = $root . '/assets/package.json';

if (!is_dir($controllersDir)) {
    fwrite(STDERR, "Missing {$controllersDir}\n");
    exit(1);
}

$controllers = [];
foreach (glob($controllersDir . '/*_controller.js') ?: [] as $file) {
    $base = basename($file, '_controller.js');
    $slug = str_replace('_', '-', $base);
    $controllers[$slug] = [
        'main' => 'controllers/' . $base . '_controller.js',
        'fetch' => 'eager',
        'enabled' => true,
    ];
}

if ($controllers === []) {
    fwrite(STDERR, "No *_controller.js files found in {$controllersDir}\n");
    exit(1);
}

ksort($controllers);

$package = [
    'name' => '@symfinity/ux-blocks-interactive',
    'symfony' => [
        'controllers' => $controllers,
    ],
];

file_put_contents($outFile, json_encode($package, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n");

echo sprintf("Wrote %s (%d controllers)\n", $outFile, count($controllers));
