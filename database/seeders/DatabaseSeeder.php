<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        // Créer ou mettre à jour le compte admin sans supprimer les anciens
        $admin = \App\Models\User::updateOrCreate(['email' => 'contact@comclusives.com'], [
            'name'     => 'Admin Comclusives',
            'password' => bcrypt('kxDAlvw4e0XvaIgjL3LU'),
            'role'     => 'admin',
        ]);

        // Mettre à jour le rôle des anciens comptes admin si existants
        \App\Models\User::whereIn('email', ['admin@comclusives.com', 'tovidjalef@gmail.com'])
            ->update(['role' => 'admin']);

        $this->call([
            ArticleSeeder::class,
        ]);
    }
}
