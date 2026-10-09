<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        \App\Models\User::firstOrCreate(['email' => 'admin@comclusives.com'], [
            'name'     => 'Admin Comclusives',
            'password' => bcrypt('admin123'),
        ]);

        $this->call([
            ArticleSeeder::class,
        ]);
    }
}
