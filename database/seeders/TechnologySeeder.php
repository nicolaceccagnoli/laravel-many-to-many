<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Technology;

// Helpers
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disabilitiamo temporaneamente i vincoli di FK nel caso dovessimo
        // svolgere operazioni potenzialmente dannose, finita l'operazione
        // il vincolo viene ripristinato
        Schema::withoutForeignKeyConstraints(function () {
            Technology::truncate();
        });

        $allTechnologies = [
            'News',
            'Updates',
            'Release',
            'Technology',
            'Web',
            'Software',
            'Hardware',
            'Blockchain',
            'AI',
            'Machine Learning',
            'ChatGPT',
        ];

        foreach ($allTechnologies as $singleTechnology) {
            $technology = Technology::create([
                'title' => $singleTechnology,
                'slug' => Str::slug($singleTechnology)
            ]);
        }
    }

}
