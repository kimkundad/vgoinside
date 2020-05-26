<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    //
    public function index(){

      $objs = brand::all();
      $data['objs'] = $objs;
      return view('admin.brand', $data);
    }

    public function create_brand(){
      return view('admin.create_brand');
    }

    public function edit_brand($id){
      $objs = brand::find($id);
      $data['objs'] = $objs;
      return view('admin.edit_brand', $data);
    }

    public function del_my_brand($id){

      DB::table('brands')
      ->where('id', $id)
      ->delete();

      return redirect(url('admin/brand'))->with('del_success','คุณทำการแก้ไขอสังหา สำเร็จ');
    }

    public function edit_my_brand(Request $request){

      $image = $request->file('file');

      if($image == null){

        $package = brand::find($request['b_id']);
        $package->bname = $request['bname'];
        $package->save();

      }else{

        $objs = DB::table('brands')
            ->where('id', $request['b_id'])
            ->first();

            $file_path = 'img/brand/'.$objs->bimage;
            unlink($file_path);

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
          $img = Image::make($image->getRealPath());
          $img->resize(800, 800, function ($constraint) {
          $constraint->aspectRatio();
        })->save('img/brand/'.$input['imagename']);

        $package = brand::find($request['b_id']);
        $package->bname = $request['bname'];
        $package->bimage = $input['imagename'];
        $package->save();

      }

      return response()->json([
                'data' => [
                  'status' => 200,
                  'msg' => 'Add data success',
                  'data_id' => $request['b_id'],
                ]
              ]);

    }

    public function add_my_brand(Request $request){

      $image = $request->file('file');
      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->resize(800, 800, function ($constraint) {
        $constraint->aspectRatio();
      })->save('img/brand/'.$input['imagename']);

      $package = new brand();
      $package->bname = $request['bname'];
      $package->bimage = $input['imagename'];
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
