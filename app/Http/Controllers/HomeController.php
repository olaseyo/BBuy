<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\WishList;
use App\Product;
use App\PriceAlert;
use App\Subscribers;
use Sentinel;
use Illuminate\Support\Facades\Session;

class HomeController extends GlobalController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
       public $successStatus=200;
    public function __construct()
    {
        //$this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function Login(Request $request) {
        $validator=Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validator->fails()){
            // return redirect ('/')->with(json_encode(["error"=>$validator->errors()]));
            $errors=array();
            $coded=  json_encode(["error"=>$validator->errors()]);
            $decoded=json_decode($coded,true);

            if ($decoded['error']) {
             foreach ($decoded['error'] as $value){
                 $errors[]= $value[0];
             }
              return view('admin.signin',compact('errors'));
         }
         }
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
          Session::put('uid',Auth::user()->uid);
          Session::put('email',Auth::user()->email);
          Session::put('name',Auth::user()->name);
          Session::put('utype',Auth::user()->utype);
          if(Auth::user()->utype==2){
          //  return view('registeration',compact('errors'));
            return redirect('/mdashboard')->with('login_success','Welcome ');
          }else if(Auth::user()->utype==3){
              return redirect('/mdashboard')->with('login_success','Welcome ');
          }
            else{
             return redirect('/dashboard')->with('login_success','Welcome ');
          }

       }else{
            return redirect('/signin')->with('error', 'Username and password combo not match');
}
}


    public function merchantDashboard(){
    $wish_list=DB::table('wish_lists')->where('uid','=',Session('uid'))->count();
    $products=DB::table('products')->where('uid','=',Session('uid'))->count();
    $price_alert=DB::table('price_alerts')->where('uid','=',Session('uid'))->count();
    $views=DB::table('products')->where('uid','=',Session('uid'))->sum('total_views');
      //return  $products;
     return view('merchant.dashboard',compact('wish_list','products','price_alert','views'));
    }

    public function adminDashboard(){
      $wish_list=DB::table('wish_lists')->count();
      $products=DB::table('products')->count();
      $price_alert=DB::table('price_alerts')->count();
      $views=DB::table('products')->sum('total_views');
     return view('admin.dashboard',compact('wish_list','products','price_alert','views'));
    }

    public function mProfile(){
    $user=DB::table('users')->where('uid','=',Session('uid'))->get();
     return view('merchant.profile',compact('user'));
    }


    public function registerMerchant (Request $request)
    {
        $validator=Validator::make($request->all(), [
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'min:4|required_with:password_confirmation|same:password_confirmation'
        ]);

        if($validator->fails()){
            // return redirect ('/')->with(json_encode(["error"=>$validator->errors()]));
            $errors=array();
            $coded=  json_encode(["error"=>$validator->errors()]);
            $decoded=json_decode($coded,true);

            if ($decoded['error']) {
             foreach ($decoded['error'] as $value){
                 $errors[]= $value[0];
             }
              return view('admin.signup',compact('errors'));
         }
         }
        $input=$request->all();
        $input['password']=bcrypt($request->input('password'));
        $merchant =User::create($input);
        if($merchant){
               return redirect('/signup')->with('success', 'Account Created, You can now login');
           }else{
               return redirect('/signup')->with('error',"An error occured while processing your request");
           }
       }


       public function mUpdateUsers (Request $request)
       {
           $input=$request->all();
           $merchant =User::where('uid','=',Session('uid'))->update($input);
           if($merchant){
             $response['error']="FALSE";
             $response['success_message']="Profile updated successfully";
             return response()->json(['success'=>$response], $this->successStatus);
           }else{
             $response['error']="TRUE";
             $response['error_message']="An error occurred while updating profile!";
             return response()->json(['error'=>$response], $this->successStatus);
           }
          }


       public function editMerchant (Request $request)
       {
           $validator=Validator::make($request->all(), [
              'uid' => 'required|string',
               'name' => 'required|string',
               'phone_number' => 'required|string',
               'email' => 'required|email',
           ]);

           if($validator->fails()){
               // return redirect ('/')->with(json_encode(["error"=>$validator->errors()]));
               $errors=array();
               $coded=  json_encode(["error"=>$validator->errors()]);
               $decoded=json_decode($coded,true);

               if ($decoded['error']) {
                foreach ($decoded['error'] as $value){
                    $errors[]= $value[0];
                }
                 return view('edit',compact('errors'));
            }
            }
           $input=$request->all();

           $merchant =Merchant::where("uid",$request->uid)->update($input);
           if($merchant){
                  return redirect('/register')->with('success', 'Account Created, You can now login');
              }else{
                  return redirect('/register')->with('error',"An error occured while processing your request");
              }
          }


 public function redirect(){
   return view('pages.signin');
 }
 function subscribe(Request $request){
   //return $request;
   $validator = Validator::make($request->all(), [
   'email' => 'required|email|unique:subscribers',
]);
if($validator->fails()){
    return response()->json(["errors"=>$validator->errors()]);
    }

 $input=$request->all();
   $subscribe=Subscribers::create($input);
   if($subscribe){
    $response['error']="FALSE";
    $response['success_message']="Subscription successful";
    return response()->json(['success'=>$response], $this->successStatus);
  }else{
    $response['error']="TRUE";
    $response['error_message']="An error occurred while subscribing";
    return response()->json(['error'=>$response], $this->successStatus);
  }
 }

 function viewSubscribers(){
   $subscribe=Subscribers::paginate(100);
   return view('admin.subscribers',compact('subscribe'));
 }
 public function logOut(){
     Session::forget('uid');
     Session::forget('email');
    Session::forget('utype');
     return view('admin.signin');
 }
}
