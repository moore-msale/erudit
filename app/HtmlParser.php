<?php


namespace App;


use Ammadeuss\LaravelHtmlDomParser\Facade as HtmlDomParser;
use Illuminate\Support\Facades\View;
use Intervention\Image\ImageManagerStatic;

class HtmlParser
{
    public static function searchParse($url, $data, $params = [])
    {
        $data = preg_replace(['/(\s+)/', '/[,\/]/'], ['%20', '%2C'], $data);
        $html = file_get_contents($url.$params['searchUrl'].'/'.$data.'/');
        if ($html == '') {
            return [];
        }
        $names = null;
        $urls = null;

        if ($params['name_search']) {
            if ($params['name_search_count'] !== null) {
                $names = HtmlDomParser::str_get_html($html)->find($params['name_search'])[0]->nodes[$params['name_search_count']];
            } else {
                $names = HtmlDomParser::str_get_html($html)->find($params['name_search']);
            }
        }
        if ($params['name_url']) {
            if ($params['name_url_count'] !== null) {
                $urls = HtmlDomParser::str_get_html($html)->find($params['name_url'])[0]->nodes[$params['name_url_count']];
            } else {
                $urls = HtmlDomParser::str_get_html($html)->find($params['name_url']);
            }
        }
        if ($params['author']) {
            if ($params['author_count'] !== null) {
                $authors = HtmlDomParser::str_get_html($html)->find($params['author'])[0]->nodes[$params['author_count']];
            } else {
                $authors = HtmlDomParser::str_get_html($html)->find($params['author']);
            }
        }

        $result = [];
        if ($names && $urls) {
            for ($i = 0; $i < count($names); $i++) {
                $result[] = [$names[$i]->plaintext, $urls[$i]->href, $authors[$i]->plaintext];
            }
        }

        return $result;
    }

    public static function parse($url, $params = [])
    {
        $html = file_get_contents($url);
        if ($html == '') {
            return [];
        }
        $name = null;
        $description = null;
        $image = null;
        $result = [];

        if ($params['name']) {
            if ($params['name_count'] !== null) {
                $name = HtmlDomParser::str_get_html($html)->find($params['name'])[0]->nodes[$params['name_count']]->plaintext;
            } else {
                $name = HtmlDomParser::str_get_html($html)->find($params['name'])[0]->plaintext;
            }
            $result[] = $name;
        }

        if ($params['description']) {
            if ($params['description_count']) {
                $description = HtmlDomParser::str_get_html($html)->find($params['description'])[0]->nodes[$params['description_count']]->plaintext;
            } else {
                $description = HtmlDomParser::str_get_html($html)->find($params['description'])[0]->plaintext;
            }
            $result[] = $description;
        }

        if ($params['image']) {
            $image = HtmlDomParser::str_get_html($html)->find($params['image'])[0]->src;
            $result[] = $image;
        }

        return $result;
    }
}