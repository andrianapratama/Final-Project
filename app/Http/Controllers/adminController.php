<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class adminController extends Controller
{

  public function getAdmin()
  {
    return Admin::all();
  }

  public function insertAdmin (Request $request)
  {
      $data = new Admin();
      $data['username'] = $request -> input('username');
      $data['password'] = $request -> input('password');
      $data -> save();

      return response([
        'msg'=>'success',
      ]);
  }

  public function deleteAdmin(Request $request)
  {
      Admin::where('id','=',$request->input('id'))->delete();
  }

  public function updateAdmin(Request $request)
  {
      Admin::where('id','=', $request->input('id'))
      ->update([
        'username' => $request->input('username'),
        'password' => $request -> input('password')
      ]);

      return response([
        'msg' => 'success',
      ]);
  }



}
