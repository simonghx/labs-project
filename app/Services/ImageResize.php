<?php

namespace App\Services;

use Storage;
use Image;


class ImageResize {

  public function imageStore($image) {

    $imageName = $image->store('','editeurs');
    $image->store('','editeursThumbs');
    // create instance
    $thumbnail = Image::make(Storage::disk('editeursThumbs')->path($imageName))->resize(360, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    });           
  
    //$path = Storage::disk('thumbnails')->getAdapter()->getPathPrefix();
  
    $thumbnail->save();

    return $imageName;
  }

  public function imageDelete($imageName) {
    storage::disk('editeurs')->delete($imageName);
    storage::disk('editeursThumbs')->delete($imageName);
  }
};
