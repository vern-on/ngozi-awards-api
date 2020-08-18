<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;


class ContactsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_accepts_contact_form_data()
    {
        Mail::fake();

        $this->json('post', '/api/contact', [
            'name' => 'Test name',
            'email' => 'test.test@acme.org',
            'message' => 'here is the message',
        ])->assertOk();

        $this->assertDatabaseHas('contacts', ['name' => 'Test name', 'email' => 'test.test@acme.org', 'message' => 'here is the message']);
        Mail::assertQueued(\App\Mail\ContactReceivedMessage::class);
    }
}
