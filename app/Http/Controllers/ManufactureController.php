<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

class ManufactureController extends Controller
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

    public function add_manufacture(){
        //return "Add manu";
        return view('admin/add_manufacture');
    }

    public function save_manufacture(Request $request){
        //return "Manufac";
        $request->all();


        $manu_data = [];
        $manu_data['manufacture_name'] = $request->manufacture_name;
        $manu_data['manufacture_description'] = $request->manufacture_description;
        $manu_data['publication_status'] = $request->publication_status;

        $output = DB::table('tbl_manufacture')->insert($manu_data);

        echo "<script> alert('data added') </script>";

        return Redirect::to('add-manufacture');
    }


    public function all_manufacture(){
        $manufacture = DB::table('tbl_manufacture')->get();
        return view('admin/all-manufactue' , compact('manufacture'));
    }

    public function inactive_manufacture($manufacture_id){
        
        //return "Heheheheheeheh" .$manufacture_id ;

        $manufacture = DB::table('tbl_manufacture')->where('manufacture_id' , $manufacture_id)->update(['publication_status'=>0]);
    
        return Redirect::to('all-manufacture');
    }

   
    
    public function unactive_manufacture($manufacture_id){
        
        //return "Heheheheheeheh" .$manufacture_id ;
        $manufacture = DB::table('tbl_manufacture')->where('manufacture_id' , $manufacture_id)->update(['publication_status'=>1]);
    
        return Redirect::to('all-manufacture');
    }  


    public function edit_manufacture($manufacture_id){
        
        //return "Heheheheheeheh" .$manufacture_id;
        
        $manufacture = DB::table('tbl_manufacture')->where('manufacture_id' , $manufacture_id)->get();
 

        return view('admin/edit_manufacture',compact('manufacture'));

        // $manufacture = DB::table('tbl_manufacture')->where('manufacture_id' , $manufacture_id)->update(['publication_status'=>1]);
        // return Redirect::to('all-manufacture');
    } 

    public function update_manufacture(Request $request , $manufacture_id){
        //return $manufacture_id;

        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";

        $update_man = [];
        $update_man['manufacture_name'] = $request->manufacture_name;
        $update_man['manufacture_description'] = $request->manufacture_description;

        $manufacture_id = DB::table('tbl_manufacture')->where('manufacture_id', $manufacture_id)->update($update_man);

        return Redirect::to('all-manufacture');

        //$manufacture_id = DB::table('tbl_manufacture')->where
    }


    public function delete_manufacture($manufacture_id){
        DB::table('tbl_manufacture')->where('manufacture_id', $manufacture_id)->delete();
        return Redirect::to('all-manufacture');
    }
}
