<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use App\brand;
use App\Role;

class studentController extends Controller
{
    //

    public function user(){

      $user = User::where('brand_id', Auth::user()->brand_id)->paginate(20);

          $data['objs'] = $user;

      return view('admin.user', $data);

    }


    public function user_admin(){

    $user = User::leftJoin('brands', function($join) {
      $join->on('users.brand_id', '=', 'brands.id');
    })
    ->paginate(15);

    //dd($user);

          $data['objs'] = $user;

      return view('admin.user_admin', $data);

    }


    public function del_user($id){

      DB::table('users')
      ->where('id', $id)
      ->delete();

      return redirect(url('admin/user'))->with('del_user','คุณทำการแก้ไขอสังหา สำเร็จ');

    }

    public function add_new_user(){

      $user = brand::all();
      $data['objs'] = $user;
      return view('admin.add_new_user', $data);
    }

    public function post_new_user(Request $request){

      $name =  $request['name'];
      $email =  $request['email'];
      $password =  $request['password'];
      $position =  $request['position'];
      $brand =  $request['brand'];

      if($brand == null){
        $brand = Auth::user()->brand_id;
      }else{

      }

      $user_password = bcrypt($password);

      $check = DB::table('users')
          ->where('email', $email)
          ->count();

      if($check == 0){



      $ran = array("1483537975.png","1483556517.png","1483556686.png");
      $randomSixDigitInt = 'GW-'.(\random_int(1000, 9999)).'-'.(\random_int(1000, 9999)).'-'.(\random_int(1000, 9999));
      $user = User::create([
      'name' => $name,
      'email' => $email,
      'password' => Hash::make($password),
      'is_admin' => false,
      'provider' => 'email',
      'brand_id' => $brand,
      'avatar' => $ran[array_rand($ran, 1)],
      'code_user' => $randomSixDigitInt,
      ]);

      $user
      ->roles()
      ->attach(Role::where('name', $position)->first());

      return response()->json([
                'data' => [
                  'status' => 200,
                  'msg' => 'Add data success',
                ]
              ]);

            }else{

              return response()->json([
                        'data' => [
                          'status' => 100,
                          'msg' => 'Add data success',
                        ]
                      ]);

            }

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
          ->where('brand_id', Auth::user()->brand_id)
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
          ->where('brand_id', Auth::user()->brand_id)
          ->first();

          $role = DB::table('role_user')
              ->where('user_id', $id)
              ->first();


          $data['objs'] = $objs;
          $data['role'] = $role;

          return view('admin.user_edit', $data);

    }

}
