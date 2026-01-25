<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
// general page
CmsPage::create([
    'name' => 'General',
    'slug' => 'general',
    'is_active' => 1,
    'order' => 0,
]);
        // home page
        CmsPage::create([
            'name' => 'Home',
            'slug' => 'home',
            'is_active' => 1,
            'order' => 1,
        ]);

        // about page
        CmsPage::create([
            'name' => 'About',
            'slug' => 'about',
            'is_active' => 1,
            'order' => 2,
        ]);

        // service solutions page
        CmsPage::create([
            'name' => 'Service Solutions',
            'slug' => 'service-solutions',
            'is_active' => 1,
                'order' => 3,
        ]);

        // services page
        CmsPage::create([
            'name' => 'Services',
            'slug' => 'services',
            'is_active' => 1,
            'order' => 4,
        ]);

        // faq page
        CmsPage::create([
            'name' => 'FAQ',
            'slug' => 'faq',
            'is_active' => 1,
            'order' => 5,
        ]);

        // contact page
        CmsPage::create([
            'name' => 'Contact',
            'slug' => 'contact',
            'is_active' => 1,
            'order' => 6,
        ]);
    }
}