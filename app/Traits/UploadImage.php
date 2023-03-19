<?php



namespace App\Traits;

use Illuminate\Http\Request;

trait UploadImage{


    public function profileimage(Request $request,$folder)
    {
          $valid=  $request->validate([
            'image'=>'image'

        ]);
        $img=$valid['image'];
        $img_name=time().".".$img->getClientOriginalExtension();
        $path=$img->storeAS($folder, $img_name, 'public');
        return $path;
        
    }
    
}