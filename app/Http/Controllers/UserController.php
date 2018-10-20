<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SellProduct;
use Session;
use Auth;

class UserController extends Controller
{
    public function getAllUsers(){
    	$users = User::where('role','=',2)->orderBy('id','desc')->get();
      if(Auth::user()->role==1){
    	return view('myadmin.users.alluser')->withUsers($users);
      }
    }



    public function destroy($id)
    {
        $user = User::find($id);
        $sellproduct = SellProduct::where('user_id','=',$id)->get();
        foreach ($sellproduct as $key => $value) {
          $value->delete();
        }
        $user->delete();
        return redirect()->back();
    }

    public function getUserCommissionDetails($id){
        
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
        if(Auth::user()->role==1){
        return view('myadmin.admindashboard.usercmsndetails')->withProducts($products)->withTotal($total)->withPaid($paid)->withRemaining($rem);
        }
    }

    public function getUserSubmissionPayment($id){

       $sellproduct = SellProduct::find($id);
       $sellproduct->is_paid = 1;
       $sellproduct->save();
       return redirect()->back();
    }

    public function getAddUser(){
      if(Auth::user()->role==1){
        return view('myadmin.users.adduser');
      }
    }
    public function postAddUser(Request $request){
        $this->validate($request,[
             'name'    =>  'required',
             'email'   => 'required|email',
             'phone'   => '',
             'password' =>  'required|confirmed',
             'password_confirmation' => 'sometimes|required_with:password'
        ]);
        $users = new User();
        $users->name     = $request->name;
        $users->email     = $request->email;
        $users->phone     = $request->phone;
        $users->password = bcrypt($request->password);
        $users->save();
        Session::flash('loginsuccess','User Added Successfully....');
        return redirect()->back();
    }
}
