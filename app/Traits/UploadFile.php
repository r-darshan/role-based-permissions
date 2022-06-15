<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    public function upload($file, $fileName)
    {
        $destinationPath = public_path().'/images';
        if (! is_dir($destinationPath)) {
            // dd($destinationPath);
            mkdir($destinationPath);
        }
        
        $file->move($destinationPath,$fileName);

        // Storage::disk('public')->putFileAs(
        //     'products/',$fileName,
        //     $file,
        //     $fileName
        // );
        return 'images/'.$fileName;
    }
}
