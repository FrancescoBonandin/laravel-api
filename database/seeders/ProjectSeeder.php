<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Facades
use Illuminate\Support\Facades\Schema;

// Models

use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Project::truncate();
        });

        storage::deleteDirectory('uploads/images/');
        storage::makeDirectory('uploads/images/');

        for($i=0;$i<20;$i++){

            $randomTypeId = null;
            $img=null;

            if (fake()->boolean(75)) {
                $randomTypeId = Type::inRandomOrder()->first()->id;
                // $img = fake()->image(storage_path('app/public/uploads/images'), 360, 360, 'animals', false, true, null, false);
             

                    $imgPath = fake()->imageUrl();              
                    $imgContent = file_get_contents($imgPath);              
                    $newImagePath = storage_path('app/public/uploads/images');             
                    $newImageName = rand(1000, 9999).'-'.rand(1000, 9999).'-'.rand(1000, 9999).'.png';             
                    $fullNewImagePath = $newImagePath.'/'.$newImageName;              
                    file_put_contents($fullNewImagePath, $imgContent);     

                if($img!=''){
                    $img="uploads/images/$newImageName";
                    
                }

                else{
                    $img=null;
                    
                }
            }

            $title=fake()->words(rand(1,3),true);

            Project::create([

                'title'=>$title,
                'slug'=>str()->slug($title),
                'description'=>fake()->paragraph(2),
                'type_id'=>$randomTypeId,
                'img'=>$img,
            ]);
        };
    }
}
