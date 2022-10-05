<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function index()
    {
        //
    }


    public function create(Equipment $equipment)
    {
        return view('note.create',compact('equipment'));
    }


    public function store(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
          'subject' => 'required',
          'content' => 'required',
        ]);
        $note = Note::create([
          'subject' => $request['subject'],
          'content' => $request['content'],
          'equipment_id' => $equipment->id
        ]);

        return redirect()->route('equipment.show',compact('equipment'));
    }


    public function show(Note $note)
    {
        //
    }


    public function edit(Note $note)
    {
        $equipment = $note->equipment;
        return view('note.edit',compact('equipment','note'));
    }


    public function update(Request $request, Note $note)
    {
      $validated = $request->validate([
        'subject' => 'required',
        'content' => 'required',
      ]);
      $note->fill($request->all())->save();
      $equipment = $note->equipment;
      return redirect()->route('equipment.show',compact('equipment'));
    }


    public function destroy(Note $note)
    {
      $note->delete();
      $equipment = $note->equipment;
      return redirect()->route('equipment.show',compact('equipment'));
    }
}
