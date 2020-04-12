<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\shop;
use App\folder_file;
use App\folder_image;
use App\folder;
use Auth;

class ApiController extends Controller
{
    //

    public function post_folder_image(Request $request){

      $gallary = $request->file('file');
      $this->validate($request, [
           'folder_name' => 'required'
       ]);

       $package = new folder();
       $package->folder_name = $request['folder_name'];
       $package->shop_id = $request['shop_id'];
       $package->user_id = Auth::user()->id;
       $package->save();

       if (is_array($gallary) && sizeof($gallary) > 0) {
        for ($i = 0; $i < sizeof($gallary); $i++) {
          $path = 'img/folder_image/';
          $filename = time().rand(100000,999999)."-.".$gallary[$i]->guessExtension();;
          $gallary[$i]->move($path, $filename);
          $admins[] = [
              'image' => $filename,
              'folder_id' => $package->id,
              'user_id' => Auth::user()->id,
              'created_at' => date('Y-m-d H:i:s')
          ];
        }
        folder_image::insert($admins);
      }

      return redirect(url('admin/edit_shop/'.$request['shop_id']))->with('add_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

    }

    public function add_all_image(Request $request){

      $gallary = $request->file('file');
      $this->validate($request, [
           'file' => 'required'
       ]);

       if (sizeof($gallary) > 0) {
        for ($i = 0; $i < sizeof($gallary); $i++) {
          $path = 'img/folder_image/';
          $filename = time().rand(100000,999999)."-.".$gallary[$i]->guessExtension();;
          $gallary[$i]->move($path, $filename);
          $admins[] = [
              'image' => $filename,
              'folder_id' => $request['folder_id'],
              'user_id' => Auth::user()->id,
              'created_at' => date('Y-m-d H:i:s')
          ];
        }
        folder_image::insert($admins);
      }

      return redirect(url('admin/folder/'.$request['folder_id']))->with('add_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

    }


    public function edit_folder_image(Request $request){

      $this->validate($request, [
           'folder_name' => 'required'
       ]);

            $package = folder::find($request['folder_id']);
           $package->folder_name = $request['folder_name'];
           $package->save();

           return redirect(url('admin/folder/'.$request['folder_id']))->with('edit_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

    }

    public function del_my_folder($folder = 0 , $shop =0){

      $objs = DB::table('folder_images')
          ->where('folder_id', $folder)
          ->get();

          if(isset($objs)){
            foreach($objs as $u){

              $file_path = 'img/folder_image/'.$u->image;
              unlink($file_path);

            }
          }

          DB::table('folder_images')
          ->where('folder_id', $folder)
          ->delete();

          DB::table('folders')
          ->where('id', $folder)
          ->delete();

          return redirect(url('admin/edit_shop/'.$shop))->with('del_success_folder_my','คุณทำการแก้ไขอสังหา สำเร็จ');

    }


    public function del_image_folder($id = 0 , $folder =0){

      $objs = DB::table('folder_images')
          ->where('id', $id)
          ->first();

          $file_path = 'img/folder_image/'.$objs->image;
          unlink($file_path);

          DB::table('folder_images')
          ->where('id', $id)
          ->delete();

          return redirect(url('admin/folder/'.$folder))->with('del_success_folder_image','คุณทำการแก้ไขอสังหา สำเร็จ');

    }


    public function del_file_doc($id = 0 , $shop =0){

      $objs = DB::table('folder_files')
          ->where('id', $id)
          ->first();

          $file_path = 'img/folder_file/'.$objs->image_file;
          unlink($file_path);

          DB::table('folder_files')
          ->where('id', $id)
          ->delete();

          return redirect(url('admin/edit_shop/'.$shop))->with('del_success_file','คุณทำการแก้ไขอสังหา สำเร็จ');

    }
    public function get_file_doc($id){

      $obj1 = DB::table('folder_files')
          ->where('id', $id)
          ->first();

          return response()->download(public_path('img/folder_file/'.$obj1->image_file));

    }




    public function post_file_download(Request $request){

        $gallary = $request->file('file');

        $this->validate($request, [
             'file_name' => 'required',
             'file' => 'required',
             'typefile' => 'required'
         ]);

         $path = 'img/folder_file/';
         $filename = time()."-".$gallary->getClientOriginalName();
         $gallary->move($path, $filename);

         $package = new folder_file();
         $package->file_name = $request['file_name'];
         $package->shop_id = $request['shop_id'];
         $package->type_file = $request['typefile'];
         $package->image_file = $filename;
         $package->user_id = Auth::user()->id;
         $package->save();

         return redirect(url('admin/edit_shop/'.$request['shop_id']))->with('add_success_file','คุณทำการแก้ไขอสังหา สำเร็จ');
    }

    public function edit_my_shop(Request $request){
        $image = $request->file('file');

        if($image == null){

          $package = shop::find($request['shop_id']);
          $package->shop_name = $request['shop_name'];
          $package->description = $request['description'];
          $package->user_id = Auth::user()->id;
          $package->save();

        }else{

          $objs = DB::table('shops')
              ->where('id', $request['shop_id'])
              ->first();

              $file_path = 'img/shop/'.$objs->shop_image;
              unlink($file_path);

          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(800, 800, function ($constraint) {
            $constraint->aspectRatio();
          })->save('img/shop/'.$input['imagename']);

          $package = shop::find($request['shop_id']);
          $package->shop_name = $request['shop_name'];
          $package->description = $request['description'];
          $package->shop_image = $input['imagename'];
          $package->user_id = Auth::user()->id;
          $package->save();

        }

        return response()->json([
                  'data' => [
                    'status' => 200,
                    'msg' => 'Add data success',
                    'data_id' => $request['shop_id'],
                  ]
                ]);

    }

    public function add_my_shop(Request $request){

      $image = $request->file('file');
      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->resize(800, 800, function ($constraint) {
        $constraint->aspectRatio();
      })->save('img/shop/'.$input['imagename']);

      $package = new shop();
      $package->shop_name = $request['shop_name'];
      $package->description = $request['description'];
      $package->prov_id = $request['prov_id'];
      $package->shop_image = $input['imagename'];
      $package->user_id = Auth::user()->id;
      $package->save();

      return response()->json([
                'data' => [
                  'status' => 200,
                  'msg' => 'Add data success',
                  'data_id' => $package->id,
                ]
              ]);

    }
}
