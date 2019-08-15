<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParseController extends Controller
{
    public function index()
    {
        return view('xml.index');
    }

    public function parse(Request $request)
    {
        $url = $request->urlForXml;

        $xml = XmlParser::load($url);
        $pages = $xml->parse([
            'pages' => ['uses' => 'pages.all']
        ]);

        for ($i = 0; $i < $pages; $i++) {
            $url = "https://api.eksmo.ru/v2/?action=products_full&key=aa944110d14336c3cede92051ef35c05&page=".($i + 1);
            $xml = XmlParser::load($url);
            $products = $xml->parse([
                'products' => ['uses' => 'products.product[name,detail_text,detail_picture]'],
            ]);
            foreach ($products['products'] as $product){
                $book = new Book();
                $book->name = $product['name'];
                $book->image = $product['detail_picture'];
                $book->description = $product['detail_text'];
                $book->save();
            }
        }
        return redirect()->back();
    }
}
