<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return "Add Category Page We Are Opened";
        return view('admin/add_category');

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

    public function all_category(){
        //echo "All Catories SHown ";

        $category = DB::table('tbl_category')->get();
        return view('admin/all_category' , compact('category'));
    }

    public function save_category(AddCategoryRequest $request){
        //return view('admin/add_category');
        //return "Category Saved";


        $data = [];
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;

        $output = DB::table('tbl_category')->insert($data);

        if($output){
            
            
            return Redirect::to('/add-category');
            Session::put('addcatmessage','Category has Been Added Success'); 

        }else{
            echo "Data Inserted Failed";
        }
    }
    
    public function unactive_category($unactive_id){
              
           
            $unactive = DB::table('tbl_category')
                        ->where('category_id' , $unactive_id)
                        ->update(['publication_status'=> 1]);
            return Redirect::to('/all-category');
    }


    public function inactive_category($inactive_id){
        

                    DB::table('tbl_category')
                    ->where('category_id', $inactive_id)
                    ->update(['publication_status'=> 0]);

                    return Redirect::to('/all-category');

    }


    public function edit_category($category_id){    
       
        // Start (learn Hunter Method)

        // $category_info = DB::table('tbl_category')		
		// ->where('category_id' , $category_id)		
		// ->first();

		// $category_info = view('admin.edit_category')		
		// ->with('category_info' , $category_info);		
		// return view('layouts.newadmin_dashboard_layout')  		
        // ->with('admin.edit_category', $category_info);
        
        // End (learn Hunter Method)

        // Start (Rajat Method)
        // This Is Another way To get Data From Database // $category_idd = DB::table('tbl_category')-> where('category_id', $category_id)->get(['category_name','category_description']);
        
        $category_idd = DB::table('tbl_category')-> where('category_id', $category_id)->get();
        return view('admin/edit_category' , compact('category_idd')) ;         
        
        // End (Rajat Method)


    }


    public function update_category(Request $request , $category_id){
            
        $update_cat = array();

        //$update_cat = DB::table('tbl_category')->where('category_id', $category_id)->update();

        $update_cat['category_name'] = $request-> category_name;
        $update_cat['category_description'] = $request-> category_description;

        // echo "<pre>";
        //     print_r($update_cat);
        // echo "</pre>";

        DB::table('tbl_category')->where('category_id', $category_id)->update($update_cat);

        return Redirect::to('/all-category');

    }

    public function delete_category($category_id){

        $output = DB::table('tbl_category')->where('category_id', $category_id)->delete();
        Session::get('message' , 'Category Deleted Successfully !');
        return Redirect::to('/all-category');      

    }
}
