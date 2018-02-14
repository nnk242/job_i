<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RemoteImageUploader\Factory;
use Validator;

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
        //
        return view('backends.images.index');
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
        //
    }
}
