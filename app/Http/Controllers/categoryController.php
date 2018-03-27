<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class categoryController extends Controller
{
  public function getCategory()
  {
    return Category::all();
  }

  public function insertCategory (Request $request)
  {
      $data = new Category();
      $data['name'] = $request -> input('name');
      $data -> save();

      return response([
        'msg'=>'success',
      ]);
  }

  public function deleteCategory(Request $request)
  {
      Category::where('id','=',$request->input('id'))->delete();
  }

  public function updateCategory(Request $request)
  {
      Category::where('id','=', $request->input('id'))
      ->update([
        'name' => $request->input('name'),
      ]);

      return response([
        'msg' => 'success',
      ]);
  }


}
