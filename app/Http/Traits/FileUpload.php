<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;


trait FileUpload{

    public function fileUpload($request, $file_name, $folder, $format = ['jpg', 'png', 'gif', 'jpeg'], $size = 1024)
    {

        if ($request->hasFile($file_name)) {
            $file_ext = $request->file($file_name)->getClientOriginalExtension();
            
            if (!in_array($file_ext, $format)) {
                return redirect()->back()->with('error', 'File Formate Is Not Currect');
            }elseif($load_file){
                $file_path = $request->file($file_name)->store($folder,'public');
            }

            return $file_path;
        }
    }

    public function multipleFileUpload($request, $file_name, $folder, $format = ['jpg', 'png', 'gif', 'jpeg'], $size = 1024)
    {
        $file_path = [];
        if ($request->hasFile($file_name)) {
            foreach ($request->file($file_name) as $file) {
                $file_ext = $file->getClientOriginalExtension();
                if (!in_array($file_ext, $format)) {
                    return redirect()->back()->with('error', 'File Formate Is Not Currect');
                }else{
                    $file_path[] = $file->store($folder,'public');
                }
            }
            return $file_path;
        }
    }
}


// //fileUpload($request, 'image', ['docx, pdf'], 300, 'storage_path', '\/image/product/');


// //MULTIPAL FILE
// $multi_images = [];
// if( $request -> hasFile('multi_photo') ){
//     foreach( $request -> file('multi_photo') as $multi_img ){
//         $unique_multi_name = md5(time().rand()) .'.'. $multi_img -> getClientOriginalExtension();
//         $multi_img-> move(public_path('/frontend/assets/images/product/'),  $unique_multi_name);
//         array_push($multi_images,  $unique_multi_name);
//     }
// //UPDATE MULTIPAL FILE

// $multi_images = [];
// if( $request -> hasFile('multi_photo') ){
//     foreach( $request -> file('multi_photo') as $multi_img ){
//         $unique_multi_name = md5(time().rand()) .'.'. $multi_img -> getClientOriginalExtension();
//         foreach(  json_decode($data ->multi_photo) as $img ){
//             unlink(public_path('frontend/assets/images/product/' .   $img ));
//         } 
//         $multi_img-> move(public_path('/frontend/assets/images/product/'),  $unique_multi_name);
//         array_push($multi_images,  $unique_multi_name);
//         }
        