<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RoleRepository extends BaseRepository
{

    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

    public function create(Request $request)
    {
        $data = $request->only('name');

        $role = Role::create($data);
        return $role;

    }

    public function edit(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        $data = $request->only('name');
//        $data['category_id'] = $request->input('category');
        return Role::where("id","=", $id)->update($data);

    }
}

