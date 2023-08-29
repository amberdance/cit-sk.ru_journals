<?php

namespace Http\Controllers;

use App\Models\Attacker;
use App\Models\Journal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;


class JournalControllerTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    private static string $endpoint = "/api/journals";

    public function testIndex()
    {
        $countOfJournals = 10;
        Journal::factory($countOfJournals)->create();

        $this->assertDatabaseCount(self::getTableName(), $countOfJournals);
        $this->getJson(self::$endpoint)
             ->assertOk()
             ->assertJsonCount($countOfJournals, "data");
    }

    public function testStore()
    {
        $jsonPayload = Journal::factory()->makeJournalWithRelations();

        $this->postJson(self::$endpoint, $jsonPayload)
             ->assertCreated()
             ->assertJsonPath("data.attacker.id", Attacker::orderBy("id", "desc")->first("id")->id)
             ->assertJsonPath("data.victim.id", Attacker::orderBy("id", "desc")->first("id")->id);

        self::assertGreaterThanOrEqual(1, Attacker::count("id"));
    }

    private static function getTableName()
    {
        return Journal::getModel()->getTable();
    }


}
