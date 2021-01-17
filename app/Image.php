<?php

namespace App;

use ArrayObject;
use Illuminate\Database\Eloquent\Model;

class Image extends Model {
    protected static $imageDir = 'img\\';

    public static function saveImage($image, $code) {
        $fileName = $code."-main".'.'.$image->getClientOriginalExtension();
        $image->move(self::$imageDir, $fileName);
        return $fileName;
    }

    public static function deleteImage($image) {
        if ($image != 'no-image.jpg' && is_file(self::$imageDir.$image)) {
            unlink(self::$imageDir.$image);
        }
    }

}
