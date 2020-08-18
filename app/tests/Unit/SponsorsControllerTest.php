<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SponsorsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_the_partners_page()
    {
        $this->get('/partners')->assertViewIs('partners');
    }

    /** @test */
    public function it_returns_a_paginated_collection_of_sponsors()
    {
        factory(\App\Sponsor::class, 24)->create();

        $this->json('get', '/partners')
            ->assertJsonFragment(['total' => 24])->assertJsonCount(12, 'partners.data');
    }
}
