<?php


namespace App\Parser\v1;


use App\Imports\BooksImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelParser
{
    /**
     * @param $file
     * @return \Illuminate\Support\Collection
     */
    public static function parse($file)
    {
        $result = Excel::toCollection(new BooksImport, $file)->collapse();
        return $result;
    }
}
