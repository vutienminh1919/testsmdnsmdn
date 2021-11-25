<?php
namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;


class BaseRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $models = $this->model->all()->toQuery()->paginate(10);
        return $models;
    }

    public function getById($id)
    {
        $model = $this->model::query()->findOrFail($id);

        return $model;
    }

    public function delete($id)
    {
        $model = $this->model::query()->findOrFail($id);
        $model->delete();
    }

    public function getAllCategory()
    {
        $categories = Category::all();
        return $categories;
    }


}
