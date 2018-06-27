<?php

namespace App\Services;

use Storage;
use Image;


class ImageResize {

  public function imageStore($argImg) {

    $imageName = $argImg['request']->store('', $argImg['disk1']);
    $argImg['request']->store('', $argImg['disk2']);
    // create instance
    $thumbnail = Image::make(Storage::disk($argImg['disk2'])->path($imageName))->resize($argImg['x'], $argImg['y'], function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    });           
  
    $thumbnail->save();

    return $imageName;
  }

  public function imageDelete($imageName) {
    if(Storage::disk('editeurs')->exists($imageName)) {
      Storage::disk('editeurs')->delete($imageName);
      Storage::disk('editeursThumbs')->delete($imageName);
      Storage::disk('editeursMini')->delete($imageName);
    }

    if(Storage::disk('articles')->exists($imageName)) {
      Storage::disk('articles')->delete($imageName);
      Storage::disk('articlesThumbs')->delete($imageName);
    }

    if(Storage::disk('carousel')->exists($imageName)) {
      Storage::disk('carousel')->delete($imageName);
    }

    if(Storage::disk('projets')->exists($imageName)) {
      Storage::disk('projets')->delete($imageName);
      Storage::disk('projetsThumbs')->delete($imageName);
    }
    
    if(Storage::disk('clients')->exists($imageName)) {
      Storage::disk('clients')->delete($imageName);
      Storage::disk('clientsMini')->delete($imageName);
    }
  }
};
