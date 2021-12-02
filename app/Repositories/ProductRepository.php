<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function create(Request $request)
    {
        $data = $request->only('name','description','price','image');
        $image = $request->file('file');
        $data['image'] = time().'.'.$image->getClientOriginalExtension();
        $path = public_path('img');
        $image->move($path,$data['image']);
        $product = Product::create($data);
        return $product;

    }

    public function edit(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $data = $request->only('name','description','price','image');
//        $data['category_id'] = $request->input('category');
        return Product::where("id","=", $id)->update($data);

    }

}
