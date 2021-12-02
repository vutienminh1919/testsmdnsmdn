<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagRepository;
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }
    public function index()
    {
        $tags = $this->tagRepository->getAll();

        return view('backend.tag.list',compact('tags'));
    }


    public function showFormCreate()
    {

        return view("backend.tag.create");
    }


    public function store(Request $request)
    {
        $tag = $this->tagRepository->create($request);

        return redirect()->route('tags.index');
    }


    public function show($id)
    {
        $tag = $this->tagRepository->getById($id);
        return view('backend.tag.detail',compact('tag'));
    }


    public function showFormEdit($id)
    {
        $tag = $this->tagRepository->getById($id);
        return view('backend.tag.edit',compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $this->tagRepository->edit($request,$id);
        return redirect()->route('tags.index');
    }


    public function destroy($id)
    {
        $tag = $this->tagRepository->getById($id);
        $this->tagRepository->delete($id);
        return redirect()->route('tags.index');
    }
}
