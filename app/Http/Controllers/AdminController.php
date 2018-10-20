<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\SellProduct;
use Session;
use Auth;

class AdminController extends Controller
{
    
    public function getAdminDashboard(){

        $totalpaidaffiliate=0;
        $totalunpaidaffiliate=0;
        $approvedpaidprds = SellProduct::where('is_paid','=','1')->where('is_approve','=','1')->orderBy('id','desc')->get();
        foreach ($approvedpaidprds as $key => $product) {
           $totalpaidaffiliate += (($product->product_price * $product->product_commission)/100);
        }

        $approvedunpaidprds = SellProduct::where('is_paid','=','2')->where('is_approve','=','1')->orderBy('id','desc')->get();
        foreach ($approvedunpaidprds as $key => $product) {
           $totalunpaidaffiliate += (($product->product_price * $product->product_commission)/100);
        }
        
        $pendingproducts =  SellProduct::where('is_approve','=','2')->get();
        $completedproducts =  SellProduct::where('is_complete','=','1')->get();
        $sellingincome = SellProduct::where('is_approve','=','1')->orderBy('id','desc')->get();

        return view('myadmin.adminindex')->withSellingincome($sellingincome)->withPaidaffiliate($totalpaidaffiliate)->withUnpaidaffiliate($totalunpaidaffiliate)->withPendingproduct($pendingproducts)->withCompletedproduct($completedproducts);
    }

    public function getUserDashboard(){

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

        $pendingproducts =  SellProduct::where('user_id','=',$id)->where('is_approve','=','2')->get();
        $completedproducts =  SellProduct::where('user_id','=',$id)->where('is_complete','=','1')->get();

        return view('myadmin.userindex')->withProducts($products)->withTotal($total)->withPaid($paid)->withRemaining($rem)->withPendingproduct($pendingproducts)->withCompletedproduct($completedproducts);
    }

     public function getRegister(){
        return view('myadmin.adminuser.register');
    }
    public function postRegister(Request $request){
       $this->validate($request,[
             'name'    =>  'required',
             'email'   => 'required|email',
             'password' =>  'required|confirmed',
             'password_confirmation' => 'sometimes|required_with:password'
        ]);
        $users = new User();
        $users->name     = $request->name;
        $users->email     = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();
        Session::flash('loginsuccess','Registration Completed Successfully. Sign In Please.');
        return redirect()->back();
    }
    
    public function getLogin(){
        return view('myadmin.adminuser.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,[
             'email'   => 'required|email',
             'password' =>  'required'
        ]);
        
        $email     = $request->email;
        $password  = $request->password;
       
        if(Auth::attempt(['email'=>$email,'password'=>$password])){

            $user_role = Auth::user()->role;
            if($user_role==1){
              
              session(['role' => $user_role]);
              return redirect()->route('admin.index');

            }else{

              session(['role' => $user_role]);
              return redirect()->route('user.index');

            }
           
            
        }
        Session::flash('loginerror','Email Or Password Is Incorrect');
        return redirect()->back();
            
    }
    public function getLogOut(){
        Auth::logout();
        return redirect()->route('user.login');
    }

    public function getAdminProfile(){
         return view('myadmin.adminuser.adminprofile');
    }
    public function postChangeAdminEmail(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'newemail' => 'required|email'
        ]);
        
        $adminid = Auth::user()->id;
        $getadmin = User::find($adminid);
        if($getadmin->email != $request->email){
        Session::flash('profileerror','Ooops!! This Email Is Not Logged Email....');
            return redirect()->back();
        }else{
            $getadmin->email = $request->newemail;
            
        }
        $getadmin->save();
        Session::flash('adsuccess','Email Changed Successfully....');
        return redirect()->back();

    }
    public function postChangePassword(Request $request){
        $this->validate($request,[
            'oldpassword'       => 'required',
            'password'    => 'required|confirmed',
            'password_confirmation' => 'sometimes|required_with:password'
        ]);
        $ademail = Auth::user()->email;
        $adminid = Auth::user()->id;
        $getadmin = User::find($adminid);
        $password = $request->oldpassword;
        if(Auth::attempt(['email'=>$ademail,'password'=>$password])){
           
           $getadmin->password = bcrypt($request->password);
            
        }else{
           Session::flash('profileerror','Ooops!! Previous Password Is Not Correct..');
            return redirect()->back();
        }
        $getadmin->save();
        Session::flash('adsuccess','Password Changed Successfully....');
        Auth::logout();
        return redirect()->back();
    }
}
 