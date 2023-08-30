<?php

namespace App\Http\Controllers;

use App\Dto\JournalRequestDto;
use App\Models\Journal;
use App\Service\JournalService;
use Illuminate\Http\Request;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class JournalController extends Controller {

    private JournalService $journalService;

    /**
     * @param  JournalService  $journalService
     */
    public function __construct(JournalService $journalService) {
        $this->journalService = $journalService;
    }


    public function index() {
        return $this->journalService->findAll();
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     */
    public function store(Request $request) {
        return $this->journalService->create(JournalRequestDto::fromRequest($request));
    }

    public function update(Request $request, Journal $journal) {
    }

    public function destroy(int $id) {
        $this->journalService->delete($id);

        return response()->noContent();
    }
}
