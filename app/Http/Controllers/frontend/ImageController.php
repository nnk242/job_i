<?php

namespace App\Http\Controllers\frontend;

use App\Continents;
use App\Groups;
use App\Regions;
use App\Types;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Images;
Use Event;
use Illuminate\Support\Facades\URL;

class ImageController extends Controller
{
    //
    public $first_url_image = array('http');
    public $show_img = 20;

    public function index()
    {
//        $groups = Groups::where([['status', '=', 1], ['id', '<>', 1]])
//            ->with(['image' => function ($q) {
//                $q->where('status', '=', 1);
//            }])->take(10)->get()->map(function ($q) {
//                $q->setRelation('image', $q->image->take(1));
//                return $q;
//            });
        $groups = Groups::where([['status', '=', 1], ['id', '<>', 1]])
            ->with(['image' => function ($q) {
                $q->where('status', '=', 1);
            }])->orderBy('id', 'DESC')->take($this->show_img)->get();
        $types = Types::all();
        $first_url_image = $this->first_url_image;
        return view('frontends.index', compact('groups', 'first_url_image', 'types'));
    }

    public function show($id)
    {
        $post = Groups::where([['status', '=', 1], ['id', '<>', 1], ['name_seo', $id]])->with('region')->first();
        $types = Types::all();

        if(isset($post)) {
            $continent = Continents::find($post->region->continent_id);
            $images = Images::whereGroup_id($post->id)->orderby('id', 'DESC')->paginate(10);
            $first_url_image = $this->first_url_image;
            Event::fire(URL::current(), $post);
        } return view('frontends.album', compact('post', 'images', 'types', 'first_url_image', 'continent'));
    }

    public function group($id)
    {
        $post = Groups::where([['status', '=', 1], ['id', '<>', 1], ['name_seo', $id]])->with('region')->first();
        $continent = Continents::find($post->region->continent_id);
        $types = Types::all();

        if(isset($post)) {
            $images = Images::whereGroup_id($post->id)->orderby('id', 'DESC')->paginate(10);
            $first_url_image = $this->first_url_image;
            Event::fire(URL::current(), $post);
        } return view('frontends.album', compact('post', 'images', 'types', 'first_url_image', 'continent'));
    }

    public function type($id)
    {
        return view('frontends.show');
    }
}
