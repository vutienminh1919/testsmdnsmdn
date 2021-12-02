<?php

namespace App\Http\Controllers;

class RepoController extends Controller
{

    public function getAll ()
    {
        return view('backend.repo.list');
}
}
