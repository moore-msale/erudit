<?php


namespace App\Parser\v2;


use App\Parser\ParserInterface;
use App\Parson;
use App\Temp;
use Orchestra\Parser\Xml\Facade as XmlParse;

class XmlParser implements ParserInterface
{
    public function parse($url, Parson $parson)
    {
        $xml = XmlParse::load(url($url));
        $pages = $xml->parse([
            'pages' => ['uses' => 'pages.all']
        ]);

        for ($i = 0; $i < $pages; $i++) {
            $url = "https://api.eksmo.ru/v2/?action=products_full&key=aa944110d14336c3cede92051ef35c05&page=".($i + 1);
            $xml = XmlParse::load($url);
            $products = $xml->parse([
                'products' => ['uses' => 'products.product[name,detail_text,detail_picture,isbnn]'],
            ]);
            foreach ($products['products'] as $product){
                $book = new Temp();
                $book->name = $product['name'];
                $book->image = $product['detail_picture'];
                $book->description = $product['detail_text'];
                $book->isbn = $product['isbnn'];
                $book->save();
            }
        }
    }

    public function parseSearchPage($url, $data, Parson $parson)
    {
        // TODO: Implement parseSearchPage() method.
    }
}
