<?php


namespace App\Parser;


interface ParserInterface
{
    public function parse($url, $params, $index);

    public function parseSearchPage($url, $data, $params, $index);
}
