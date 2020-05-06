<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
class TestController extends Controller
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
        echo "Data Saved";
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

    public function test_case(){
        return view('admin/testcase');
    } 

    public function test_save(Request $request){

        //$filename = Input::file('name');
        //echo $filename = $pic->getClientOriginalName();
        //$destinationPath = 'image_upload/';
        //Input::file('name')->move($destinationPath, $fileName);
        
        //$request->hasFile('file');
        //return $filename = $request->file->getClientOriginalName();
        
        //Input::file('name')->move($destinationPath);
        //echo "Data Saved";

        //Input::file('photo')->move($destinationPath, $fileName);
        // Not Able to Save the Image into Data base See the Issue As soon As possible

        //$name = Input::file('name')->getClientOriginalName();
        //$menu = new Menu;

        // $input = Input::all();
        // if (Input::hasFile('name')){
        // $file = Input::file('name'); 
        // $destinationPath = 'menu_images';
        // $filename = $file->getClientOriginalName();
        // $upload_success = Input::file('name')->move($destinationPath, $filename); 
        
        // }else{
        //     echo "Not Added";
        // }

        $input = array();
        $file = $request->file('name');
        $name = time() . $file->getClientOriginalName();
        $file->move('uploadImagesssss', $name);

        $input['name'] = $name;
        $insert = DB::table('tbl_test_img')->insert($input);
        return "Data Added";

    }


}



