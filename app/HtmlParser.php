<?php


namespace App;


use Ammadeuss\LaravelHtmlDomParser\Facade as HtmlDomParser;
use Illuminate\Support\Facades\View;
use Intervention\Image\ImageManagerStatic;

class HtmlParser
{
    public static function parse($url, $params = [])
    {
        $html = file_get_contents('https://www.labirint.ru/search/история%20флагов%20для%20детей/');

        $name = HtmlDomParser::str_get_html($html)->find('div#rubric-tab > span.product-title')[0]->plaintext;

        dd($name);

        $name = null;
        $description = null;
        $image = null;

        if ($params['name']) {
            if ($params['name_count'] !== null) {
                $name = HtmlDomParser::str_get_html($html)->find($params['name'])[0]->nodes[$params['name_count']]->plaintext;
            } else {
                $name = HtmlDomParser::str_get_html($html)->find($params['name'])[0]->plaintext;
            }
        }

        if ($params['description']) {
            if ($params['description_count']) {
                $description = HtmlDomParser::str_get_html($html)->find($params['description'])[0]->nodes[$params['description_count']]->plaintext;
            } else {
                $description = HtmlDomParser::str_get_html($html)->find($params['description'])[0]->plaintext;
            }
        }

        if ($params['image']) {
            $image = HtmlDomParser::str_get_html($html)->find($params['image'])[0]->src;

            $fileName = uniqid('product_').'.jpg';
            ImageManagerStatic::make(file_get_contents($image))
                ->save(public_path('img/'.$fileName), 40);
        }

        if ($name) {
            $book = new Book();
            $book->name = $name;
            $book->description = $description;
            $book->image = $fileName;
            $book->save();
        }

        return $book ? $book : null;

    }
}