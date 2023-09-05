<?php

namespace Http\Controllers;

use App\Models\Attacker;
use App\Models\Journal;
use Date;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;


class JournalControllerTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    private static string $endpoint = "/api/journals";

    public function testShouldReturnListOfJournals()
    {
        $countOfJournals = 10;
        Journal::factory($countOfJournals)->create();

        $this->assertDatabaseCount(Journal::class, $countOfJournals);
        $this->getJson(self::$endpoint)
             ->assertOk()
             ->assertJsonCount($countOfJournals, "data");
    }

    public function testShouldCreateJournal()
    {
        $jsonPayload = Journal::factory()->makeJournalWithRelations();

        $this->postJson(self::$endpoint, $jsonPayload)
             ->assertCreated();
        self::assertGreaterThanOrEqual(1, Attacker::count("id"));
    }

    public function testWhenJournalFieldsInvalidThen422HttpStatusReturned()
    {
        $jsonPayload = Journal::factory()->makeJournalWithRelations();
        $jsonPayload["detection_date"] = "test";
        $jsonPayload["group_notice_date"] = "test";
        $jsonPayload["zav_sector_notice_date"] = "test";
        unset($jsonPayload["is_closed"]);

        $this->postJson(self::$endpoint, $jsonPayload)->assertStatus(422);
    }

    public function testWhenAttackerFieldsInvalidThen422HttpStatusReturned()
    {
        $jsonPayload = Journal::factory()->makeJournalWithRelations();
        $jsonPayload["attacker"]["ipv4"] = "test";
        $jsonPayload["attacker"]["type"] = new Date();
        $jsonPayload["attacker"]["description"] = false;
        $jsonPayload["attacker"]["country"] = 12;

        $this->postJson(self::$endpoint, $jsonPayload)->assertStatus(422);
    }

    public function testWhenVictimFieldsInvalidThen422HttpStatusReturned()
    {
        $jsonPayload = Journal::factory()->makeJournalWithRelations();
        $jsonPayload["victim"]["ipv4"] = "test";
        $jsonPayload["victim"]["owner"] = false;

        $this->postJson(self::$endpoint, $jsonPayload)->assertStatus(422);
    }

    public function testShouldSoftDeletesJournal()
    {
        $journal = Journal::factory()->create();
        $this->deleteJson(self::$endpoint."/".$journal->id)->assertNoContent();
        self::assertNull(Journal::find($journal->id));
    }

    public function testWhenResourceExistsThenJournalReturned()
    {
        $journal = Journal::factory()->create();
        $this->getJson(self::$endpoint."/".$journal->id)->assertOk();
    }

    public function testWhenResourceDidNotExistsThen404HttpStatusReturned()
    {
        $this->getJson(self::$endpoint.rand(999, 9999))->assertNotFound();
    }

    /**
     * @throws BindingResolutionException
     */
    public function testShouldUpdateOnlyAffectedFields()
    {
        $journalModel = Journal::factory()->create();
        $journalData = $journalModel->toArray();
        $journalData["attacker"] = $journalModel->attacker->toArray();

        $generator = Container::getInstance()->make(Generator::class);
        $updatedFields = $journalData;
        $updatedFields["attacker"]["ipv4"] = $generator->ipv4();
        $updatedFields["attacker"]["type"] = $generator->word();
        $updatedFields["attacker"]["description"] = $generator->word();

        $this->patchJson(self::$endpoint."/".$journalModel->id, $updatedFields)->assertOk()
             ->assertJsonPath("data.attacker", $updatedFields["attacker"]);
    }

}
