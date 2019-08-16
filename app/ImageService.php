<?php


namespace App;


use Intervention\Image\Exception\NotReadableException;
use Intervention\Image\ImageManagerStatic;
use mysql_xdevapi\Exception;

class ImageService
{
    public static function store($file, $prefix)
    {
        $fileName = 'books\\'.uniqid($prefix).'.jpg';

        try {
            ImageManagerStatic::make($file)->save(storage_path('app\\public\\'.$fileName));
        } catch (NotReadableException $exception) {
            echo "Exception caught with message: " . $exception->getMessage() . "\n";
        }

        return $fileName;
    }
}