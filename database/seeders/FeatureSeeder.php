<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feature::create([
            'title' => 'Innovation Leadership',
            'description' => 'We stay ahead of industry trends, implementing cutting-edge technologies and methodologies that drive transformational results.',
            'icon' => 'bi bi-lightbulb',
            'order' => 1,
            'published' => true,
        ]);

        Feature::create([
            'title' => 'Proven Expertise',
            'description' => 'Our team brings decades of combined experience across multiple industries, ensuring strategic insights and tactical execution.',
            'icon' => 'bi bi-award',
            'order' => 2,
            'published' => true,
        ]);

        Feature::create([
            'title' => '24/7 Dedicated Support',
            'description' => 'Round-the-clock availability with personalized attention from dedicated account managers.',
            'icon' => 'bi bi-headset',
            'order' => 3,
            'published' => true,
        ]);

        Feature::create([
            'title' => 'Cost Efficiency',
            'description' => 'Streamlined processes and intelligent resource allocation reduce overhead while maximizing ROI.',
            'icon' => 'bi bi-graph-up-arrow',
            'order' => 4,
            'published' => true,
        ]);
    }
}
