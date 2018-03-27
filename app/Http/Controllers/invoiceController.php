<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;

class invoiceController extends Controller
{
  public function getInvoice()
  {
    $user = JWTAuth::toUser();
    return $user->Invoice;
  }

  public function insertInvoice (Request $request)
  {
      $user = JWTAuth::toUser();
      $data = new Invoice();

      $data['userID'] = ['id'];
      $data['orderID'] = $request -> input('orderID');
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

  public function deleteInvoice(Request $request)
  {
      Invoice::where('id','=',$request->input('id'))->delete();
  }

  public function updateInvoice(Request $request)
  {
      Invoice::where('id','=', $request->input('id'))
      ->update([
        'userID' => $request->input('userID'),
        'orderID' => $request -> input('orderID'),
        'totalPrice' => $request -> input('totalPrice'),
        'orderDate' => $request -> input('orderDate'),
        'paymentType' => $request -> input('paymentType'),
        'paymentStatus' => $request -> input('paymentStatus'),
        'orderStatus' => $request -> input('orderStatus')
      ]);

      return response([
        'msg' => 'success',
      ]);
  }

}
