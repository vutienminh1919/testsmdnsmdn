<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('backend.category.list',compact("categories"));
    }


    public function showFormCreate()
    {

        return view('backend.category.create');
    }


    public function store(Request $request)
    {
        $category = $this->categoryRepository->create($request);
        return redirect()->route('categories.index');

    }


    public function show($id)
    {
        $category = $this->categoryRepository->getById($id);
        return view('backend.category.detail',compact('category'));
    }


    public function showFormEdit($id)
    {
        $category = $this->categoryRepository->getById($id);
        return view('backend.category.edit',compact('category'));

    }


    public function update(Request $request, $id)
    {

        $category = $this->categoryRepository->edit($request,$id);
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->getById($id);
        $this->categoryRepository->delete($id);
        return redirect()->route('categories.index');
    }
}
