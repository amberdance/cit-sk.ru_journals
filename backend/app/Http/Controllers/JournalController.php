<?php

namespace App\Http\Controllers;

use App\Http\Requests\JournalRequest;
use App\Models\Journal;
use App\Service\JournalService;
use Illuminate\Http\Request;

class JournalController extends Controller
{

    private JournalService $journalService;

    /**
     * @param  JournalService  $journalService
     */
    public function __construct(JournalService $journalService)
    {
        $this->journalService = $journalService;
    }


    public function index()
    {
        return $this->journalService->findAll();
    }

    public function store(JournalRequest $request)
    {
        return $this->journalService->create($request->validated());
    }

    public function update(Request $request, Journal $journal)
    {
    }

    public function destroy(Journal $journal)
    {
    }
}
