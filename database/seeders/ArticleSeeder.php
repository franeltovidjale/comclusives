<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $cats = [
            'Communication inclusive' => '#0a6b63',
            'Education'               => '#f59e0b',
            'Egalite'                 => '#6366f1',
            'Inclusion'               => '#ec4899',
        ];

        foreach ($cats as $name => $color) {
            Category::firstOrCreate(
                ['name' => $name],
                ['color' => $color]
            );
        }
    }
}
