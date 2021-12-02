<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {

        $users = $this->userRepository->getAll();
        $roles = $this->userRepository->getAllRole();
        return view('backend.user.list', compact('users', 'roles'));
    }


    public function showFormCreate()
    {
        $roles = $this->userRepository->getAllRole();
        return view('backend.user.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $user = $this->userRepository->create($request);
        toastr()->success('Create Success !');
        return redirect()->route('users.index');

    }


    public function show($id)
    {
        $user = $this->userRepository->getById($id);
        return view('backend.user.show', compact('user'));
    }

    public function showFormEdit($id)
    {
        $roles = $this->userRepository->getAllRole();
        $user = $this->userRepository->getById($id);
        $roleOfUser = $this->userRepository->getRoleByUser($id);
        return view('backend.user.edit', compact('user', 'roles','roleOfUser'));

    }


    public function update(Request $request, $id)
    {
        $user = $this->userRepository->getById($id);
        toastr()->success('Update Success !');
        $this->userRepository->edit($request, $id);
        return redirect()->route('users.index');
    }


    public function destroy($id)
    {
        $this->userRepository->delete($id);
        toastr()->success('Update Success !');
        return redirect()->route('users.index');
    }


}
