<?php


namespace App\Parser;


use App\Parson;

interface ParserInterface
{
    /**
     * @param $url
     * @param Parson $parson
     *
     * @return ParseObject
     */
    public function parse($url, Parson $parson);

    /**
     * @param $url
     * @param $data
     * @param Parson $parson
     *
     * @return ParseObject
     */
    public function parseSearchPage($url, $data, Parson $parson);
}
