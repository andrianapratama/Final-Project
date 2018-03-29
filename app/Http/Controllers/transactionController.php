<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transactionController extends Controller
{
    //
    public function getTrans()
    {
        $user = JWTAuth::toUser();
        return $user->Transaction;
    }

    public function insertTrans()
    {
        $user = JWTAuth::toUser();
        $data = new Transaction();
        $data['userID'] = ['id'];
        $data['productID'] = $request -> input('productID');
        $data['orderID'] = $request -> input('orderID');
        $data['quantity'] = $request -> input('quantity');
        $data['totalPrice'] = $request -> input('totalPrice');
        $data['orderDate'] = $request -> input('orderDate');
        $data['paymentType'] = $request -> input('paymentType');
        $data['paymentStatus'] = $request -> input('paymentStatus');
        $data['orderStatus'] = $request -> input('orderStatus');
        $data -> save();

        return response([
            'msg'=>'success',
        ]);
    }

    public function deleteTrans(Request $request)
    {
        Transaction::where('id','=',$request->input('id'))->delete();
    }

    public function updateTrans(Request $request)
  {
      Transaction::where('id','=', $request->input('id'))
      ->update([
        'userID' => $request -> input('userID'),
        'productID' => $request -> input('productID'),
        'orderID' => $request -> input('orderID'),
        'quantity' => $request -> input('quantity'),
        'totalPrice' => $request -> input('totalPrice'),
        'orderDate' => $request -> input('orderDate'),
        'paymentType' => $request -> input('paymentType'),
        'paymentStatus' => $request -> input('paymentStatus'),
        'orderStatus' => $request -> input('orderStatus'),
      ]);

      return response([
        'msg' => 'success',
      ]);
  }
}
