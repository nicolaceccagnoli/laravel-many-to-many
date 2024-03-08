<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Project;
use App\Models\Type;

// Helpers
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        Project::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i = 0; $i < 10; $i++) {

            // Prendo in ordine random i type dal loro Modle
            $randomType = Type::inRandomOrder()->first();

            $title = fake()->sentence();
            $slug = Str::slug($title);

            $project = Project::create([
                'title' => $title,
                'slug' => $slug,
                'content' => fake()->paragraph(),
                'type_id' => $randomType->id,  //Assegno alla colonna type_id l'id del Type preso randomicamente
                'status' => fake()->boolean(),
            ]);
        }
    }
}
