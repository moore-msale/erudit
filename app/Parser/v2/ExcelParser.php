<?php


namespace App\Parser\v2;


use App\Imports\BooksImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelParser
{

    /**
     * @param $url
     *
     * @return \Illuminate\Support\Collection
     */
    public function parse($url)
    {
        $result = Excel::toCollection(new BooksImport, $url)->collapse();

        return $result;
    }
}
