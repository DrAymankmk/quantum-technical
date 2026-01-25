<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Clear data before seed
        $this->clearCmsData();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
        ]);

        $this->call([
            LanguageSeeder::class,
            PageSeeder::class,
            SectionSeeder::class,
            ItemSeeder::class,
            LinkSeeder::class,
        ]);
    }

    /**
     * Clear all CMS data (items, sections, pages and their translations)
     */
    protected function clearCmsData(): void
    {
        // Disable foreign key checks temporarily
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('cms_languages')->truncate();

        DB::table('users')->truncate();

        // Clear items and their translations (must be first due to foreign keys)
        DB::table('cms_item_translations')->truncate();
        DB::table('cms_items')->truncate();

        // Clear sections and their translations
        DB::table('cms_section_translations')->truncate();
        DB::table('cms_sections')->truncate();

        // Clear pages and their translations
        DB::table('cms_page_translations')->truncate();
        DB::table('cms_pages')->truncate();

        // Clear links
        DB::table('cms_links')->truncate();
        DB::table('cms_link_translations')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Also clear media associated with items and sections
        // DB::table('media')->where('model_type', 'App\Models\CmsItem')->delete();
        // DB::table('media')->where('model_type', 'App\Models\CmsSection')->delete();
    }
}