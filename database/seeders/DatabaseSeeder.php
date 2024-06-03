<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Answer;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\DoctorsInfo;
use App\Models\DoctorsInfoTranslation;
use App\Models\Question;
use App\Models\Specialize;
use App\Models\SpecializeTranslation;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /* Adding User Factory */
        User::factory()->count(4)->create();
        Category::factory()->count(4)->create();

        CategoryTranslation::factory()->englishName()->create();
        CategoryTranslation::factory()->arabicName()->create();
        CategoryTranslation::factory()->frenshName()->create();

        /*Adding Specilization */

        Specialize::factory()->count(4)->create();
        SpecializeTranslation::factory()->englishName()->create();
        SpecializeTranslation::factory()->arabicName()->create();
        SpecializeTranslation::factory()->frenshName()->create();

       /*Doctor  Info */
        DoctorsInfo::factory()->count(4)->create();

        /*Doctor  Info Translation   */

        DoctorsInfoTranslation::factory()->englishName()->create();
        DoctorsInfoTranslation::factory()->arabicName()->create();
        DoctorsInfoTranslation::factory()->frenshName()->create();


        Question::factory()->count(4)->create();
        Answer::factory()->count(4)->create();



    }
}
