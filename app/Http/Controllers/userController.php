<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
  public function getUser()
  {
    return User::all();
  }

  public function insertUser (Request $request)
  {
      $data = new User();
      $data['name'] = $request -> input('name');
      $data['email'] = $request -> input('email');
      $data['password'] = $request -> input('password');
      $data['province'] = $request -> input('province');
      $data['city'] = $request -> input('city');
      $data['district'] = $request -> input('district');
      $data['zip'] = $request -> input('zip');
      $data['phone'] = $request -> input('phone');
      $data['gender'] = $request -> input('gender');
      $data -> save();

      return response([
        'msg'=>'success',
      ]);
  }

  public function deleteUser(Request $request)
  {
      User::where('id','=',$request->input('id'))->delete();
  }

  public function updateUser(Request $request)
  {
      User::where('id','=', $request->input('id'))
      ->update([
        'name' => $request->input('name'),
        'email' => $request -> input('email'),
        'password' => $request -> input('password'),
        'province' => $request -> input('province'),
        'city' => $request -> input('city'),
        'district' => $request -> input('district'),
        'zip' => $request -> input('zip'),
        'phone' => $request -> input('phone'),
        'gender' => $request -> input('gender')
      ]);

      return response([
        'msg' => 'success',
      ]);
  }


}
