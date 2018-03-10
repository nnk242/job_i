<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Images;

class ImageController extends Controller
{
    //
    public function show($id) {
        return view('frontends.show');
    }
}
