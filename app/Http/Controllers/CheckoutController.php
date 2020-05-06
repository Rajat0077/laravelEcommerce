<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;


class CheckoutController extends Controller
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

    public function login_check(){
        //echo "Login First";

        return view('admin/login_check');
    }

    public function customer_registration(Request $request){
        
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['password'] = md5($request->password);
        $data['mobile_number'] = $request->mobile_number;
        
        $last_insert_id = DB::table('tbl_customer')->insert($data);

        // Now I have to get the last Insert id After Submiting data into Database... 
        Session::put('last_insert_id' , $last_insert_id);
        Session::put('customer_name' , $request->customer_name);

        return redirect::to('/checkout');

    }

    public function checkout(){
        //return "Get The Last Insert Id";
        return view('admin/checkout');
    }

    public function save_shipping(Request $request){
        //$data = $request->all();
        
        $data['shipping_first_name'] = $request->shipping_first_name;
        $data['shipping_last_name'] = $request->shipping_last_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_telephone'] = $request->shipping_telephone;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_city'] = $request->shipping_city;
        
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $datashippingid = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id', $datashippingid);
        return Redirect::to('/payment');

        //echo "Data Inserted";
    }

    public function customer_login(Request $request){
        $data['customer_name'] = $request->customer_name;
        $data['password'] = $request->password;

        $cus_login = DB::table('tbl_customer')
                    -> where('customer_name', $data['customer_name'])
                    -> where('password', md5($data['password']))
                    ->first();

        if($cus_login){
            //echo "Login Success";
            Session::put('customer_id', $cus_login->customer_id);
            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/login-check');
            //echo "Login Fail";
        }
    }
    
    public function payment(){
        //return "Payment Option Is Always There";
        return view('admin/payment');
    }


    public function customer_logout(){   // LOGOUT FUNCTION remain always Below...
        Session::flush();
        return Redirect::to('/');
    }
}
