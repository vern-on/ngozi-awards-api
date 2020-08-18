<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_more_than_one_category()
    {
        $cat1 = factory(\App\QuestionCategory::class)->create();
        $cat2 = factory(\App\QuestionCategory::class)->create();

        $question = factory(\App\Question::class)->create();

        \DB::table('category_questions')->insert([
            'question_category_id' => $cat1->id,
            'question_id' => $question->id,
        ]);

        \DB::table('category_questions')->insert([
            'question_category_id' => $cat2->id,
            'question_id' => $question->id,
        ]);

        $this->assertEquals(2, $question->categories->count());
    }
}
