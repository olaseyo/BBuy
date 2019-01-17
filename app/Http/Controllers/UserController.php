<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //


        public function addUser(Request $request)
        {
            $validator=Validator::make($request->all(), [
                'name' => 'required|string',
                'phone_number' => 'required|string',
                'email' => 'required|email',
                'password' => 'min:4|required_with:password_confirmation|same:password_confirmation'
            ]);
            if($validator->fails()){
  							return response()->json(["errors"=>$validator->errors()]);
  							}
                $input=$request->all();
                    if(!isset($input['uid'])){
                    $validator=Validator::make($request->all(), [
                        'phone_number' => 'required|string|unique:users',
                        'email' => 'required|email|unique:users',
                    ]);
                    if($validator->fails()){
          							return response()->json(["errors"=>$validator->errors()]);
          							}
                      }

            $input['password']=bcrypt($request->input('password'));
            unset($input['password_confirmation']);
            $merchant =User::updateOrCreate(array('uid'=>$request->uid),$input);
            if($merchant && !isset($input['uid'])){
     				$response['error']="FALSE";
     				$response['success_message']="User created successfully";
     				$response['data']=$merchant;
     				return response()->json(['success'=>$response],200);
     			}  else if($merchant && isset($input['uid'])){
     				$response['error']="FALSE";
     				$response['success_message']="User updated successfully";
     				$response['data']=$merchant;
     				return response()->json(['success'=>$response],200);
     			}else{
     				$response['error']="TRUE";
     				$response['error_message']="An error occurred while creating user";
     				return response()->json(['error'=>$response], $this->successStatus);
     			}
           }

           function getUser(){
             $utype=array("1"=>"Admin","2"=>"Merchant","3"=>"User");
           $user=	DB::table('users')->paginate();
            return view('admin.view_user',compact('user','utype'));
           }


           function editUser($uid){
           $user=	DB::table('users')
           ->where('uid','=',$uid)
           ->get();
            $utype=array("1"=>"Admin","2"=>"Merchant","3"=>"User");
            return view('admin.edit_user',compact('user','utype'));
           }

           public function DeleteUser(Request $request){
             //return $request;
               $user=User::where("uid",$request->id)->delete($request->id);
               if($user){
                 $response['error']="FALSE";
                 $response['success_message']="User deleted successfully";
                 return response()->json(['success'=>$response],200);
               }else{
                 $response['error']="TRUE";
                 $response['error_message']="An error occurred while deleting user!";
                 return response()->json(['error'=>$response], 200);
               }
           }

}
