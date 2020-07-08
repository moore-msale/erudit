<?php


namespace App\Parser\v1;

use App\Temp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Matrix\Exception;
use \Orchestra\Parser\Xml\Facade as XmlParse;

class XmlParser
{
    public static function parseExcel($excel)
    {
        $resultExcel = ExcelParser::parse(public_path('excels/'.$excel));
        DB::table('temps')->orderBy('id')->chunk(1000, function ($temps) use ($resultExcel) {
            foreach ($resultExcel as $index => $item) {
                if (Book::where('name', $item[0])->first()) {
                    continue;
                }
                foreach ($temps as $temp) {
                    if ($temp->name == $item[0]) {
                        $book = new Book();
                        $book->name = $temp->name;
                        if ($temp->image) {
                            try {
                                $image = file_get_contents($temp->image);
                            } catch (\ErrorException $exception) {
                                $image = null;
                                echo $exception->getMessage();
                            }
                        }
                        $book->image = $temp->image && $image ? ImageService::store($image, 'book_') : null;
                        $book->price_retail = $item[4];
                        $book->price_wholesale = $item[5];
                        $book->description = $temp->description;
                        $book->save();
                        Log::info('Temps found id '.$temp->id);
                        DB::table('temps')->delete($temp->id);
                        break;
                    }
                }
            }
        });
        Log::info('Excel succeeded');

    }

    public static function parse($url)
    {
        $xml = XmlParse::load($url);
        $pages = $xml->parse([
            'pages' => ['uses' => 'pages.all']
        ]);

        for ($i = 0; $i < $pages; $i++) {
            $url = "https://api.eksmo.ru/v2/?action=products_full&key=aa944110d14336c3cede92051ef35c05&page=".($i + 1);
            echo $url."\r\n";
            $xml = XmlParse::load($url);
            $products = $xml->parse([
                'products' => ['uses' => 'products.product[name,detail_text,detail_picture,isbnn]'],
            ]);
            foreach ($products['products'] as $index => $product){
                echo "Creating new Temp $index \r\n";
                $book = new Temp();
                $book->name = $product['name'];
                $book->image = $product['detail_picture'];
                $book->description = $product['detail_text'];
                $book->isbn = $product['isbnn'];
                $book->save();
                echo "Created new Temp $index \r\n";
            }
        }
    }
}
