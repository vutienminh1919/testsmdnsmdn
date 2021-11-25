<?php
namespace App\Repositories;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function create(Request $request)
    {
        $data = $request->only('name','description');
        $category = Category::create($data);
        return $category;

    }

    public function edit(Request $request,$id)
    {
        $category = Category::findOrFail($id);
        $data = $request->only('name','description');
        return Category::where('id','=','$id')->update($data);
    }
}
