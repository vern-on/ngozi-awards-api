<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_the_faq_view()
    {
        $this->get('/faq')->assertViewIs('faq');
    }

    /** @test */
    public function it_returns_the_faq_view_for_any_question_slug()
    {
        $question = factory(\App\Question::class)->create(['title' => 'Test question', 'slug' => 'test-question']);

        $this->get('/faq/test-question')->assertViewIs('faq');
    }

    /** @test */
    public function it_returns_questions()
    {
        factory(\App\Question::class, 20)->create();

        $this->json('get', '/faq')->assertJsonStructure(['questions'])->assertJsonCount(20, 'questions');
    }

    /** @test */
    public function it_can_filter_questions()
    {
        factory(\App\Question::class, 5)->create();
        factory(\App\Question::class)->create(['title' => 'Test question', 'slug' => 'test-question']);

        $this->json('get', '/faq?filter=test question')->assertJsonCount(1, 'questions');
    }

    /** @test */
    public function it_filters_questions_by_category_slug()
    {
        factory(\App\Question::class, 5)->create();

        $category = factory(\App\QuestionCategory::class)->create(['title' => 'Test Category', 'slug' => 'test-category']);
        $question = factory(\App\Question::class)->create(['title' => 'Test question', 'slug' => 'test-question']);
        $question->categories()->attach($category->id);

        $this->json('get', '/faq?category=test-category')->assertJsonCount(1, 'questions');
    }

    /** @test */
    public function it_returns_question_categories()
    {
        factory(\App\QuestionCategory::class, 15)->create();

        $this->json('get', '/faq/categories')->assertJsonStructure(['categories'])->assertJsonCount(15, 'categories');
    }

    /** @test */
    public function it_returns_popular_questions()
    {
        factory(\App\Question::class, 40)->create();

        $this->json('get', '/faq/popular')->assertJsonStructure(['popular_questions'])->assertJsonCount(6, 'popular_questions');
    }

    /** @test */
    public function it_increments_a_questions_popularity()
    {
        $question = factory(\App\Question::class)->create(['slug' => 'test', 'read_count' => 0]);

        $this->json('get', '/faq/test/increment')->assertOk();

        $this->assertEquals(1, $question->refresh()->read_count);
    }
}
