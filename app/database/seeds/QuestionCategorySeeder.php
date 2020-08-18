<?php

use Illuminate\Database\Seeder;
use App\QuestionCategory;

class QuestionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionCategory::create([
            'title' => 'Adjudication',
            'slug' => 'adjudication',
        ]);

        QuestionCategory::create([
            'title' => 'Scheduling',
            'slug' => 'scheduling',
        ]);

        QuestionCategory::create([
            'title' => 'Winners',
            'slug' => 'winners',
        ]);

        QuestionCategory::create([
            'title' => 'Media',
            'slug' => 'media',
        ]);

        QuestionCategory::create([
            'title' => 'Data Protection',
            'slug' => \Str::slug('Data Protection'),
        ]);
    }
}
