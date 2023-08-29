<?php

namespace App\Service;

use App\Http\Resources\JournalResource;
use App\Repository\JournalRepository;

class JournalServiceImpl implements JournalService
{

    private JournalRepository $journalRepository;


    /**
     * @param  JournalRepository  $journalRepository
     */
    public function __construct(JournalRepository $journalRepository)
    {
        $this->journalRepository = $journalRepository;
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): JournalResource
    {
        return new JournalResource($this->journalRepository->create($data));
    }


}
