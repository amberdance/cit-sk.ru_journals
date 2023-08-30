<?php

namespace App\Service;

use App\Dto\Journal\JournalDto;
use App\Dto\Journal\JournalUpdateDto;
use App\Http\Resources\JournalCollection;
use App\Http\Resources\JournalResource;
use App\Repository\AttackerRepository;
use App\Repository\JournalRepository;
use App\Repository\VictimRepository;
use Illuminate\Support\Facades\DB;

class JournalServiceImpl implements JournalService {

    private JournalRepository $journalRepository;
    private AttackerRepository $attackerRepository;
    private VictimRepository $victimRepository;


    public function __construct(
            JournalRepository  $journalRepository,
            AttackerRepository $attackerRepository,
            VictimRepository   $victimRepository
    ) {
        $this->journalRepository = $journalRepository;
        $this->attackerRepository = $attackerRepository;
        $this->victimRepository = $victimRepository;
    }

    /**
     * @inheritDoc
     */
    public function create(JournalDto $journalRequestDto): JournalResource {
        return DB::transaction(function () use ($journalRequestDto) {
            $attacker = $this->attackerRepository->create($journalRequestDto->attacker);
            $victim = $this->victimRepository->create($journalRequestDto->victim);
            $journal = $this->journalRepository->create($journalRequestDto, $attacker, $victim);

            return new JournalResource($journal);
        });
    }


    /**
     * @inheritDoc
     */
    public function findAll(): JournalCollection {
        return $this->journalRepository->findAll();
    }

    /**
     * @inheritDoc
     */
    function findById(int $id): JournalResource {
        return $this->journalRepository->findById($id);
    }

    /**
     * @inheritDoc
     */
    function delete(int $id): bool {
        return $this->journalRepository->delete($id);
    }


    /**
     * @inheritDoc
     */
    public function update(JournalUpdateDto $journalUpdateDto): JournalResource {
        return $this->journalRepository->update($journalUpdateDto);
    }
}
