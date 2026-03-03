<?php

namespace Database\Seeders;

use App\Models\HomeSection;
use Illuminate\Database\Seeder;

class AdvisorySectionSeeder extends Seeder
{
    public function run()
    {
        HomeSection::firstOrCreate(
            ['section_name' => 'advisory_intro'],
            [
                'title' => 'Mining investment success in South Africa is execution-led.',
                'description' => 'South Africa is a high-friction mining jurisdiction. Success is determined by the integration of Rights, Compliance (Mining Charter), Social Licence (SLP), and Operational Realism.',
                'is_active' => true,
                'display_order' => 1,
            ]
        );

        echo "✓ Advisory intro section created!\n";
    }
}
