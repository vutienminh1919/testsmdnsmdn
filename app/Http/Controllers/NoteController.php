<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use App\Repositories\NoteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class NoteController extends Controller
{
    protected $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function index()
    {
        $notes = $this->noteRepository->getAll()->toQuery()->paginate(10);
        return view('backend.note.list',compact('notes'));

    }

    public function getNoteByUSer()
    {

        if (!empty(Auth::user()->id)) {
            $userId = Auth::user()->id;
        }

        $notes = $this->noteRepository->getUserById($userId)->toQuery()->paginate(10);

//        $notes = $this->noteRepository->getAll();
        return view('backend.note.list',compact('notes'));
    }


    public function showFormCreate()
    {
        $categories = $this->noteRepository->getAllCategory();
        return view("backend.note.create",compact('categories'));
    }


    public function store(NoteRequest $request)
    {

        $note = $this->noteRepository->create($request);
        toastr()->success('Create Success !');
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
        $categories = $this->noteRepository->getAllCategory();
        return view('backend.note.edit',compact('note','categories'));
    }

    public function update(NoteRequest $request, $id)
    {
         $this->noteRepository->edit($request,$id);
        toastr()->success('Update Success !');
        return redirect()->route('notes.index');
    }


    public function destroy($id)
    {
        $note = $this->noteRepository->getById($id);
        $this->noteRepository->delete($id);
        toastr()->success('Delete Success !');
        return redirect()->route('notes.index');
    }

    public function showSearchForm()
    {
        return view('backend.note.searchForm');

    }

    public function search(Request $request)
    {
        $noteResult = $this->noteRepository->search($request);
        return view('backend.note.search', compact('noteResult'));
    }


}
