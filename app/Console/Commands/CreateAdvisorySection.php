<?php

namespace App\Console\Commands;

use App\Models\HomeSection;
use Illuminate\Console\Command;

class CreateAdvisorySection extends Command
{
    protected $signature = 'create:advisory-section';
    protected $description = 'Create advisory_intro section in home_sections table';

    public function handle()
    {
        $section = HomeSection::firstOrCreate(
            ['section_name' => 'advisory_intro'],
            [
                'title' => 'Mining investment success in South Africa is execution-led.',
                'description' => 'South Africa is a high-friction mining jurisdiction. Success is determined by the integration of Rights, Compliance (Mining Charter), Social Licence (SLP), and Operational Realism.',
                'is_active' => true,
                'display_order' => 1,
            ]
        );

        if ($section->wasRecentlyCreated) {
            $this->info('✓ Advisory intro section created successfully!');
        } else {
            $this->info('✓ Advisory intro section already exists!');
        }

        return 0;
    }
}
