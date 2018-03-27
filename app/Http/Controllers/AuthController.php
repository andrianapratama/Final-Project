<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Notifications\Notifiable;
use Validator;


class AuthController extends Controller
{
  use Notifiable;
  public function register(Request $request)
  {

      $credentials = $request->only('name', 'email','password', 'province', 'city', 'district', 'zip', 'phone', 'gender');

      $rules = [
          'name' => 'required|min:4',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:4',
          'province' => 'required',
          'city' => 'required',
          'district' => 'required',
          'zip' => 'required',
          'phone' => 'required',
          'gender' => 'required'

      ];

      $validator = Validator::make($credentials, $rules);
        if($validator->fails())
        {
          return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $name = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);
        $province = $request->province;
        $city = $request->city;
        $district = $request->district;
        $zip = $request->zip;
        $phone = $request->phone;
        $gender = $request->gender;

        $user = User::create([
          'name' => $name,
          'email' => $email,
          'password' => $password,
          'province' => $province,
          'city' => $city,
          'district' => $district,
          'zip' => $zip,
          'phone' => $phone,
          'gender' => $gender

        ]);

        return response([
          'msg' => 'success'
        ],200);
  }




    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator = Validator::make($credentials, $rules);
            if($validator->fails())
            {
              return response()->json(['success'=> false, 'error'=> $validator->messages()]);
            }

        // $credentials['is_verified'] = 1;
        //
        try
        {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials))
            {
                return response()->json(['success' => false, 'error' => 'Cant find an account '], 401);
            }
        }

        catch (JWTException $e)
        {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }


        // all good so return the token
       return response()->json(['success' => true, 'data'=> [ 'token' => $token ]]);
    }




    public function logout(Request $request)
    {
        try
        {
            JWTAuth::invalidate();
            return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);
        }

        catch (JWTException $e)
        {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }

    public function me()
    {
      $user = JWTAuth::toUser();
      return response()->json($user, 200);
    }

}
