<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductDesc;

class prodDescController extends Controller
{
  public function getpdesc()
  {
    return ProductDesc::all();
  }

  public function insertpdesc (Request $request)
  {
      $data = new ProductDesc();
      $data['descID'] = $request -> input('descID');
      $data['size'] = $request -> input('size');
      $data['stock'] = $request -> input('stock');
      $data -> save();

      return response([
        'msg'=>'success',
      ]);
  }

  public function deletepdesc(Request $request)
  {
      ProductDesc::where('id','=',$request->input('id'))->delete();
  }

  public function updatepdesc(Request $request)
  {
      ProductDesc::where('id','=', $request->input('id'))
      ->update([
        'descID' => $request->input('descID'),
        'size' => $request -> input('size'),
        'stock' => $request -> input('stock')
      ]);

      return response([
        'msg' => 'success',
      ]);
  }


}
