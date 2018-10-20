<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SellProduct;
use App\Models\User;
use Session;
use Auth;

class UserDashController extends Controller
{
    public function AllAvaibleProductForSelling(){
       
       $products = Product::orderBy('id','desc')->get();
       return view('userdashboard.allavlsellingpdts')->withProducts($products);

    }

    public function postAllSelectedProduct(Request $request){
        
        $array = $request->check_product;
        $products = Product::whereIn('id', array_flatten($array))->get();
         foreach($products as $product){
            $proidarray[] = $product->id;
        }

        Session::put('products', $products);
        Session::put('proidarray', $proidarray);

        return redirect()->route('sell.product');
    }

    public function getSellProduct(){

        $products = Session::get('products');
        $proidarray = Session::get('productidarray');
        return view('userdashboard.sellproduct')->withProducts($products)->withProductidarray($proidarray);
    }

    public function postSellProduct(Request $request){
           
    	 $this->validate($request,[
            'product_name'       => 'required',
            'product_price'        => 'required|regex:/^[0-9 _ ,]*$/',
            'product_commission'   => 'required',
            'bname'        => 'required',
            'bemail'       => '',
            'bphone'       => 'required',
            'baddress'       => 'required',
            'bdistrict'       => '',
            'delveryonday'       => 'required',
            'delverytime'       => '',
            'special_ins'       => '',
            'user_id'       => '',
            'product_id'       => ''
        ]);

        $rsp_product_id = str_replace(' ', '',$request->product_id);
        $product_id = explode(",",$rsp_product_id);

        $rsp_product_price = str_replace(' ', '',$request->product_price);
        $product_price = explode(",",$rsp_product_price);

        $rsp_product_commission = str_replace(' ', '',$request->product_commission);
        $product_commission = explode(",",$rsp_product_commission);

        $product_name = explode(",",$request->product_name);

        if(count($product_id) == count($product_price) && count($product_id) == count($product_commission) && count($product_id) == count($product_name)){
              
            
              /**********Reference Id *********/

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 10; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
               /**********Reference Id *********/
            
            for($i=0;$i<count($product_id);$i++){

                $product = new SellProduct;

                $product->product_name         = $product_name[$i];
                $product->product_price        = (int)$product_price[$i];
                $product->product_commission   = (float)$product_commission[$i];
                $product->bname                = $request->bname;
                $product->bemail               = $request->bemail;
                $product->bphone               = $request->bphone;
                $product->baddress             = $request->baddress;
                $product->bdistrict            = $request->bdistrict;
                $product->delveryonday         = $request->delveryonday;
                $product->delverytime          = $request->delverytime;
                $product->special_ins          = $request->special_ins;
                $product->ref_id               = $randomString;
                $product->user_id              = $request->user_id;
                $product->product_id           = (int)$product_id[$i];
                $product->save();
            }

            Session::flash('adsuccess','Product Delivered successfully. Once it will be approved, you will get your commission');
            return redirect()->back();

        }else{

            Session::flash('loginerror','Not Delivered !! Something Went Wrong!!');
            return redirect()->back();

        }        
    }
    
    public function getSoldProductByReference(){

       $id = Auth::user()->id;
       $products = SellProduct::select('ref_id','created_at')
                   ->where('user_id', '=', $id)
                   ->groupBy('ref_id','created_at')
                   ->orderBy('id','desc')
                   ->get();

       return view('userdashboard.soldproductbyreference')->withProducts($products);
    }

    public function getSoldProduct($ref_id){
        $id = Auth::user()->id;
    	$products = SellProduct::where('user_id','=',$id)->where('ref_id','=',$ref_id)->orderBy('id','desc')->get();
    	return view('userdashboard.soldproduct')->withProducts($products);
    }

    public function getUserProductRevenue(){

        $id = Auth::user()->id;
        $total=0;
        $paid=0;
        $rem=0;
     
        $products = SellProduct::where('user_id','=',$id)->where('is_approve','=','1')->orderBy('id','desc')->get();

        $usertillpays = SellProduct::where('user_id','=',$id)->where('is_approve','=','1')->where('is_paid','=','1')->orderBy('id','desc')->get();

        foreach ($products as $key => $product) {
           $total += (($product->product_price * $product->product_commission)/100);
        }
        
        foreach ($usertillpays as $key => $usertillpay) {
           $paid += (($usertillpay->product_price * $usertillpay->product_commission)/100);
        }
        
        $rem = $total-$paid;
        
        return view('userdashboard.ucommissiondetails')->withProducts($products)->withTotal($total)->withPaid($paid)->withRemaining($rem);
    }
}
