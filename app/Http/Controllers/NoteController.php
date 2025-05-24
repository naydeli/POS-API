<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        return Note::with('user')->get(); // Incluye relación si es útil
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string',
        ]);

        $note = Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(), // Solo si estás usando auth
        ]);

        return $note;
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

        $note->update($request->only(['title', 'content']));
        return $note;
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return response()->json(null, 204);
    }
}
