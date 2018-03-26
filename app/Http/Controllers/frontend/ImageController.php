<?php

namespace App\Http\Controllers\frontend;

use App\Continents;
use App\Groups;
use App\Regions;
use App\Tags;
use App\Types;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Images;
Use Event;
use Illuminate\Support\Facades\URL;
use App\Views;
use App\View\topView;

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
        //tag
        $tag = Tags::first();
        $tags = array();
        $tags['name'] = explode(",", $tag->name);
        $tags['name_seo'] = explode(",", $tag->name_seo);
        //region
        $regions = Regions::all();
        $first_url_image = $this->first_url_image;
        return view('frontends.index', compact('groups', 'first_url_image', 'types', 'tags', 'regions'));
    }

    public function show($id)
    {
        $post = Groups::where([['status', '=', 1], ['id', '<>', 1], ['name_seo', $id]])->with('region')->first();
        $types = Types::all();

        if (isset($post)) {
            $post_relationship = Groups::where([['status', '=', 1], ['id', '<>', 1], ['id', '<>', $post->id]])
                ->offset($post->id - 6)->limit(5)
                ->orderBy('id', 'DESC')
                ->get();

            $view_current_old = $post->view;
            $continent = Continents::find($post->region->continent_id);
            $images = Images::whereGroup_id($post->id)->orderby('id', 'DESC')->paginate(10);
            $first_url_image = $this->first_url_image;
            Event::fire(URL::current(), $post);
            $view_current_new = $post->view;
            //top view
            $view = new topView();
            $view->topView7($post->id, $view_current_old, $view_current_new);
        }
        return view('frontends.album', compact('post', 'images', 'types', 'first_url_image', 'continent', 'post_relationship'));
    }

    public function group($id)
    {
        $post = Groups::where([['status', '=', 1], ['id', '<>', 1], ['name_seo', $id]])->with('region')->first();
        $continent = Continents::find($post->region->continent_id);
        $types = Types::all();

        if (isset($post)) {
            $images = Images::whereGroup_id($post->id)->orderby('id', 'DESC')->paginate(10);
            $first_url_image = $this->first_url_image;
            Event::fire(URL::current(), $post);
        }
        return view('frontends.album', compact('post', 'images', 'types', 'first_url_image', 'continent'));
    }

    public function tag($id)
    {
        $tag_old = $id;
        $groups = Groups::where([['status', '=', 1], ['id', '<>', 1], ['name_seo', 'like', '%'. $id . '%']])
            ->with(['image' => function ($q) {
                $q->where('status', '=', 1);
            }])->orderBy('id', 'DESC')->take($this->show_img)->get();
        $images = Images::where([['status', '=', 1], ['image_s', 'like', '%'. $id . '%']])->orderBy('id', 'DESC')->take($this->show_img)->get();
        //type
        $types = Types::all();
        //tag
        $tag = Tags::first();
        $tags = array();
        $tags['name'] = explode(",", $tag->name);
        $tags['name_seo'] = explode(",", $tag->name_seo);
        //region
        $regions = Regions::all();
        $first_url_image = $this->first_url_image;
        return view('frontends.tag', compact('groups', 'first_url_image', 'types', 'tags', 'regions', 'tag_old', 'images'));
    }

    public function tagPost($id)
    {
        $tag_old = $id;
        $groups = Groups::where([['status', '=', 1], ['id', '<>', 1], ['name_seo', 'like', '%'. $id . '%']])
            ->with(['image' => function ($q) {
                $q->where('status', '=', 1);
            }])->orderBy('id', 'DESC')->take($this->show_img)->get();
        $images = Images::where([['status', '=', 1], ['image_s', 'like', '%'. $id . '%']])->orderBy('id', 'DESC')->take($this->show_img)->get();
        //type
        $types = Types::all();
        //tag
        $tag = Tags::first();
        $tags = array();
        $tags['name'] = explode(",", $tag->name);
        $tags['name_seo'] = explode(",", $tag->name_seo);
        //region
        $regions = Regions::all();
        $first_url_image = $this->first_url_image;
        return view('frontends.tag', compact('groups', 'first_url_image', 'types', 'tags', 'regions', 'tag_old', 'images'));
    }

    public function region($id)
    {
        $region_id = Regions::wherename_seo($id)->first();
        if (isset($region_id)) {
            $groups = Groups::where([['status', '=', 1], ['id', '<>', 1], ['region_id', '=', $region_id->id]])
                ->with(['image' => function ($q) {
                    $q->where('status', '=', 1);
                }])->orderBy('id', 'DESC')->paginate($this->show_img);
        }
        //type
        $types = Types::all();
        //tag
        $tag = Tags::first();
        $tags = array();
        $tags['name'] = explode(",", $tag->name);
        $tags['name_seo'] = explode(",", $tag->name_seo);
        //region
        $regions = Regions::all();
        $first_url_image = $this->first_url_image;
        return view('frontends.region', compact('groups', 'first_url_image', 'types', 'tags', 'regions', 'region_id'));
    }

    public function type($id)
    {
        $type_id = Types::wherename_seo($id)->first();
        if (isset($type_id)) {
            $groups = Groups::where([['status', '=', 1], ['id', '<>', 1], ['type_id', '=', $type_id->id]])
                ->with(['image' => function ($q) {
                    $q->where('status', '=', 1);
                }])->orderBy('id', 'DESC')->paginate($this->show_img);
        }
        //type
        $types = Types::all();
        //tag
        $tag = Tags::first();
        $tags = array();
        $tags['name'] = explode(",", $tag->name);
        $tags['name_seo'] = explode(",", $tag->name_seo);
        //region
        $regions = Regions::all();
        $first_url_image = $this->first_url_image;
        return view('frontends.type', compact('groups', 'first_url_image', 'types', 'tags', 'regions', 'type_id'));

    }
}
