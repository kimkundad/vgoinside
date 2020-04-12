<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\shop;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function list_shop($id){

      $obj1 = DB::table('province')
          ->where('PROVINCE_ID', $id)
          ->first();

          $shop = DB::table('shops')
              ->where('prov_id', $id)
              ->paginate(18);

              $count = DB::table('shops')
                  ->where('prov_id', $id)
                  ->count();

          $data['count'] = $count;

          $data['objs'] = $obj1;
          $data['shop'] = $shop;
          $data['id'] = $id;

      return view('list_shop', $data);
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
          ->paginate(18);

          $obj1 = DB::table('province')
              ->where('PROVINCE_ID', $request['prov_id'])
              ->first();

              $count = DB::table('shops')
                  ->where('prov_id', $request['prov_id'])
                  ->count();

          $data['count'] = $count;
          $data['objs'] = $obj1;
          $data['shop'] = $shop;
          $data['id'] = $request['prov_id'];
          $data['search'] = $search;

          return view('search_shop', $data);

    }

    public function shop_detail($id){

      $package = shop::find($id);
      $package->view += 1;
      $package->save();

      $file = DB::table('folder_files')
          ->where('shop_id', $id)
          ->get();

      $obj1 = DB::table('shops')
          ->where('id', $id)
          ->first();


          $folder = DB::table('folders')
              ->where('shop_id', $id)
              ->get();

              if(isset($folder)){
                foreach($folder as $u){

                  $folder_image = DB::table('folder_images')
                      ->where('folder_id', $u->id)
                      ->first();

                  $u->option = $folder_image;

                }
              }

      $obj2 = DB::table('province')
          ->where('PROVINCE_ID', $obj1->prov_id)
          ->first();

          $count = DB::table('shops')
              ->where('prov_id', $obj1->prov_id)
              ->count();


          $data['objs'] = $obj1;
          $data['objs2'] = $obj2;
          $data['count'] = $count;
          $data['folder'] = $folder;
          $data['file'] = $file;


      return view('shop_detail', $data);
    }

    public function gallery_detail($id){

      $folder = DB::table('folders')
          ->where('id', $id)
          ->first();

        //  dd($folder);

          $objs = DB::table('shops')
              ->where('id', $folder->shop_id)
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
                  ->get();


                  $obj2 = DB::table('province')
                      ->where('PROVINCE_ID', $objs->prov_id)
                      ->first();

                      $count = DB::table('shops')
                          ->where('id', $folder->shop_id)
                          ->count();


          $data['objs'] = $objs;
          $data['objs2'] = $obj2;
          $data['count'] = $count;
          $data['folder'] = $folder;
          $data['file'] = $folder_image;


      return view('gallery_detail', $data);
    }

    public function index()
    {

      $obj1 = DB::table('province')
          ->where('GEO_ID', 2)
          ->get();

          $obj2 = DB::table('province')
              ->where('GEO_ID', 3)
              ->get();

              $obj3 = DB::table('province')
                  ->where('GEO_ID', 1)
                  ->get();

                  $obj4 = DB::table('province')
                      ->where('GEO_ID', 6)
                      ->get();

                      $obj5 = DB::table('province')
                          ->where('GEO_ID', 4)
                          ->get();

                          $obj6 = DB::table('province')
                              ->where('GEO_ID', 5)
                              ->get();



      $data['objs1'] = $obj1;
      $data['objs2'] = $obj2;
      $data['objs3'] = $obj3;
      $data['objs4'] = $obj4;
      $data['objs5'] = $obj5;
      $data['objs6'] = $obj6;

        return view('welcome', $data);
    }
}
