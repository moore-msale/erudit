<?php


namespace App\Parser\v2;


use App\Imports\BooksImport;
use App\Parser\ParserInterface;
use Maatwebsite\Excel\Facades\Excel;

class ExcelParser implements ParserInterface
{
    public function parse($url, $params, $index)
    {
        $result = Excel::toCollection(new BooksImport, $url)->collapse();
        return $result;
    }

    public function parseSearchPage($url, $data, $params, $index)
    {
        // TODO: Implement parseSearchPage() method.
    }
}
