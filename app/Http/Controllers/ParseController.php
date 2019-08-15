<?php

namespace App\Http\Controllers;

use App\Book;
use App\HtmlParser;
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
                $name = $request->name;
                $nameCount = $request->name_count;
                $description = $request->description;
                $descriptionCount = $request->description_count;
                $image = $request->image;
                $product = HtmlParser::parse($url, [
                    'image' => $image,
                    'name' => $name,
                    'name_count' => $nameCount,
                    'description' => $description,
                    'description_count' => $descriptionCount
                ]);
                dd($product);
                break;
            default:
                view('parser.html');
        }



        return redirect()->back();
    }

    public function parseHtml(Request $request)
    {
        $url = $request->urlForHtml;

        $html = View::make($url)->render();

        dd($html);
    }
}
