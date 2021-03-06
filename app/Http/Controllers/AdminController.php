<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\shop;
use Auth;

class AdminController extends Controller
{
    //

    public function list_shop($id){

      $obj1 = DB::table('province')
          ->where('PROVINCE_ID', $id)
          ->first();

          $shop = DB::table('shops')
              ->where('prov_id', $id)
              ->where('brand_id', Auth::user()->brand_id)
              ->paginate(18);

              $count = DB::table('shops')
                  ->where('prov_id', $id)
                  ->where('brand_id', Auth::user()->brand_id)
                  ->count();

          $data['count'] = $count;
          $data['objs'] = $obj1;
          $data['shop'] = $shop;
          $data['id'] = $id;

      return view('admin.list_shop', $data);
    }

    public function search_shop(Request $request){

      $this->validate($request, [
        'search' => 'required',
        'prov_id' => 'required'
      ]);
      $search = $request->get('search');

      $shop = DB::table('shops')
          ->where('prov_id', $request['prov_id'])
          ->where('shop_name', 'like', "%$search%")
          ->where('brand_id', Auth::user()->brand_id)
          ->paginate(18);

          $obj1 = DB::table('province')
              ->where('PROVINCE_ID', $request['prov_id'])
              ->first();

              $count = DB::table('shops')
                  ->where('prov_id', $request['prov_id'])
                  ->where('brand_id', Auth::user()->brand_id)
                  ->count();

          $data['count'] = $count;
          $data['objs'] = $obj1;
          $data['shop'] = $shop;
          $data['id'] = $request['prov_id'];
          $data['search'] = $search;

          return view('admin.search_shop', $data);

    }

    public function create_shop($id){

      $obj1 = DB::table('province')
          ->where('PROVINCE_ID', $id)
          ->first();

          $data['count'] = 1;
          $data['objs'] = $obj1;

      return view('admin.create_shop', $data);
    }

    public function folder($id){

      $folder = DB::table('folders')
          ->where('id', $id)
          ->where('brand_id', Auth::user()->brand_id)
          ->first();

        //  dd($folder);

          $objs = DB::table('shops')
              ->where('id', $folder->shop_id)
              ->where('brand_id', Auth::user()->brand_id)
              ->first();


              $folder_image = DB::table('folder_images')
              ->select(
                      'folder_images.*',
                      'folder_images.id as id_q',
                      'folder_images.created_at as create',
                      'users.*'
                      )
                  ->leftjoin('users', 'users.id',  'folder_images.user_id')
                  ->where('folder_images.folder_id', $folder->id)
                  ->where('folder_images.brand_id', Auth::user()->brand_id)
                  ->get();


                  $obj2 = DB::table('province')
                      ->where('PROVINCE_ID', $objs->prov_id)
                      ->first();

                      $count = DB::table('shops')
                          ->where('id', $folder->shop_id)
                          ->where('brand_id', Auth::user()->brand_id)
                          ->count();


          $data['objs'] = $objs;
          $data['objs2'] = $obj2;
          $data['count'] = $count;
          $data['folder'] = $folder;
          $data['file'] = $folder_image;
          return view('admin.folder', $data);
    }

    public function edit_shop($id){

      //dd(Auth::user()->hasRole('employee'));

      $file = DB::table('folder_files')
          ->where('shop_id', $id)
          ->where('brand_id', Auth::user()->brand_id)
          ->get();

      $obj1 = DB::table('shops')
          ->where('id', $id)
          ->where('brand_id', Auth::user()->brand_id)
          ->first();


          $folder = DB::table('folders')
              ->where('shop_id', $id)
              ->where('brand_id', Auth::user()->brand_id)
              ->get();

              if(isset($folder)){
                foreach($folder as $u){

                  $folder_image = DB::table('folder_images')
                      ->where('folder_id', $u->id)
                      ->where('brand_id', Auth::user()->brand_id)
                      ->first();

                  $u->option = $folder_image;

                }
              }

      $obj2 = DB::table('province')
          ->where('PROVINCE_ID', $obj1->prov_id)
          ->first();

          $count = DB::table('shops')
              ->where('prov_id', $obj1->prov_id)
              ->where('brand_id', Auth::user()->brand_id)
              ->count();


          $data['objs'] = $obj1;
          $data['objs2'] = $obj2;
          $data['count'] = $count;
          $data['folder'] = $folder;
          $data['file'] = $file;

          //dd($folder);

          return view('admin.edit_shop', $data);

    }

    public function shop_detail($id){
      return view('admin.shop_detail');
    }

    public function gallery_detail($id){
      return view('admin.gallery_detail');
    }

    public function index()
    {

      $obj1 = DB::table('province')
          ->where('GEO_ID', 2)
          ->get();

          foreach($obj1 as $u){
            $count = DB::table('shops')
                ->where('prov_id', $u->PROVINCE_ID)
                ->where('brand_id', Auth::user()->brand_id)
                ->count();
                $u->option = $count;
          }

          $obj2 = DB::table('province')
              ->where('GEO_ID', 3)
              ->get();

              foreach($obj2 as $u){
                $count = DB::table('shops')
                    ->where('prov_id', $u->PROVINCE_ID)
                    ->where('brand_id', Auth::user()->brand_id)
                    ->count();
                    $u->option = $count;
              }

              $obj3 = DB::table('province')
                  ->where('GEO_ID', 1)
                  ->get();

                  foreach($obj3 as $u){
                    $count = DB::table('shops')
                        ->where('prov_id', $u->PROVINCE_ID)
                        ->where('brand_id', Auth::user()->brand_id)
                        ->count();
                        $u->option = $count;
                  }

                  $obj4 = DB::table('province')
                      ->where('GEO_ID', 6)
                      ->get();

                      foreach($obj4 as $u){
                        $count = DB::table('shops')
                            ->where('prov_id', $u->PROVINCE_ID)
                            ->where('brand_id', Auth::user()->brand_id)
                            ->count();
                            $u->option = $count;
                      }

                      $obj5 = DB::table('province')
                          ->where('GEO_ID', 4)
                          ->get();

                          foreach($obj5 as $u){
                            $count = DB::table('shops')
                                ->where('prov_id', $u->PROVINCE_ID)
                                ->where('brand_id', Auth::user()->brand_id)
                                ->count();
                                $u->option = $count;
                          }

                          $obj6 = DB::table('province')
                              ->where('GEO_ID', 5)
                              ->get();

                              foreach($obj6 as $u){
                                $count = DB::table('shops')
                                    ->where('prov_id', $u->PROVINCE_ID)
                                    ->where('brand_id', Auth::user()->brand_id)
                                    ->count();
                                    $u->option = $count;
                              }



      $data['objs1'] = $obj1;
      $data['objs2'] = $obj2;
      $data['objs3'] = $obj3;
      $data['objs4'] = $obj4;
      $data['objs5'] = $obj5;
      $data['objs6'] = $obj6;

        return view('admin.welcome', $data);
    }
}
