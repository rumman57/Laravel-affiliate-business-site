<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SellProduct;
use Auth;

class AdminDashController extends Controller
{   
    public function getSellingRequests(){
       
        $products = SellProduct::orderBy('id','desc')->get();
        if(Auth::user()->role==1){
            return view('myadmin.admindashboard.allsellingrequest')->withProducts($products);
        }
    	
    }

    public function getSellingProductDetails($id){
    	$product = SellProduct::find($id);
        if(Auth::user()->role==1){
    	return view('myadmin.admindashboard.sellproductdetails')->withProduct($product);
       }
    }

    public function getSellingProductApproved($id){
    	$product = SellProduct::find($id);
    	$product->is_approve = 1;
        $product->save();
    	return redirect()->back();
    }

    public function getSellingProductRejected($id){
        $product = SellProduct::find($id);
        $product->is_approve =  3;
        $product->save();
        return redirect()->back();
    }

    public function getSellingProductCompleted($id){
    	$product = SellProduct::find($id);
    	$product->is_complete =  1;
        $product->save();
    	return redirect()->back();
    }

    public function getApprovedSellingRequests(){
         $products = SellProduct::where('is_approve','=',1)->orderBy('id','desc')->get();
         if(Auth::user()->role==1){
    	 return view('myadmin.admindashboard.approvedsellingrequest')->withProducts($products);
        }
    }

    public function getRejectedSellingRequests(){
         $products = SellProduct::where('is_approve','=',3)->orderBy('id','desc')->get();
         if(Auth::user()->role==1){
    	 return view('myadmin.admindashboard.rejectedsellingrequest')->withProducts($products);
        }
    }

    public function getTotalExpense(){
         
         $products = Product::orderBy('id','desc')->get();
         if(Auth::user()->role==1){
    	 return view('myadmin.admindashboard.totalexpense')->withProducts($products);
        }
    }
    public function getTotalSellingIncome(){

    	 $products = SellProduct::where('is_approve','=','1')->orderBy('id','desc')->get();
         if(Auth::user()->role==1){
    	 return view('myadmin.admindashboard.sellingincome')->withProducts($products);
        }
    }
    
}
