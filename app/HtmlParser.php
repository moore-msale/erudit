<?php


namespace App;


use Ammadeuss\LaravelHtmlDomParser\Facade as HtmlDomParser;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Intervention\Image\ImageManagerStatic;

class HtmlParser
{
    public static function searchParse($url, $data, $params, $index)
    {
//        Log::info('Searching for book ... ' . $index);
//        $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
//        $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
//        $data = preg_replace($replacements, $entities, $data);
        $data = rawurlencode($data);
        try {
            $html = file_get_contents($url.$params['searchUrl'].$data);
        } catch (\ErrorException $e) {
            return [];
        }
        $html = HtmlDomParser::str_get_html($html);
        if ($html == '') {
            Log::info('Failed url ... ' . $index);
            return [];
        }
        Log::info('Found url ... ' . $index);
        $names = null;
        $urls = null;
        $authors = null;
        $images = null;

        if ($params['name_search']) {
            if ($params['name_search_count'] !== null) {
                Log::info('Searching for book name ... ' . $index);
                $names = $html->find($params['name_search'])[0]->nodes[$params['name_search_count']];
                Log::info('Found book name ... ' . $index);
            } else {
                Log::info('Searching for book name ... ' . $index);
                $names = $html->find($params['name_search']);
                Log::info('Found book name ... ' . $index);
            }
        }
        if ($params['name_url']) {
            if ($params['name_url_count'] !== null) {
                Log::info('Searching for book url ... ' . $index);
                $urls = $html->find($params['name_url'])[0]->nodes[$params['name_url_count']];
                Log::info('Found book url ... ' . $index);
            } else {
                Log::info('Searching for book url ... ' . $index);
                $urls = $html->find($params['name_url']);
                Log::info('Found book url ... ' . $index);
            }
        }
        if ($params['author']) {
            if ($params['author_count'] !== null) {
                Log::info('Searching for book author ... ' . $index);
                $authors = $html->find($params['author'])[0]->nodes[$params['author_count']];
                Log::info('Found book author ... ' . $index);
            } else {
                Log::info('Searching for book author ... ' . $index);
                $authors = $html->find($params['author']);
                Log::info('Found book author ... ' . $index);
            }
        }

        if ($params['search_image']) {
            Log::info('Searching for book image... ' . $index);
            $images = $html->find($params['search_image']);
            Log::info('Found book image ... ' . $index);
        }
        $result = [];
        if ($names && $urls) {
            for ($i = 0; $i < count($names); $i++) {
                $result[] = [$names[$i]->plaintext, $urls[$i]->href, isset($images[$i]->attr['data-src']) ? $images[$i]->attr['data-src'] : $images[$i]->attr['src']];
            }
        }

        return $result;
    }

    public static function parse($url, $params, $index)
    {
        Log::info('Searching for book in his page ... ' . $index);

        $html = file_get_contents($url);
        $html = HtmlDomParser::str_get_html($html);
        if ($html == '') {
            Log::info('Failed url in his page ... ' . $index);
            return [];
        }
        Log::info('Found url in his page ... ' . $index);
        $name = null;
        $description = null;
        $image = null;
        $result = [];

        if ($params['name']) {
            $name = $html->find($params['name']);
            if (count($name)) {
                if ($params['name_count'] !== null) {
                    Log::info('Searching for book name in his page ... ' . $index);
                    $name = $name[0]->nodes[$params['name_count']]->plaintext;
                    Log::info('Found book name in his page ... ' . $index);
                } else {
                    Log::info('Searching for book name in his page ... ' . $index);
                    $name = $name[0]->plaintext;
                    Log::info('Found book name in his page ... ' . $index);
                }
            } else {
                Log::info('Not found book name in his page ... ' . $index);
                $name = null;
            }
            $result[] = $name;
        }

        if ($params['description']) {
            $description = $html->find($params['description']);
            if (count($description)) {
                if ($params['description_count']) {
                    Log::info('Searching for book description in his page ... ' . $index);
                    $description = $description[0]->nodes[$params['description_count']]->plaintext;
                    Log::info('Found book description in his page ... ' . $index);
                } else {
                    Log::info('Searching for book description in his page ... ' . $index);
                    $description = $description[0]->plaintext;
                    Log::info('Found book description in his page ... ' . $index);
                }
            } else {
                Log::info('Not found book description in his page ... ' . $index);
                $description = null;
            }
            $result[] = $description;
        }

        if ($params['image']) {
            Log::info('Searching for book image in his page ... ' . $index);
            $image = $html->find($params['image']);
            if (count($image)) {
                $image = isset($image[0]->attr['data-src']) ? $image[0]->attr['data-src'] : $image[0]->attr['src'];
                Log::info('Found book image in his page ... ' . $index);
            } else {
                $image = null;
            }
            $result[] = $image;
        }

        return $result;
    }
}
