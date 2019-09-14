<?php


namespace App\Parser\v2;


use Ammadeuss\LaravelHtmlDomParser\Facade as HtmlDomParser;
use App\Parser\ParseObject;
use App\Parser\ParserInterface;
use Illuminate\Support\Facades\Log;

class HtmlParser implements ParserInterface
{

    public function parse($url, $params, $index)
    {
        Log::info('Searching for book in his page ... ' . $index);

        try {
            $html = file_get_contents($url);
        } catch (\ErrorException $e) {
            Log::info('Failed url in his page ... ' . $index);
            return null;
        }
        try {
            $html = HtmlDomParser::str_get_html($html);
        } catch (\ErrorException $exception) {
            Log::info('Failed url in his page ... ' . $index);
            return null;
        }

        if ($html == '') {
            Log::info('Failed url in his page ... ' . $index);
            return null;
        }

        Log::info('Found url in his page ... ' . $index);
        $parserObject = new ParseObject();

        if ($params['name']) {
            $name = $html->find($params['name']);
            if (count($name)) {
                if ($params['name_count'] !== null) {
                    Log::info('Searching for book name in his page ... ' . $index);
                    $parserObject->setTitle($name[0]->nodes[$params['name_count']]->plaintext);
                    Log::info('Found book name in his page ... ' . $index);
                } else {
                    Log::info('Searching for book name in his page ... ' . $index);
                    $parserObject->setTitle($name[0]->plaintext);
                    Log::info('Found book name in his page ... ' . $index);
                }
            } else {
                Log::info('Not found book name in his page ... ' . $index);
                $parserObject->setTitle(null);
            }
        }

        if ($params['description']) {
            $description = $html->find($params['description']);
            if (count($description)) {
                if ($params['description_count']) {
                    Log::info('Searching for book description in his page ... ' . $index);
                    $parserObject->setDescription($description[0]->nodes[$params['description_count']]->plaintext);
                    Log::info('Found book description in his page ... ' . $index);
                } else {
                    Log::info('Searching for book description in his page ... ' . $index);
                    $parserObject->setDescription($description[0]->plaintext);
                    Log::info('Found book description in his page ... ' . $index);
                }
            } else {
                Log::info('Not found book description in his page ... ' . $index);
                $parserObject->setDescription(null);
            }
        }

        if ($params['image']) {
            Log::info('Searching for book image in his page ... ' . $index);
            $image = $html->find($params['image']);
            if (count($image)) {
                $parserObject->setImage(isset($image[0]->attr['data-src']) ? $image[0]->attr['data-src'] : $image[0]->attr['src']);
                Log::info('Found book image in his page ... ' . $index);
            } else {
                $parserObject->setImage(null);
            }
        }

        if ($params['isbn']) {
            Log::info('Searching for book image in his page ... ' . $index);
            $isbn = $html->find($params['isbn']);
            if (count($isbn)) {
                if ($params['description_count']) {
                    Log::info('Searching for book description in his page ... ' . $index);
                    $parserObject->setIsbn($isbn[0]->nodes[$params['description_count']]->plaintext);
                    Log::info('Found book description in his page ... ' . $index);
                } else {
                    Log::info('Searching for book description in his page ... ' . $index);
                    $parserObject->setIsbn($isbn[0]->plaintext);
                    Log::info('Found book description in his page ... ' . $index);
                }
            } else {
                Log::info('Not found book description in his page ... ' . $index);
                $parserObject->setIsbn(null);
            }
        }

        if ($params['genre']) {
            Log::info('Searching for book image in his page ... ' . $index);
            $genre = $html->find($params['genre']);
            if (count($genre)) {
                if ($params['description_count']) {
                    Log::info('Searching for book description in his page ... ' . $index);
                    $parserObject->setGenre($genre[0]->nodes[$params['description_count']]->plaintext);
                    Log::info('Found book description in his page ... ' . $index);
                } else {
                    Log::info('Searching for book description in his page ... ' . $index);
                    $parserObject->setGenre($genre[0]->plaintext);
                    Log::info('Found book description in his page ... ' . $index);
                }
            } else {
                Log::info('Not found book description in his page ... ' . $index);
                $parserObject->setGenre(null);
            }
        }

        if ($params['author']) {
            Log::info('Searching for book image in his page ... ' . $index);
            $author = $html->find($params['author']);
            if (count($author)) {
                if ($params['description_count']) {
                    Log::info('Searching for book description in his page ... ' . $index);
                    $parserObject->setAuthor($author[0]->nodes[$params['description_count']]->plaintext);
                    Log::info('Found book description in his page ... ' . $index);
                } else {
                    Log::info('Searching for book description in his page ... ' . $index);
                    $parserObject->setAuthor($author[0]->plaintext);
                    Log::info('Found book description in his page ... ' . $index);
                }
            } else {
                Log::info('Not found book description in his page ... ' . $index);
                $parserObject->setAuthor(null);
            }
        }

        return $parserObject;
    }

    public function parseSearchPage($url, $data, $params, $index)
    {
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
}
