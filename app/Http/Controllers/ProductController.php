<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
class ProductController extends Controller
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
        //sss
    }

    public function add_product(){
        //return "Add Products Details NOW";
        //add_product.blade.php

        return view('admin/add_product');
    }

    public function save_product(Request $request){
        
        $data = [];
        $data['product_name'] = $request->product_name ;
        $data['category_id'] = $request->category_id ;
        $data['manufacture_id'] = $request->manufacture_id ;
        $data['product_short_description'] = $request->product_short_description ;
        $data['product_long_description'] = $request->product_long_description ;
        $data['product_price'] = $request->product_price ;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color ;
        $data['publication_status'] = $request->publication_status;
        
        // $image = $request->file('product_image');        
        // $image_name = str_random(20);
        // $ext = strtolower($image->getClientOriginalExtension());
        // $image_full_name = $image_name . '.' .$ext;
        // $upload_path = 'imagesss';
        // $image_url = $upload_path . $image_full_name;
        // $success = $image->move($upload_path , $image_full_name);
        
        $image = $request->file('product_image');
        $filename = time() . $image->getClientOriginalName();
        $location = "imagesss";

        $image-> move($location , $filename);
        $data['product_image'] =  $filename;
        DB::table('tbl_product_item')->insert($data);
        return Redirect::to('/add_product');
    }

        public function all_product(){
            //return "View All Products ";
            $product = DB::table('tbl_product_item')
                       ->join('tbl_category','tbl_product_item.category_id', '=' ,'tbl_category.category_id') 
                       ->join('tbl_manufacture','tbl_product_item.manufacture_id' , '=' , 'tbl_manufacture.manufacture_id')        
                       ->select('tbl_product_item.*' , 'tbl_category.category_name' , 'tbl_manufacture.manufacture_name') // category_name AND manufacture_name are Called bcoz they are calling On All Product Page ...
                       ->get();
            return view('admin/all_product' , compact('product'));   
        }

        public function inactive_product($product_id){
            //echo "product Is Inactive For Now ..." . $product_id;

            DB::table('tbl_product_item')->Where('product_id' , $product_id)->update(['publication_status'=>0]);
            return Redirect::to('all_product');
        }

        public function active_product($product_id){
            
            DB::table('tbl_product_item')->WHERE('product_id', $product_id)->update(['publication_status'=>1]);
            return Redirect::to('all_product');
        }

        public function edit_product($product_id){
            //echo "Here product ID is :- " . $product_id;
            $product = DB::table('tbl_product_item')->where('product_id' , $product_id)->get();
            return view('admin/edit_product' , compact('product'));


        }

        public function delete_product($product_id){
            $product = DB::table('tbl_product_item')->where('product_id' , $product_id)->delete();
            return Redirect::to('all_product');
        }


}
