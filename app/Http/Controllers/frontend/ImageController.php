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
    public $show_img_col = 4;
    public $show_tag = 4;
    protected $limit_region = 4;

    public function index(Request $request)
    {
//        $groups = Groups::where([['status', '=', 1], ['id', '<>', 1]])
//            ->with(['image' => function ($q) {
//                $q->where('status', '=', 1);
//            }])->take(10)->get()->map(function ($q) {
//                $q->setRelation('image', $q->image->take(1));
//                return $q;
//            });
        $search = $request->input("tim-kiem");
        $id = $search;
        if (isset($search)) {
            $tag_old = $search;
            $tag_num = $this->show_tag;
            $groups = Groups::where([['status', '=', 1], ['id', '<>', 1], ['name_seo', 'like', '%' . $id . '%']])
                ->with(['image' => function ($q) {
                    $q->where('status', '=', 1);
                }])->orderBy('id', 'DESC')->take($this->show_tag)->get();
            $images = Images::where([['status', '=', 1], ['image_s', 'like', '%' . $id . '%']])->orderBy('id', 'DESC')->take($this->show_tag)->get();
            //type
            $types = Types::all();
            //tag
            $tag = Tags::first();
            $tags = array();
            $tags['name'] = explode(",", $tag->name);
            $tags['name_seo'] = explode(",", $tag->name_seo);
            //region
            $regions = Regions::limit($this->limit_region)->get();
            $first_url_image = $this->first_url_image;
            return view('frontends.search', compact('groups', 'first_url_image', 'types', 'tags', 'regions', 'tag_old', 'images', 'tag_num'));
        }
        $update = Groups::where('id', '=', 1)->with(['image' => function ($q) {
            $q->where('status', '=', 1)->orderBy('id', 'DESC');
        }])->first();
        $show_img = $this->show_img;
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
        $regions = Regions::limit($this->limit_region)->get();
        $first_url_image = $this->first_url_image;
        return view('frontends.index', compact('groups', 'first_url_image', 'types', 'tags', 'regions', 'show_img', 'update'));
    }

    public function show($id)
    {
        $post = Groups::where([['status', '=', 1], ['name_seo', $id]])->with('region')->first();
//        $tag_old = $post->tag;
        $types = Types::all();

        if (isset($post)) {
            $post_relationship = Groups::where([['status', '=', 1], ['id', '<>', $post->id]])
                ->offset($post->id - 6)->limit(5)
                ->orderBy('id', 'DESC')
                ->get();

            $tags = array();
            $tags['name'] = explode(",", $post->tag);
            $tags['name_seo'] = explode(",", $post->tag_seo);

            $view_current_old = $post->view;
            $continent = Continents::find($post->region->continent_id);
            $images = Images::where([['Group_id','=',$post->id],['status', '=', 1]])->orderby('id', 'DESC')->paginate($this->show_img);
            $first_url_image = $this->first_url_image;
            Event::fire(URL::current(), $post);
            $view_current_new = $post->view;
            //top view
            $view = new topView();
            $view->topView7($post->id, $view_current_old, $view_current_new);
        }
        return view('frontends.album', compact('post', 'images', 'types', 'first_url_image', 'continent', 'post_relationship', 'tags'));
    }

    public function group($id)
    {
        $post = Groups::where([['status', '=', 1], ['id', '<>', 1], ['name_seo', $id]])->with('region')->first();
        $continent = Continents::find($post->region->continent_id);
        $types = Types::all();

        if (isset($post)) {
            $images = Images::where(['Group_id','=',$post->id],['status', '=', 1])->orderby('id', 'DESC')->paginate($this->show_img);
            $first_url_image = $this->first_url_image;
            Event::fire(URL::current(), $post);
        }
        return view('frontends.album', compact('post', 'images', 'types', 'first_url_image', 'continent'));
    }

    public function tag($id)
    {
        $tag_old = $id;
        $tag_num = $this->show_tag;
        $groups = Groups::where([['status', '=', 1], ['id', '<>', 1], ['name_seo', 'like', '%' . $id . '%']])
            ->with(['image' => function ($q) {
                $q->where('status', '=', 1);
            }])->orderBy('id', 'DESC')->take($this->show_tag)->get();
        $images = Images::where([['status', '=', 1], ['image_s', 'like', '%' . $id . '%']])->orderBy('id', 'DESC')->take(3)->get();
        //type
        $types = Types::all();
        //tag
        $tag = Tags::first();
        $tags = array();
        $tags['name'] = explode(",", $tag->name);
        $tags['name_seo'] = explode(",", $tag->name_seo);
        //region
        $regions = Regions::limit($this->limit_region)->get();
        $first_url_image = $this->first_url_image;
        return view('frontends.tag', compact('groups', 'first_url_image', 'types', 'tags', 'regions', 'tag_old', 'images', 'tag_num'));
    }

    public function tagPost($id)
    {
        $tag_old = $id;
        $groups = Groups::where([['status', '=', 1], ['name_seo', 'like', '%' . $id . '%']])
            ->orderBy('id', 'DESC')->paginate($this->show_img);
        //type
        $types = Types::all();
        //tag
        $tag = Tags::first();
        $tags = array();
        $tags['name'] = explode(",", $tag->name);
        $tags['name_seo'] = explode(",", $tag->name_seo);
        //region
        $regions = Regions::limit($this->limit_region)->get();
        $first_url_image = $this->first_url_image;
        return view('frontends.tagPost', compact('groups', 'first_url_image', 'types', 'tags', 'regions', 'tag_old'));
    }

    public function searchPost($id)
    {
        $tag_old = $id;
        $images = Images::where([['status', '=', 1], ['image_s', 'like', '%' . $id . '%']])->orderBy('id', 'DESC')->paginate($this->show_img);
        //type
        $types = Types::all();
        //tag
        $tag = Tags::first();
        $tags = array();
        $tags['name'] = explode(",", $tag->name);
        $tags['name_seo'] = explode(",", $tag->name_seo);
        //region
        $regions = Regions::limit($this->limit_region)->get();
        $first_url_image = $this->first_url_image;
        return view('frontends.searchPost', compact('images', 'first_url_image', 'types', 'tags', 'regions', 'tag_old'));
    }

    public function tagImage($id)
    {
        $tag_old = $id;
        $groups = Groups::where([['status', '=', 1], ['id', '<>', 1], ['name_seo', 'like', '%' . $id . '%']])
            ->with(['image' => function ($q) {
                $q->where('status', '=', 1);
            }])->orderBy('id', 'DESC')->paginate($this->show_img);
        //type
        $types = Types::all();
        //tag
        $tag = Tags::first();
        $tags = array();
        $tags['name'] = explode(",", $tag->name);
        $tags['name_seo'] = explode(",", $tag->name_seo);
        //region
        $regions = Regions::limit($this->limit_region)->get();
        $first_url_image = $this->first_url_image;
        return view('frontends.tagImage', compact('groups', 'first_url_image', 'types', 'tags', 'regions', 'tag_old'));
    }

    public function searchImage($id)
    {
        $tag_old = $id;
        $groups = Groups::where([['status', '=', 1], ['id', '<>', 1], ['name_seo', 'like', '%' . $id . '%']])
            ->with(['image' => function ($q) {
                $q->where('status', '=', 1);
            }])->orderBy('id', 'DESC')->paginate($this->show_img);
        //type
        $types = Types::all();
        //tag
        $tag = Tags::first();
        $tags = array();
        $tags['name'] = explode(",", $tag->name);
        $tags['name_seo'] = explode(",", $tag->name_seo);
        //region
        $regions = Regions::limit($this->limit_region)->get();
        $first_url_image = $this->first_url_image;
        return view('frontends.searchImage', compact('groups', 'first_url_image', 'types', 'tags', 'regions', 'tag_old'));
    }

    public function region($id)
    {
        $region_old = $id;
        //type
        $types = Types::all();
        //url type
        $first_url_image = $this->first_url_image;
        if ($id == 'xem-them') {
            $ran_show_id = array();
            $ran_show_id_img = array();
            $id_rand = Groups::where([['status', '=', 1], ['id', '<>', 1]])->pluck('id');
            $id_rand_img = Images::where([['status', '=', 1],['group_id', '<>', 1]])->pluck('id');
            if (count($id_rand) >= $this->show_img_col) {
                $ran_show = randomGen(0,count($id_rand)-1,$this->show_img_col);
                $ran_show_img = randomGen(0,count($id_rand_img)-1,$this->show_img_col);
                for($i = 0; $i<$this->show_img_col; $i++) {
                    $ran_show_id[] = $id_rand[$ran_show[$i]];
                    if (count($id_rand_img) != 0)
                    $ran_show_id_img[] = $id_rand_img[$ran_show_img[$i]];
                }
            } else {
                $ran_show_id = $id_rand;
                $ran_show_id_img = $id_rand_img;
            }
            $images = Images::where([['status', '=', 1], ['group_id', '<>', 1]])->whereIn('id', $ran_show_id_img)->limit($this->show_img_col)->get();
            $groups = Groups::where([['status', '=', 1], ['id', '<>', 1]])->whereIn('id', $ran_show_id)
                ->with(['image' => function ($q) {
                    $q->where('status', '=', 1);
                }])->limit($this->show_img_col)->get();
            $regions = Regions::all();
            return view('frontends.regionAll', compact('groups', 'first_url_image', 'types', 'tags', 'regions', 'region_id', 'region_old', 'images'));
        } else {
            $region_id = Regions::wherename_seo($id)->first();
            if (isset($region_id)) {
                $groups = Groups::where([['status', '=', 1], ['id', '<>', 1], ['region_id', '=', $region_id->id]])
                    ->with(['image' => function ($q) {
                        $q->where('status', '=', 1);
                    }])->orderBy('id', 'DESC')->paginate($this->show_img);
            }
            //tag
            $tag = Tags::first();
            $tags = array();
            $tags['name'] = explode(",", $tag->name);
            $tags['name_seo'] = explode(",", $tag->name_seo);
            //region
            $regions = Regions::limit($this->limit_region)->get();
            return view('frontends.region', compact('groups', 'first_url_image', 'types', 'tags', 'regions', 'region_id', 'region_old'));
        }

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
        $regions = Regions::limit($this->limit_region)->get();
        $first_url_image = $this->first_url_image;
        return view('frontends.type', compact('groups', 'first_url_image', 'types', 'tags', 'regions', 'type_id'));

    }

    public function postView()
    {
        $currentPage = \Illuminate\Support\Facades\Input::get('page', 2);
        \Illuminate\Pagination\Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });
        $show_img = $this->show_img;
        $groups = Groups::where([['status', '=', 1], ['id', '<>', 1]])
            ->with(['image' => function ($q) {
                $q->where('status', '=', 1);
            }])->orderBy('id', 'DESC')->paginate($this->show_img);
        $types = Types::all();
        //tag
        $tag = Tags::first();
        $tags = array();
        $tags['name'] = explode(",", $tag->name);
        $tags['name_seo'] = explode(",", $tag->name_seo);
        //region
        $regions = Regions::limit($this->limit_region)->get();
        $first_url_image = $this->first_url_image;
        return view('frontends.postView', compact('groups', 'first_url_image', 'types', 'tags', 'regions', 'show_img'));
    }

    public  function image($id) {
        $first_url_image = $this->first_url_image;
        $image = Images::whereimage_s($id)->first();
//        return $image->url;
        return view('frontends.show', compact('first_url_image', 'image'));
    }
}
