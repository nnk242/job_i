<?php

namespace App\Http\Controllers\frontend;

use App\Groups;
use App\Regions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Images;

class ImageController extends Controller
{
    //
    public $first_url_image = array('http');
    public $show_img = 1;

    public function index()
    {
        $groups = Groups::where([['status', '=', 1], ['id', '<>', 1]])
            ->with(['image' => function ($q) {
                $q->where('status', '=', 1);
            }])->take(10)->get()->map(function ($q) {
                $q->setRelation('image', $q->image->take($this->show_img));
                return $q;
            });
//        dd($groups);
        $first_url_image = $this->first_url_image;
        return view('frontends.index', compact('groups', 'first_url_image'));
    }

    public function group($id)
    {
        $post = Groups::where([['status', '=', 1], ['id', '<>', 1], ['name_seo', $id]])->with('region')->first();
        $images = Images::whereGroup_id($post->id)->orderby('id', 'DESC')->paginate(10);
        $first_url_image = $this->first_url_image;
        return view('frontends.album', compact('post', 'images', 'first_url_image'));
    }

    public function show($id)
    {
        return view('frontends.show');
    }
}
