<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('backends.groups.index', compact('images'));
    }
}
