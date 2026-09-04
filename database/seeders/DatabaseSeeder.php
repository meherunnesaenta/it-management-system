<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ১. রোল সিডার রান করুন (Spatie Permission থাকলে)
        $this->callIfExists(RoleSeeder::class);

        $this->command->info('Roles and permissions created. Create users through registration or the admin:create command.');
    }

    /**
     * শুধুমাত্র যদি ক্লাস থাকে তবেই কল করবে
     */
    private function callIfExists($class)
    {
        if (class_exists($class)) {
            $this->call($class);
        }
    }
}