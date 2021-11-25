<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Repositories\NoteRepository;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    protected $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function index()
    {
        $notes = $this->noteRepository->getAll();

        return view('backend.note.list',compact('notes'));
    }


    public function showFormCreate()
    {
        return view("backend.note.create");
    }


    public function store(Request $request)
    {
        $note = $this->noteRepository->create($request);
        return redirect()->route('notes.index');
    }


    public function show($id)
    {
        $note = $this->noteRepository->getById($id);
        return view('backend.note.detail',compact('note'));
    }


    public function showFormEdit($id)
    {
        $note = $this->noteRepository->getById($id);
        return view('backend.note.edit',compact('note'));
    }

    public function update(Request $request, $id)
    {
         $this->noteRepository->edit($request,$id);
        return redirect()->route('notes.index');
    }


    public function destroy($id)
    {
        $note = $this->noteRepository->getById($id);
        $this->noteRepository->delete($id);
        return redirect()->route('notes.index');
    }
}
