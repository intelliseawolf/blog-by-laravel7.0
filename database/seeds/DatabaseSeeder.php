<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(BlogSettingsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(PortfolioItemTagsTableSeeder::class);
        $this->call(PortfolioItemTechTagsTableSeeder::class);
        $this->call(PortfolioItemsTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(TimelineTypeTableSeeder::class);
        $this->call(TimelineItemsTableSeeder::class);
        $this->call(CmsSettingsTableSeeder::class);
        $this->call(IntroTypingTextItemsTableSeeder::class);
        $this->call(AboutSectionButtonsSeeder::class);
        $this->call(SkillItemsTableSeeder::class);
        $this->call(ServiceItemsTableSeeder::class);
        $this->call(CounterTypesTableSeeder::class);
        $this->call(CounterItemsTableSeeder::class);
        $this->call(SocialMediaItemsTableSeeder::class);

        Model::reguard();
    }
}
