<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return Note::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string',
        ]);

        return Note::create($request->all());
    }

    public function show(Note $note)
    {
        return $note;
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'sometimes|required|string',
            'content' => 'sometimes|nullable|string',
        ]);

        $note->update($request->all());
        return $note;
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return response()->json(null, 204);
    }
}
