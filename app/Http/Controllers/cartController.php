<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class cartController extends Controller
{
  public function getcart()
  {
    return Cart::all();
  }

  public function insertcart (Request $request)
  {
      $data = new Cart();
      $data['productID'] = $request -> input('productID');
      $data['quantity'] = $request -> input('quantity');
      $data['price'] = $request -> input('price');
      $data -> save();

      return response([
        'msg'=>'success',
      ]);
  }

  public function deletecart(Request $request)
  {
      Cart::where('id','=',$request->input('id'))->delete();
  }

  public function updatecart(Request $request)
  {
      Cart::where('id','=', $request->input('id'))
      ->update([
        'productID' => $request->input('productID'),
        'quantity' => $request -> input('quantity'),
        'price' => $request -> input('price')
      ]);

      return response([
        'msg' => 'success',
      ]);
  }


}
