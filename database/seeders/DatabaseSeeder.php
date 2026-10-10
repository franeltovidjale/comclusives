<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        // Supprimer les anciens comptes admin
        \App\Models\User::where('email', 'admin@comclusives.com')->delete();
        \App\Models\User::where('email', 'tovidjalef@gmail.com')->delete();

        \App\Models\User::updateOrCreate(['email' => 'contact@comclusives.com'], [
            'name'     => 'Admin Comclusives',
            'password' => bcrypt('kxDAlvw4e0XvaIgjL3LU'),
            'role'     => 'admin',
        ]);

        $this->call([
            ArticleSeeder::class,
        ]);
    }
}
