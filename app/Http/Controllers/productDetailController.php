<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductDetail;

class productDetailController extends Controller
{
  
  public function getpd()
  {
    return ProductDetail::all();
  }

  public function insertpd (Request $request)
  {
      $data = new ProductDetail();
      $data['categoryID'] = $request -> input('categoryID');
      $data['brand'] = $request -> input('brand');
      $data['name'] = $request -> input('name');
      $data['price'] = $request -> input('price');
      $data['image'] = $request -> input('image');
      $data['description'] = $request -> input('description');
      $data['material'] = $request -> input('material');
      $data -> save();

      return response([
        'msg'=>'success',
      ]);
  }

  public function deletepd(Request $request)
  {
      ProductDetail::where('id','=',$request->input('id'))->delete();
  }

  public function updatepd(Request $request)
  {
      ProductDetail::where('id','=', $request->input('id'))
      ->update([
        'categoryID' => $request->input('categoryID'),
        'brand' => $request -> input('brand'),
        'name' => $request -> input('name'),
        'price' => $request -> input('price'),
        'image' => $request -> input('image'),
        'description' => $request -> input('description'),
        'material' => $request -> input('material'),
        'size' => $request -> input('size'),
        'stock' => $request -> input('stock')
      ]);

      return response([
        'msg' => 'success',
      ]);
  }



}
