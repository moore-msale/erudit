<?php

namespace App\Http\Controllers;

use App\Book;
use App\ExcelParser;
use App\HtmlParser;
use App\ImageService;
use App\XmlParser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ParseController extends Controller
{
    public function index($type)
    {
        switch ($type) {
            case 'xml' :
                return view('parser.xml');
                break;
            case 'html' :
                return view('parser.html');
                break;
            default:
                return view('parser.html');
        }
    }

    public function parse(Request $request, $type)
    {
        $url = $request->urlForParse;

        switch ($type) {
            case 'xml' :
                XmlParser::parse($url);
                break;
            case 'html' :
                $params = [
                    'name' => $request->name,
                    'name_count' => $request->name_count,
                    'description' => $request->description,
                    'description_count' => $request->description_count,
                    'image' => $request->image,
                    'name_search' => $request->name_search,
                    'name_search_count' => $request->name_search_count,
                    'name_url' => $request->name_url,
                    'name_url_count' => $request->name_url_count,
                    'searchUrl' => $request->searchUrl,
                    'author' => $request->author,
                    'author_count' => $request->author_count,
                ];
                $resultExcel = ExcelParser::parse($request->excel);
                $count = 0;
                if ($params['searchUrl']) {
                    foreach ($resultExcel as $item) {
                        $products = HtmlParser::searchParse($url, $item[0], $params);
                        if (count($products)) {
                            foreach ($products as $product) {
                                if ($item[1]) {
                                    if ($product[0] == $item[0] && $product[2] == $item[1]) {
                                        $book = HtmlParser::parse($url.$product[1], $params);
                                        if (count($book)) {
                                            $newBook = new Book();
                                            $newBook->name = $book[0];
                                            $newBook->description = $book[1];
                                            $newBook->image = ImageService::store(file_get_contents($book[2]), 'book_');
                                            $newBook->save();
                                            $count++;
                                        }
                                        break;
                                    }
                                } else {
                                    if ($product[0] == $item[0]) {
                                        $book = HtmlParser::parse($url.$product[1], $params);
                                        if (count($book)) {
                                            $newBook = new Book();
                                            $newBook->name = $book[0];
                                            $newBook->description = $book[1];
                                            $newBook->image = ImageService::store(file_get_contents($book[2]), 'book_');
                                            $newBook->save();
                                            $count++;
                                        }
                                        break;
                                    }
                                }

                            }
                        } else {
                            $data = preg_replace('/(\s+)/', '%20', $item[0]);
                            $book = HtmlParser::parse($url.$params['searchUrl'].'/'.$data, $params);
                            if (count($book)) {
                                $newBook = new Book();
                                $newBook->name = $book[0];
                                $newBook->description = $book[1];
                                $newBook->image = ImageService::store(file_get_contents($book[2]), 'book_');
                                $newBook->save();
                                $count++;
                            }
                        }
                    }
                } else {
                    $book = HtmlParser::parse($url, $params);
                    if ($book) {
                        $newBook = new Book();
                        $newBook->name = $book[0];
                        $newBook->description = $book[1];
                        $newBook->image = ImageService::store(file_get_contents($book[2]), 'book_');
                        $newBook->save();
                    }
                }
                break;
            default:
                view('parser.html');
        }



        echo $count . ' из ' . count($resultExcel);
    }

    public function parseHtml(Request $request)
    {
        $url = $request->urlForHtml;

        $html = View::make($url)->render();

        dd($html);
    }
}
