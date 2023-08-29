<?php

namespace App\Service;

use App\Http\Resources\JournalCollection;
use App\Http\Resources\JournalResource;
use App\Repository\AttackerRepository;
use App\Repository\JournalRepository;
use App\Repository\VictimRepository;
use Illuminate\Support\Facades\DB;

class JournalServiceImpl implements JournalService
{

    private JournalRepository $journalRepository;
    private AttackerRepository $attackerRepository;
    private VictimRepository $victimRepository;


    public function __construct(
        JournalRepository $journalRepository,
        AttackerRepository $attackerRepository,
        VictimRepository $victimRepository
    ) {
        $this->journalRepository = $journalRepository;
        $this->attackerRepository = $attackerRepository;
        $this->victimRepository = $victimRepository;
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): JournalResource
    {
        return DB::transaction(function () use ($data) {
            $attacker = $this->attackerRepository->create($data["attacker"]);
            $victim = $this->victimRepository->create($data["victim"]);
            $journal = $this->journalRepository->create($data, $attacker, $victim);

            return new JournalResource($journal);
        });
    }


    /**
     * @inheritDoc
     */
    public function findAll(): JournalCollection
    {
        return $this->journalRepository->findAll();
    }
}
