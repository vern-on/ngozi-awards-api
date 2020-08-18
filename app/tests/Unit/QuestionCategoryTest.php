<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_many_questions()
    {
        $category = factory(\App\QuestionCategory::class)->create();

        $q1 = factory(\App\Question::class)->create();
        $q1->categories()->attach($category->id);

        $q2 = factory(\App\Question::class)->create();
        $q2->categories()->attach($category->id);

        $this->assertEquals(2, $category->questions->count());
    }
}
