<?php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\HomeSection;

$section = HomeSection::firstOrCreate(
    ['section_name' => 'advisory_intro'],
    [
        'title' => 'Mining investment success in South Africa is execution-led.',
        'description' => 'South Africa is a high-friction mining jurisdiction. Success is determined by the integration of Rights, Compliance (Mining Charter), Social Licence (SLP), and Operational Realism.',
        'is_active' => true,
        'display_order' => 1,
    ]
);

echo "✓ Advisory intro section created successfully!\n";
echo "Title: " . $section->title . "\n";
echo "Description: " . $section->description . "\n";
?>
