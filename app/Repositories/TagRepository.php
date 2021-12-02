<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TagRepository extends BaseRepository
{

    public function __construct(Tag $tag)
    {
        parent::__construct($tag);
    }

    public function create(Request $request)
    {
        $data = $request->only('title','content');

        $tag = Tag::create($data);
        return $tag;

    }

    public function edit(Request $request,$id)
    {
        $tag = Tag::findOrFail($id);
        $data = $request->only('title','content');
//        $data['category_id'] = $request->input('category');
        return Tag::where("id","=", $id)->update($data);

    }
}
