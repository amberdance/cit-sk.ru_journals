<?php

namespace App\Http\Controllers;

use App\Dto\Journal\JournalDto;
use App\Dto\Journal\JournalUpdateDto;
use App\Http\Resources\JournalCollection;
use App\Http\Resources\JournalResource;
use App\Service\JournalService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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


    /**
     * @return JournalCollection
     */
    public function index() {
        return $this->journalService->findAll();
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     */
    public function store(Request $request) {
        return $this->journalService->create(JournalDto::fromRequest($request));
    }

    /**
     * @param  int  $id
     *
     * @return JournalResource
     */
    public function show(int $id) {
        return $this->journalService->findById($id);
    }


    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     */
    public function update(Request $request, int $id) {
        $request->request->add(["id" => $id]);

        return $this->journalService->update(JournalUpdateDto::fromRequest($request));
    }

    /**
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy(int $id) {
        $this->journalService->delete($id);

        return response()->noContent();
    }
}
