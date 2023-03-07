<?php



namespace App\Traits;

use Illuminate\Http\Request;

trait UploadImage{


    public function profileimage(Request $request,$folder)
    {

        $image = $request->profile_image->getClientOriginalName();
        $path = $request->profile_image->storeAS($folder, $image, 'public');
        return $path;
        
    }
    public function certimage(Request $request,$folder)
    {
        $certimage = $request->certificate_image->getClientOriginalName();
        $path = $request->certificate_image->storeAS($folder, $certimage, 'public');
        return $path;
    }
}