<?php
require 'vendor/autoload.php';
require 'bootstrap/app.php';

use App\Models\HomeSection;

$heroSection = HomeSection::where('section_name', 'hero')->first();
$aboutSection = HomeSection::where('section_name', 'about')->first();

echo "=== HERO SECTION ===\n";
echo "ID: " . ($heroSection->id ?? 'NOT FOUND') . "\n";
echo "Name: " . ($heroSection->section_name ?? 'NOT FOUND') . "\n";
echo "Content: " . ($heroSection->content ?? 'EMPTY') . "\n";
echo "Content Type: " . gettype($heroSection->content ?? null) . "\n";
if ($heroSection && is_array($heroSection->content)) {
    echo "Stats Count: " . count($heroSection->content) . "\n";
    echo "Stats: " . json_encode($heroSection->content) . "\n";
}

echo "\n=== ABOUT SECTION ===\n";
echo "ID: " . ($aboutSection->id ?? 'NOT FOUND') . "\n";
echo "Name: " . ($aboutSection->section_name ?? 'NOT FOUND') . "\n";
echo "Content: " . ($aboutSection->content ?? 'EMPTY') . "\n";
echo "Content Type: " . gettype($aboutSection->content ?? null) . "\n";
if ($aboutSection && is_array($aboutSection->content)) {
    echo "Stats Count: " . count($aboutSection->content) . "\n";
    echo "Stats: " . json_encode($aboutSection->content) . "\n";
}
