<?php


namespace App;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Exception\NotReadableException;
use Intervention\Image\ImageManagerStatic;
use mysql_xdevapi\Exception;

class ImageService
{
    public static function store($file, $prefix)
    {

        $fileName = 'books/'.uniqid($prefix).'.jpg';
        try {
            $file = ImageManagerStatic::make($file)->stream('jpg', 40);
            Storage::disk('local')->put('public/'.$fileName, $file);
            Log::info('Image saved');
        } catch (NotReadableException $exception) {
            echo "Exception caught with message: " . $exception->getMessage() . "\n";
            $fileName = null;
            Log::info('Failed saving image');
        }

        return $fileName;
    }
}