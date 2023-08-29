<?php

namespace Http\Controllers;

use App\Models\Journal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;


class JournalControllerTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;


    public function testStore()
    {
        $jsonPayload = Journal::factory()->makeJournalWithRelations();
        $this->postJson("/api/journals", $jsonPayload)
             ->assertCreated()
             ->assertJsonPath("data.attacker.id", 1)
             ->assertJsonPath("data.victim.id", 1);
        $this->assertDatabaseCount(Journal::getModel()->getTable(), 1);
    }


}
