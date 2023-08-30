<?php

namespace Http\Controllers;

use App\Models\Attacker;
use App\Models\Journal;
use Date;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;


class JournalControllerTest extends TestCase {
    use RefreshDatabase, WithoutMiddleware;

    private static string $endpoint = "/api/journals";

    public function testIndex() {
        $countOfJournals = 10;
        Journal::factory($countOfJournals)->create();

        $this->assertDatabaseCount(Journal::class, $countOfJournals);
        $this->getJson(self::$endpoint)
                ->assertOk()
                ->assertJsonCount($countOfJournals, "data");
    }

    public function testStore() {
        $jsonPayload = Journal::factory()->makeJournalWithRelations();

        $this->postJson(self::$endpoint, $jsonPayload)
                ->assertCreated()
                ->assertJsonPath("data.attacker.id", Attacker::orderBy("id", "desc")->first("id")->id)
                ->assertJsonPath("data.victim.id", Attacker::orderBy("id", "desc")->first("id")->id);

        self::assertGreaterThanOrEqual(1, Attacker::count("id"));
    }

    public function testJournalValidation() {
        $jsonPayload = Journal::factory()->makeJournalWithRelations();
        $jsonPayload["detection_date"] = "test";
        $jsonPayload["group_notice_date"] = "test";
        $jsonPayload["zav_sector_notice_date"] = "test";
        unset($jsonPayload["is_closed"]);

        $this->postJson(self::$endpoint, $jsonPayload)->assertStatus(422);
    }

    public function testAttackerValidation() {
        $jsonPayload = Journal::factory()->makeJournalWithRelations();
        $jsonPayload["attacker"]["ipv4"] = "test";
        $jsonPayload["attacker"]["type"] = new Date();
        $jsonPayload["attacker"]["description"] = false;
        $jsonPayload["attacker"]["country"] = 12;

        $this->postJson(self::$endpoint, $jsonPayload)->assertStatus(422);
    }

    public function testVictimValidation() {
        $jsonPayload = Journal::factory()->makeJournalWithRelations();
        $jsonPayload["victim"]["ipv4"] = "test";
        $jsonPayload["victim"]["owner"] = false;

        $this->postJson(self::$endpoint, $jsonPayload)->assertStatus(422);
    }

    public function testSoftDelete() {
        $journal = Journal::factory()->create();
        $this->deleteJson(self::$endpoint."/".$journal->id)->assertNoContent();
        self::assertNull(Journal::find($journal->id));
    }

    public function testWhenResourceExistsThenJournalReturned() {
        $journal = Journal::factory()->create();
        $this->getJson(self::$endpoint."/".$journal->id)->assertOk();
    }

    public function testWhenResourceDidNotExistsThen404HttpStatusReturned() {
        $this->getJson(self::$endpoint.rand(999, 9999))->assertNotFound();
    }

    public function testPartialUpdate() {
        $journal = Journal::factory()->create();
        $newJournalData = Journal::factory()->makeJournalWithRelations();
        $newJournalData["is_closed"] = true;

        $this->patchJson(self::$endpoint."/".$journal->id, $newJournalData)->assertOk();
    }

}
