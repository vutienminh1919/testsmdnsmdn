<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
    public function create(Request $request)
    {
        $data = $request->only('name','email','password','role_id');
        $data['password'] = Hash::make($request->password);
        $user = User::query()->create($data);
        $user->roles()->attach($data['role_id']);
        return $user;
    }
    public function edit(Request $request, $id)
    {
        $user = User::query()->findOrFail($id);
        $data = $request->only('name','email','password');
        $data['password'] = Hash::make($request->password);

         User::query()->where("id","=",$id)->update($data);
        $user->roles()->sync($request->role_id);


    }
    public function getRoleByUser($userId)
    {
        $result = [];
        $roles =  DB::table('role_user')->where('user_id',$userId)->get();
        foreach ($roles as $role){
            $result[] = $role->role_id;
        }
        return $result;
    }


}
