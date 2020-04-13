<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;

class studentController extends Controller
{
    //

    public function user(){

      $user = User::paginate(20);

          $data['objs'] = $user;

      return view('admin.user', $data);

    }

    public function edit_my_user(Request $request){

      $this->validate($request, [
           'name' => 'required',
           'email' => 'required',
       ]);

      $user_id =  $request['user_id'];
      $name =  $request['name'];
      $email =  $request['email'];
      $status =  $request['status'];

      $check = DB::table('users')
          ->where('id', $user_id)
          ->first();

      if($check->name == $name && $check->email == $email){

        $package = User::find($user_id);
        $package->phone = $request['phone'];
        $package->address = $request['address'];
        $package->save();

        DB::table('role_user')
              ->where('user_id', $user_id)
              ->update(['role_id' => $status]);


              return response()->json([
                        'data' => [
                          'status' => 200,
                          'msg' => 'Add data success',
                          'data_id' => $user_id,
                        ]
                      ]);

      }elseif($check->name != $name && $check->email == $email){

        $check2 = DB::table('users')
            ->where('name', $name)
            ->count();
            ////////////////////////////////
            if($check2 == 0){

              $package = User::find($user_id);
              $package->name = $name;
              $package->phone = $request['phone'];
              $package->address = $request['address'];
              $package->save();

              return response()->json([
                        'data' => [
                          'status' => 200,
                          'msg' => 'Add data success',
                          'data_id' => $user_id,
                        ]
                      ]);

            }else{

              return response()->json([
                        'data' => [
                          'status' => 100,
                          'msg' => 'Add data success',
                          'data_id' => $user_id,
                        ]
                      ]);

            }
            /////////////////////////////////

      }elseif($check->name == $name && $check->email != $email){

        $check3 = DB::table('users')
            ->where('email', $email)
            ->count();
            ////////////////////////////////
            if($check3 == 0){

              $package = User::find($user_id);
              $package->email = $email;
              $package->phone = $request['phone'];
              $package->address = $request['address'];
              $package->save();

              return response()->json([
                        'data' => [
                          'status' => 200,
                          'msg' => 'Add data success',
                          'data_id' => $user_id,
                        ]
                      ]);

            }else{

              return response()->json([
                        'data' => [
                          'status' => 100,
                          'msg' => 'Add data success',
                          'data_id' => $user_id,
                        ]
                      ]);

            }
            /////////////////////////////////

      }else{

        $check4 = DB::table('users')
            ->where('email', $email)
            ->where('name', $name)
            ->count();

            if($check4 == 0){

              $package = User::find($user_id);
              $package->name = $name;
              $package->email = $email;
              $package->phone = $request['phone'];
              $package->address = $request['address'];
              $package->save();

              return response()->json([
                        'data' => [
                          'status' => 200,
                          'msg' => 'Add data success',
                          'data_id' => $user_id,
                        ]
                      ]);

            }else{

              return response()->json([
                        'data' => [
                          'status' => 100,
                          'msg' => 'Add data success',
                          'data_id' => $user_id,
                        ]
                      ]);

            }

      }





    }

    public function user_edit($id){

      $objs = DB::table('users')
          ->where('id', $id)
          ->first();

          $role = DB::table('role_user')
              ->where('user_id', $id)
              ->first();


          $data['objs'] = $objs;
          $data['role'] = $role;

          return view('admin.user_edit', $data);

    }

}
