<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class UploadService
{


  public function create($imageData,$path){

      $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
      Image::make($imageData)->save(public_path($path).$fileName);

  return $path.$fileName;
  }


}
