<?php
namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
    public function run(): void {
        $cats = [
            ['name' => 'Communication inclusive', 'slug' => 'communication-inclusive', 'color' => '#0d9488'],
            ['name' => 'Éducation',                'slug' => 'education',                'color' => '#6366f1'],
            ['name' => 'Égalité',                  'slug' => 'egalite',                  'color' => '#f59e0b'],
            ['name' => 'Inclusion',                'slug' => 'inclusion',                'color' => '#ec4899'],
        ];
        foreach ($cats as $c) Category::firstOrCreate(['slug' => $c['slug']], $c);
    }
}
