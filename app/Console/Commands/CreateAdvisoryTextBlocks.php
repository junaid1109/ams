<?php

namespace App\Console\Commands;

use App\Models\HomeSection;
use Illuminate\Console\Command;

class CreateAdvisoryTextBlocks extends Command
{
    protected $signature = 'create:advisory-text-blocks';
    protected $description = 'Create text block sections for advisory page';

    public function handle()
    {
        $textBlock1 = HomeSection::firstOrCreate(
            ['section_name' => 'advisory_text_block_1'],
            [
                'title' => 'Advisory Text Block 1',
                'description' => 'Add your text content here for the first block.',
                'is_active' => true,
                'display_order' => 2,
            ]
        );

        $textBlock2 = HomeSection::firstOrCreate(
            ['section_name' => 'advisory_text_block_2'],
            [
                'title' => 'Advisory Text Block 2',
                'description' => 'Add your text content here for the second block.',
                'is_active' => true,
                'display_order' => 3,
            ]
        );

        $this->info('✓ Advisory text blocks created successfully!');

        return 0;
    }
}
