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
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home(){
      return view('home');
    }

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

          foreach($obj1 as $u){
            $count = DB::table('shops')
                ->where('prov_id', $u->PROVINCE_ID)
                ->count();
                $u->option = $count;
          }

          $obj2 = DB::table('province')
              ->where('GEO_ID', 3)
              ->get();
              foreach($obj2 as $u){
                $count = DB::table('shops')
                    ->where('prov_id', $u->PROVINCE_ID)
                    ->count();
                    $u->option = $count;
              }

              $obj3 = DB::table('province')
                  ->where('GEO_ID', 1)
                  ->get();
                  foreach($obj3 as $u){
                    $count = DB::table('shops')
                        ->where('prov_id', $u->PROVINCE_ID)
                        ->count();
                        $u->option = $count;
                  }

                  $obj4 = DB::table('province')
                      ->where('GEO_ID', 6)
                      ->get();
                      foreach($obj4 as $u){
                        $count = DB::table('shops')
                            ->where('prov_id', $u->PROVINCE_ID)
                            ->count();
                            $u->option = $count;
                      }

                      $obj5 = DB::table('province')
                          ->where('GEO_ID', 4)
                          ->get();
                          foreach($obj5 as $u){
                            $count = DB::table('shops')
                                ->where('prov_id', $u->PROVINCE_ID)
                                ->count();
                                $u->option = $count;
                          }

                          $obj6 = DB::table('province')
                              ->where('GEO_ID', 5)
                              ->get();
                              foreach($obj6 as $u){
                                $count = DB::table('shops')
                                    ->where('prov_id', $u->PROVINCE_ID)
                                    ->count();
                                    $u->option = $count;
                              }


      $data['objs1'] = $obj1;
      $data['objs2'] = $obj2;
      $data['objs3'] = $obj3;
      $data['objs4'] = $obj4;
      $data['objs5'] = $obj5;
      $data['objs6'] = $obj6;

        return view('welcome', $data);
    }




    public function add_my_contact(Request $request){


    $secret="6LdQnlkUAAAAADW2xY5YauDvYTlGfrzlg-X1la3k";
  //  $response = $request['captcha'];

    $captcha = "";
    if (isset($request["g-recaptcha-response"]))
      $captcha = $request["g-recaptcha-response"];

  //  $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
    $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);
    //$captcha_success=json_decode($verify);

  //  dd($captcha_success);

    if($response["success"] == false) {

      return response()->json([
        'data' => [
          'status' => 100,
          'msg' => 'This user was not verified by recaptcha.',
          'data' => "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response"
        ]
      ]);

    }else{

      $obj = DB::table('contacts')->insert(
           [
             'name' => $request['name'],
             'email' => $request['email'],
             'phone' => $request['phone'],
             'detail' => $request['msg'],
             'created_at' => new \DateTime()
           ]
         );


      $message = $request['name'].", ".$request['phone'].", ".$request['email'].", ข้อความ : ".$request['msg'];
      $lineapi = '2oow4KAmmpXYvIFQHatlVpPY3ziIXEXr2uGq2WPG77P';

      $mms =  trim($message);
      $chOne = curl_init();
      curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
      curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($chOne, CURLOPT_POST, 1);
      curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=$mms");
      curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
      $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'',);
      curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
      $result = curl_exec($chOne);
      if(curl_error($chOne)){
      echo 'error:' . curl_error($chOne);
      }else{
      $result_ = json_decode($result, true);
  //    echo "status : ".$result_['status'];
  //    echo "message : ". $result_['message'];
      }
      curl_close($chOne);


      return response()->json([
        'data' => [
          'status' => 200,
          'msg' => 'This user is verified by recaptcha.'
        ]
      ]);

    }



  }


}
