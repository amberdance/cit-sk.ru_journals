<?php

namespace App\Service;

use App\Dto\Journal\JournalCreateDto;
use App\Dto\Journal\JournalUpdateDto;
use App\Http\Resources\JournalCollection;
use App\Http\Resources\JournalResource;
use App\Repository\AttackerRepository;
use App\Repository\JournalRepository;
use App\Repository\VictimRepository;
use Illuminate\Support\Facades\DB;

class JournalServiceImpl implements JournalService
{

    public function __construct(
        private readonly JournalRepository $journalRepository,
        private readonly AttackerRepository $attackerRepository,
        private readonly VictimRepository $victimRepository
    ) {
    }

    /**
     * @inheritDoc
     */
    public function findAll(): JournalCollection
    {
        return new JournalCollection($this->journalRepository->findAll());
    }

    /**
     * @inheritDoc
     */
    function findById(int $id): JournalResource
    {
        return new JournalResource($this->journalRepository->findById($id));
    }

    /**
     * @inheritDoc
     */
    public function create(JournalCreateDto $journalDto): JournalResource
    {
        return DB::transaction(function () use ($journalDto) {
            $attacker = $this->attackerRepository->create($journalDto->attacker);
            $victim = $this->victimRepository->create($journalDto->victim);
            $journal = $this->journalRepository->create($journalDto, $attacker, $victim);

            return new JournalResource($journal);
        });
    }

    /**
     * @inheritDoc
     */
    public function update(JournalUpdateDto $journalDto): JournalResource
    {
        return DB::transaction(function () use ($journalDto) {
            if ($journalDto->attacker) {
                $this->attackerRepository->update($journalDto->attacker);
            }

            if ($journalDto->victim) {
                $this->victimRepository->update($journalDto->victim);
            }

            return new JournalResource($this->journalRepository->update($journalDto));
        });
    }

    /**
     * @inheritDoc
     */
    function delete(int $id): bool
    {
        return $this->journalRepository->delete($id);
    }

}
