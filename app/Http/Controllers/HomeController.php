<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    //
    public function index(){
        
        
        $viewproduct = DB::table('tbl_product_item')
                        ->join('tbl_category', 'tbl_product_item.category_id' , '=' , 'tbl_category.category_id' )
                        ->join('tbl_manufacture' , 'tbl_product_item.manufacture_id', '=' , 'tbl_manufacture.manufacture_id' )
                        ->WHERE('tbl_product_item.publication_status',1)
                        ->limit(10)
                        ->get();
        return view('pages/home',compact('viewproduct'));
    }

    public function product_by_category($cat_prod_id){
        
        $viewproduct = DB::table('tbl_product_item')
                            //  ->join('tbl_category', 'tbl_product_item.category_id' , '=' , 'tbl_category.category_id')
                            //  ->join('tbl_manufacture','tbl_product_item.manufacture_id' , '=' , 'tbl_manufacture.manufacture_id')        
                            //  ->where('tbl_product_item.category_id' , $cat_prod_id)
                            //  ->get();


                             ->join('tbl_category', 'tbl_product_item.category_id' , '=' , 'tbl_category.category_id' )
                             //->join('tbl_manufacture' , 'tbl_product_item.manufacture_id', '=' , 'tbl_manufacture.manufacture_id' )
                             //->WHERE('tbl_product_item.publication_status',1)
                             ->WHERE('tbl_category.category_id', $cat_prod_id)
                             ->WHERE('tbl_product_item.publication_status',1)
                             ->limit(10)
                             ->get();
     
                            return view('admin/product_by_category' , compact('viewproduct'));                 
    }        

    public function manuf_prod_id($manuf_prod_id){
        //return $manuf_prod_id;

        $viewproduct = DB::table('tbl_product_item')
                     -> join('tbl_category', 'tbl_product_item.category_id', '=' , 'tbl_category.category_id')
                     -> join('tbl_manufacture', 'tbl_product_item.manufacture_id', '=' , 'tbl_manufacture.manufacture_id')
                     -> where('tbl_product_item.manufacture_id' , $manuf_prod_id)
                     ->WHERE('tbl_product_item.publication_status',1)
                     ->get();

                     return view('admin/product_by_manufacture', compact('viewproduct'));
    }

    public function view_productdetail_byid($product_id){
                    //return $product_id;

        $productdetail = DB::table('tbl_product_item')
                        ->join('tbl_category' ,'tbl_product_item.category_id','=', 'tbl_category.category_id')
                        ->join('tbl_manufacture','tbl_product_item.manufacture_id','=', 'tbl_manufacture.manufacture_id')
                        -> where('tbl_product_item.product_id' , $product_id)                        
                        ->get();

                        return view('admin/view_productdetail_byid', compact('productdetail'));
    }
}
