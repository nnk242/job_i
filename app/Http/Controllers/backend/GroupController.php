<?php

namespace App\Http\Controllers\backend;

use App\Groups;
use App\Regions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class GroupController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public $item_group = 10;

    public function index()
    {
        $groups = Groups::paginate($this->item_group);
        $regions = Regions::all();
        return view('backends.groups.index', compact('groups', 'regions'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            // gộp mảng errors thành chuỗi, cách nhau bởi dấu cách
            $message = implode(' ', $validator->errors()->all());
            return redirect()->back()->with('er', 'Update group fail...' . $message);
        } else {
            try {
                $group = new Groups();
                $name = $request->name;
                $status = $request->status;

                $group->user_id = Auth::id();
                $group->name = $name;
                $group->name_seo = Groups::wherename_seo($name)->count() > 0 ? str_seo_m(str_replace('.html', '', $name)) . '-' . time() : str_seo_m($name);
                $group->description = $request->description;
                $group->region_id = $request->region;
                $group->status = $status == 1 ? 1 : 0;
                $group->save();
                return redirect()->back()->with('mes', 'Created group');
            } catch (\Exception $ex) {
                return redirect()->back()->with('er', 'Update group fail...');
            }

        }
    }

    public function edit($id) {
        $group = Groups::find($id);
        $regions = Regions::all();
        return view('backends.groups.edit', compact('group', 'regions'));
    }

    public function postEdit($id, Request $request) {
        try {
            $status = $request->status;
            $group = Groups::find($id);
            $group->user_id = Auth::id();
            $group->name = $request->name;
            $group->name_seo = $request->name_seo;
            $group->description = $request->description;
            $group->region_id = $request->region;
            $group->status = $status == 1 ? 1 : 0;
            $group->save();
            return redirect()->back()->with('mes', 'edited group.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('er', 'edit group fail.');
        }
    }

    public function delete($id)
    {
        try {
            Groups::find($id)->delete();
            return redirect()->back()->with('mes', 'Deleted group.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('er', 'Delete group fail...');
        }
    }

    //region
    public function createRegion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            // gộp mảng errors thành chuỗi, cách nhau bởi dấu cách
            $message = implode(' ', $validator->errors()->all());
            return redirect()->back()->with('er', 'Update region fail...' . $message);
        } else {
            try {
                $region = new Regions();
                $name = $request->name;
                $status = $request->status;

                $region->user_id = Auth::id();
                $region->image = $request->image;
                $region->name = $name;
                $region->name_seo = Regions::wherename_seo($name)->count() > 0 ? str_seo_m(str_replace('.html', '', $name)) . '-' . time() : str_seo_m($name);
                $region->description = $request->description;
                $region->status = $status == 1 ? 1 : 0;
                $region->save();
                return redirect()->back()->with('mes', 'Created region');
            } catch (\Exception $ex) {
                return redirect()->back()->with('er', 'Update region fail...');
            }

        }
    }

    public function deleteRegion($id)
    {
        try {
            Regions::find($id)->delete();
            return redirect()->back()->with('mes', 'Deleted region.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('er', 'Delete region fail...');
        }
    }
    public function editRegion($id) {
        $region = Regions::find($id);
        return view('backends.groups.editRegion', compact('region'));
    }
    public function postEditRegion($id, Request $request) {
        $status = $request->status;
        $region = Regions::find($id);
        $region->user_id = Auth::id();
        $region->name = $request->name;
        $region->name_seo = $request->name_seo;
        $region->image = $request->image;
        $region->description = $request->description;
        $region->status = $status == 1 ? 1 : 0;
        $region->save();
        return redirect()->back()->with('mes', 'edited region.');
    }

    public function getNameSeoRegion(Request $request) {
        try {
            $name = $request->name;
            $region = Regions::wherename_seo(str_seo_m($name))->count() > 0 ? str_seo_m(str_replace('.html', '', $name)) . '-' . time() : str_seo_m($name);
            return [
                'status' => true,
                'value_seo' => $region,
                'message' => 'Get name seo successful!'
            ];
        } catch (\Exception $ex) {
            return [
                'status' => false,
                'message' => 'Get name seo fail!!!'
            ];
        }
    }
    public function getNameSeoGroup(Request $request) {
        try {
            $name = $request->name;
            $group = Groups::wherename_seo(str_seo_m($name))->count() > 0 ? str_seo_m(str_replace('.html', '', $name)) . '-' . time() : str_seo_m($name);
            return [
                'status' => true,
                'value_seo' => $group,
                'message' => 'Get name seo successful!'
            ];
        } catch (\Exception $ex) {
            return [
                'status' => false,
                'message' => 'Get name seo fail!!!'
            ];
        }
    }
}
