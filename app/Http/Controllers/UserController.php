<?php

namespace App\Http\Controllers;

use App\Mail\userCreate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(15);

        return view("pages.user-management",[
            'users'=>$users
        ]);
    }
    
    public function createUser(Request $request){
        try{
            DB::beginTransaction();
            $generate_password =  Str::random(10);
            $user = New User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->is_admin = $request->is_admin;
            $user->setPasswordAttribute($generate_password);
            $user->save();
            DB::commit();
            $data = [
                "name" => $user->first_name.' '.$user->last_name,
                "email" => $user->email,
                "password" => $generate_password
            ];
            Mail::to($user->email)->send(new userCreate($data));
            return back()->with('success', ("User $request->first_name created successfully"));
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', sprintf("User failed with message : %s (%s)", $ex->getMessage(), $ex->getCode()));
        }
    }

    public function updateUser(Request $request){
        try{
            DB::beginTransaction();

            $user = User::where('id',$request->id)->first();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->is_admin = $request->is_admin;
            $user->save();
            DB::commit();
            return back()->with('success', ("User $request->first_name updated successfully"));
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', sprintf("User failed with message : %s (%s)", $ex->getMessage(), $ex->getCode()));
        }
    }
    
    public function deleteUser(Request $request){
        try{
            DB::beginTransaction();
            $user = User::where('id',$request->id)->first();
            $user_name = $user->first_name.' '.$user->last_name;
            $user->delete();
            DB::commit();
            return back()->with('success', ("User $user_name deleted successfully"));
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', sprintf("User failed with message : %s (%s)", $ex->getMessage(), $ex->getCode()));
        }

    }
}
