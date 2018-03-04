<?php

namespace App\Http\Controllers\backend;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RemoteImageUploader\Factory;
use Validator;
use App\Images;
use Auth;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Images::paginate(1);
        return view('backends.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backends.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Tạo validate cho $request->upload:
        // - không được trống
        // - là file image
        // - max size là 2345678
//        return $request->group;
        $validator = Validator::make($request->all(), [
            'upload' => 'required|image',
        ]);
        // Nếu validate fail thì return thông báo lỗi
        //  |size:2345678
        if ($validator->fails()) {
            // gộp mảng errors thành chuỗi, cách nhau bởi dấu cách
            $message = implode(' ', $validator->errors()->all());

            return [
                'status' => false,
                'url' => '',
                'message' => 'Upload fail! ' . $message,
            ];
        }

        try {
            // Thực hiện create và upload photo với config đã cài sẵn
            $result = Factory::create(config('uploadphoto.host'), config('uploadphoto.auth'))
                ->upload($request->upload->path());

            return [
                'status' => true,
                'url' => $result,
                'data' => $request->all(),
                'message' => 'Upload successfull!',
            ];
        } catch (\Exception $ex) {
            // Nếu bị Exception thì trả về message của Exception đó
            // Exception ở đây có thể là:
            // - host không hợp lệ
            // - api không hợp lệ
            // - xác thực auth không thành công
            // - không có quyền upload
            // - php không enable curl
            return [
                'status' => false,
                'url' => '',
                'message' => 'Upload fail! ' . $ex->getMessage(),
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $id;
    }

    public function loadingGroup()
    {
        return Group::orderBy('id', 'ASC')->get();
    }

    public function uploadAFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'name' => 'required',
            'group_id' => 'required'
        ]);
        if ($validator->fails()) {
            // gộp mảng errors thành chuỗi, cách nhau bởi dấu cách
            $message = implode(' ', $validator->errors()->all());
            return [
                'status' => false,
                'message' => 'Upload fail! ' . $message,
            ];
        } else {
            $url = $request->url;
            $name = $request->name;
            $title = $request->title;
            $content = $request->content_;
            $group = $request->group_id;
            $status = $request->status;
            try {
                $image = new Images();
                $image->user_id = Auth::id();
                $image->url = $url;
                $image->name = $name;
                $image->image_s = Images::whereimage_s(str_seo_m($name))->count() > 0 ? str_seo_m(str_replace('.html', '', $name)) . '-' . time() : str_seo_m($name);
                $image->title = $title;
                $image->content = $content;
                $image->group_id = $group;
                $image->status = $status;
                $image->save();
                return [
                    'status' => true,
                    'message' => 'Upload successful!' . str_seo_m($name . time())
                ];
            } catch (\Exception $ex) {
                return [
                    'status' => false,
                    'message' => 'Upload fail!'
                ];
            }
        }

    }

    public function uploadFile(Request $request)
    {
//        return $request->all();
        $group_check = $request->group_check;
        $name_check = $request->name_check;
        $title_check = $request->title_check;
        $content_check = $request->content_check;
        $url = $request->u_link;
        $status = $request->u_status;

        $count_item = count($request->u_link);

        $group = [];
        $title = [];
        $content = [];
        $name = [];

        if ($group_check == 1) {
            for ($i = 0; $i < $count_item; $i++) {
                $group[$i] = $request->group;
            }
        } else $group = $request->u_group;
        if ($name_check == 1) {
            for ($i = 0; $i < $count_item; $i++) {
                $name[$i] = $request->p_name;
            }
        } else $name = $request->u_name;
        if ($title_check == 1) {
            for ($i = 0; $i < $count_item; $i++) {
                $title[$i] = $request->p_title;
            }
        } else $title = $request->u_title;
        if ($content_check == 1) {
            for ($i = 0; $i < $count_item; $i++) {
                $content[$i] = $request->p_content;
            }
        } else $content = $request->u_content;
        try {
            for ($i = 0; $i < $count_item; $i++) {
                $image = new Images();
                $image->user_id = Auth::id();
                $image->url = $url[$i];
                $image->name = $name[$i];
                $image->image_s = Images::whereimage_s(str_seo_m($name[$i]))->count() > 0 ? str_seo_m(str_replace('.html', '', $name[$i])) . '-' . time() . $i : str_seo_m($name[$i]);
                $image->title = $title[$i];
                $image->content = $content[$i];
                $image->group_id = $group[$i];
                $image->status = $status[$i];
                $image->save();
            }
        } catch (\Exception $ex) {
            return 1231231;
        }
        return redirect()->back();
    }
}
