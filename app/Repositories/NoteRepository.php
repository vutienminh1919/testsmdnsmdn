<?php
namespace App\Repositories;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteRepository extends BaseRepository
{
    public function __construct(Note $note)
    {
        parent::__construct($note);
    }

    public function create(Request $request)
    {
        $data = $request->only('title','content','category_id');
        $note = Note::create($data);
        return $note;

    }

    public function edit(Request $request,$id)
    {
        $note = Note::findOrFail($id);
        $data = $request->only('title','content','category_id');
        return Note::where("id","=", $id)->update($data);

    }

}
