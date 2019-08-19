<?php

namespace App\Jobs;

use App\Book;
use App\ExcelParser;
use App\HtmlParser;
use App\ImageService;
use App\Parson;
use App\XmlParser;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $parson;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Parson $parson)
    {
        $this->parson = $parson;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = $this->parson->urlForParse;
        $type = $this->parson->type;

        switch ($type) {
            case 'xml' :
                XmlParser::parse($url);
                break;
            case 'html' :
                $params = [
                    'name' => $this->parson->name,
                    'name_count' => $this->parson->name_count,
                    'description' => $this->parson->description,
                    'description_count' => $this->parson->description_count,
                    'image' => $this->parson->image,
                    'name_search' => $this->parson->name_search,
                    'name_search_count' => $this->parson->name_search_count,
                    'name_url' => $this->parson->name_url,
                    'name_url_count' => $this->parson->name_url_count,
                    'search_image' => $this->parson->search_image,
                    'searchUrl' => $this->parson->searchUrl,
                    'author' => $this->parson->author,
                    'author_count' => $this->parson->author_count,
                ];

                if ($params['searchUrl'] && $this->parson->excel) {
                    $count = 0;

                    $resultExcel = ExcelParser::parse(public_path('excels/'.$this->parson->excel));
                    foreach ($resultExcel as $index => $item) {
                        $products = HtmlParser::searchParse($url, $item[0], $params, $index);
                        if (count($products)) {
                            foreach ($products as $product) {
                                if ($item[1]) {
                                    if ($product[0] == $item[0]) {
                                        $book = HtmlParser::parse($url.$product[1], $params, $index);
                                        if (count($book) && $book[0]) {
                                            $newBook = new Book();
                                            $newBook->name = $item[0];
                                            $newBook->description = $book[1];
                                            $newBook->price_retail = $item[4];
                                            $newBook->price_wholesale = $item[5];
                                            $newBook->image = $product[2] ? ImageService::store(file_get_contents($product[2]), 'book_') : null;
                                            $newBook->save();
                                            $count++;
                                        }
                                        break;
                                    }
                                } else {
                                    if ($product[0] == $item[0]) {
                                        $book = HtmlParser::parse($url.$product[1], $params, $index);
                                        if (count($book) && $book[0]) {
                                            $newBook = new Book();
                                            $newBook->name = $item[0];
                                            $newBook->description = $book[1];
                                            $newBook->price_retail = $item[4];
                                            $newBook->price_wholesale = $item[5];
                                            $newBook->image = $product[2] ? ImageService::store(file_get_contents($product[2]), 'book_') : null;
                                            $newBook->save();
                                            $count++;
                                        }
                                        break;
                                    }
                                }

                            }
                        } else {
                            $data = preg_replace('/(\s+)/', '%20', $item[0]);
                            $book = HtmlParser::parse($url.$params['searchUrl'].'/'.$data, $params, $index);
                            if (count($book) && $book[0]) {
                                $newBook = new Book();
                                $newBook->name = $item[0];
                                $newBook->description = $book[1];
                                $newBook->price_retail = $item[4];
                                $newBook->price_wholesale = $item[5];
                                $newBook->image = $book[2] ? ImageService::store(file_get_contents($book[2]), 'book_') : null;
                                $newBook->save();
                                $count++;
                            }
                        }
                    }
                } else {
                    $book = HtmlParser::parse($url, $params, 0);
                    if ($book && $book[0]) {
                        $newBook = new Book();
                        $newBook->name = $book[0];
                        $newBook->description = $book[1];
                        $newBook->image = $book[2] ? ImageService::store(file_get_contents($book[2]), 'book_') : null;
                        $newBook->save();
                    }
                }
                break;
            default:
                view('parser.html');
        }
    }
}
