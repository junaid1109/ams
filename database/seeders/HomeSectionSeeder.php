<?php

namespace Database\Seeders;

use App\Models\HomeSection;
use Illuminate\Database\Seeder;

class HomeSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'section_name' => 'hero',
                'title' => 'Transform Your Business Vision Into Reality',
                'subtitle' => 'We create innovative solutions that help businesses grow',
                'description' => 'We create innovative solutions that help businesses grow. Our expertise spans web design, development, and digital marketing.',
                'button_text' => 'Get Started Today',
                'button_link' => '/',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'section_name' => 'about',
                'title' => 'Crafting Excellence Through Innovation and Dedication',
                'subtitle' => 'Professional Services',
                'description' => 'We are passionate professionals committed to delivering exceptional results that exceed expectations and drive meaningful transformation.',
                'button_text' => 'Learn More',
                'button_link' => '/about',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'section_name' => 'services',
                'title' => 'What We Do Offer',
                'subtitle' => 'Services',
                'description' => 'Check our professional services designed for your business success.',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'section_name' => 'why-us',
                'title' => 'Why Choose Us',
                'subtitle' => 'Why Us',
                'description' => 'We deliver exceptional results through proven expertise, cutting-edge innovation, and unwavering commitment to your success.',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'section_name' => 'portfolio',
                'title' => 'Check Our Portfolio',
                'subtitle' => 'Portfolio',
                'description' => 'Explore our latest projects and success stories.',
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'section_name' => 'testimonials',
                'title' => 'What They Say',
                'subtitle' => 'Testimonials',
                'description' => 'Hear from our satisfied clients and partners.',
                'display_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($sections as $section) {
            HomeSection::firstOrCreate(
                ['section_name' => $section['section_name']],
                $section
            );
        }
    }
}
