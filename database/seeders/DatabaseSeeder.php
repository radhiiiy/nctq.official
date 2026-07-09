<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Default admin account
        User::updateOrCreate(
            ['email' => 'admin@nurcahaya.sch.id'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        // Sample activities
        if (Activity::count() === 0) {
            Activity::create([
                'title' => 'Khataman Al-Quran',
                'description' => 'Kegiatan khataman Al-Quran bersama seluruh santri dan dewan guru.',
                'event_date' => '2026-07-10',
            ]);

            Activity::create([
                'title' => 'Khataman Al-Quran',
                'description' => 'Kegiatan khataman Al-Quran bersama seluruh santri dan dewan guru.',
                'event_date' => '2026-07-10',
            ]);
        }

        // Sample articles
        if (Article::count() === 0) {
            for ($i = 1; $i <= 3; $i++) {
                Article::create([
                    'title' => 'Keutamaan Ilmu dalam Islam',
                    'slug' => Str::slug('Keutamaan Ilmu dalam Islam').'-'.Str::random(5),
                    'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\n\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    'is_published' => true,
                    'published_at' => now()->subDays($i),
                ]);
            }
        }
    }
}
