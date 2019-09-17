<?php

namespace App\Jobs;

use App\Book;
use App\ImageService;
use App\Parser\ParserInterface;
use App\Parser\v2\ExcelParser;
use App\Parser\v2\HtmlParser;
use App\Parser\v2\XmlParser;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Collection;
use Matrix\Exception;

class ProcessExcelV2 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $parson;
    private $parser;

    /**
     * Create a new job instance.
     *
     * @param $parson
     * @param ParserInterface $parser
     */
    public function __construct($parson, ParserInterface $parser)
    {
        $this->parson = $parson;
        $this->parser = $parser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = $this->parson->urlForParse;

        if ($this->parson->excel) {
            /**
             * @var Collection $resultExcel
             */
            $resultExcel = (new ExcelParser())->parse(public_path('excels/'.$this->parson->excel));

            echo "Starting foreach excel\r\n";
            foreach ($resultExcel as $index => $item) {
                echo "Parsing... " . ($index + 1) . "\r\n";
                $result = $this->parser->parseSearchPage($url, $item, $this->parson);
                echo "Ended parsing... " . ($index + 1) . "\r\n";
                if ($result) {
                    if (!Book::where('name', $result->getTitle())->first()) {
                        $book = new Book();
                        $book->name = $result->getTitle();
                        $book->description = $result->getDescription();
                        $book->price_retail = $item[4];
                        $book->price_wholesale = $item[5];
                        $file = null;
                        try {
                            $file = file_get_contents($result->getImage());
                        } catch (Exception $exception) {
                            $file = null;
                        }
                        $book->image = $result->getImage() ? ImageService::store($file, 'book_') : null;
                        $book->isbn = preg_replace('/(isbn|ISBN):\s/', '', $result->getIsbn());
                        $book->save();
                    }
                }
            }
            echo "Ended foreaching excel\r\n";

        } else {
            $result = $this->parser->parse($url, $this->parson);
            if ($result) {
                if (!Book::where('name', $result->getTitle())->first()) {
                    $book = new Book();
                    $book->name = $result->getTitle();
                    $book->description = $result->getDescription();
                    $book->price_retail = $this->parson->price_retail;
                    $book->price_wholesale = $this->parson->price_wholesale;
                    $file = null;
                    try {
                        $file = file_get_contents($result->getImage());
                    } catch (Exception $exception) {
                        $file = null;
                    }
                    $book->image = $result->getImage() ? ImageService::store($file, 'book_') : null;
                    $book->isbn = preg_replace('/(isbn|ISBN):\s/', '', $result->getIsbn());
                    $book->save();
                }
            }
        }
    }
}
