<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bannerController extends Controller
{
    public function getBanner()
    {
        return Banner::all();
    }

    public function insertCategory (Request $request)
    {
        $data = new Category();
        $data['name'] = $request -> input('name');
        $data['caption'] = $request -> input('caption');
        $data['image'] = $request -> input('image');
        $data -> save();

        return response([
            'msg'=>'success',
        ]);
    }

    public function deleteBanner(Request $request)
    {
        Category::where('id','=',$request->input('id'))->delete();
    }

    public function updateCategory(Request $request)
    {
        Category::where('id','=', $request->input('id'))
            ->update([
                'name' => $request->input('name'),
                'caption' => $request->input('caption'),
                'image' => $request->input('image'),
            ]);

        return response([
            'msg' => 'success',
        ]);
    }
}