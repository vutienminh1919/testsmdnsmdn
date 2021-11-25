<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
    public function create(Request $request)
    {
        $data = $request->only('name','email','password');
        $data['password'] = Hash::make($request->password);
        $user = User::query()->create($data);
        return $user;
    }
    public function edit(Request $request, $id)
    {
        $user = User::query()->findOrFail($id);
        $data = $request->only('name','email','password');
        $data['password'] = Hash::make($request->password);
        return User::query()->where("id","=",$id)->update($data);
    }

}
