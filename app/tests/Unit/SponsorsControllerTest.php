<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SponsorsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_paginated_collection_of_sponsors()
    {
        factory(\App\Sponsor::class, 24)->create();

        $this->json('get', '/api/partners')
            ->assertJsonFragment(['total' => 24])->assertJsonCount(12, 'partners.data');
    }
}
