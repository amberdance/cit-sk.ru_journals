<?php

namespace App\Http\Controllers;

use App\Http\Requests\JournalRequest;
use App\Http\Resources\JournalResource;
use App\Models\Journal;

class JournalController extends Controller
{
    public function index()
    {
        return JournalResource::collection(Journal::all());
    }

    public function store(JournalRequest $request)
    {
        return new JournalResource(Journal::create($request->validated()));
    }

    public function show(Journal $journal)
    {
        return new JournalResource($journal);
    }

    public function update(JournalRequest $request, Journal $journal)
    {
        $journal->update($request->validated());

        return new JournalResource($journal);
    }

    public function destroy(Journal $journal)
    {
        $journal->delete();

        return response()->json();
    }
}
