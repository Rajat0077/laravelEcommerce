<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
class SliderController extends Controller
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

    public function add_slider(){
        //return "Slider Image Is Shown Here";

        return view('admin/add_slider');
    }

    public function save_slider(Request $request){
        //return "Slider Is Added Success";
        //return $request->all();
        //return file::$request->slider_img;
        $data = [];
        $slider = $request->file('slider_img');
        $slider_image =  $slider ->getClientOriginalName();
        $uplodDir = 'UploadSliderImage/';
        $slider->move($uplodDir , $slider_image);

        $data['slider_img'] = $slider_image;
        $data['published_status'] = $request->published_status;

        DB::table('tbl_slider')->insert($data);
       // echo "data added";
        return Redirect::to('all_slider');
    }

    public function all_slider(){
        //return "All Slider Are Here";
        $slider = DB::table('tbl_slider')->get();
        return view('admin/all_slider' , compact('slider'));
    }

    public function inactive_slider($slider_id){
        //return $slider_id;
        DB::table('tbl_slider')->where('id', $slider_id)->update(['published_status'=>'0']);
        return Redirect::to('all_slider');
    }

    public function delete_slider($slider_id){
        db::table('tbl_slider')->where('id', $slider_id)->delete();
        return Redirect::to('/all_slider');
    }

    public function active_slider($slider_id){
        db::table('tbl_slider')->where('id', $slider_id)->update(['published_status'=> '1']);
        return Redirect::to('/all_slider');
    }
}
