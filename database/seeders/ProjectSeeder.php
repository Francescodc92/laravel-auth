<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//model
use App\Models\Project;
use Illuminate\Support\Testing\Fakes\Fake;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        for ($i=0; $i < 20; $i++) { 
            Project::create([
                'title'=> substr(fake()->sentence(3),0,100),
                'preview'=> fake()->url(),
                'collaborators'=>substr(fake()->sentence(3),0,255),
                'description'=> fake()->paragraph(),
                'technologies'=> fake()->sentence(),
            ]);

        }
    }
}
