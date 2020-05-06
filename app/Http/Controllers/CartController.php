<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function add_to_cart(Request $request){
        //echo "Product Is Added into Cart";
        

        $prodcut_detail = array();
        echo $prodcut_detail = $request->qty;
        echo "<br>";
        echo $prodcut_detail = $request->product_id;
        echo "<br><br>";

        $product_info = DB::table('tbl_product_item')->where('product_id', $prodcut_detail) // main is Product_id
                    ->first();
        
        echo "<pre>";
        print_r($product_info);
        echo "</pre>";


        $data = [];
        $data['id'] = $product_info->product_id;
        $data['name'] = $product_info->product_name;
        $data['qty'] = $request->qty;
        $data['price'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;

        //return view('admin/add_to_cart');

        Cart::add($data);
        return Redirect::to('show_cart');

    }


    public function show_cart(){
        return view('admin/add_to_cart');
    }

    public function delete_to_cart($rowId){
        //echo $rowId;

        Cart::update($rowId , 0);
        //Cart::remove($rowId ); //// This Will Also Work
        return Redirect::to('show_cart');
    }

    public function update_cart_quantity(Request $request){
        

        $qty = $request->qty;
        //echo "<br>";
        $rowId = $request->rowId;

       Cart::update($rowId , $qty);
       return Redirect::to('show_cart');


    }
}
