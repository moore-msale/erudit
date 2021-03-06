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
use Illuminate\Support\Facades\Mail;
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

    public function fail($exception = null)
    {
        Mail::raw('Exception: '.$exception, function ($m) {
            $m->to('tilek.kubanov@gmail.com');
        });
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

            foreach ($resultExcel as $index => $item) {
                $result = $this->parser->parseSearchPage($url, $item, $this->parson);

                if ($result) {
                    if (str_replace('-', '', $result->getIsbn()) == str_replace('-', '', $item[2])) {;
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
                            $book->isbn = $result->getIsbn();
                            $book->save();
                        }
                    }
                }
            }

        } else {
            $result = $this->parser->parse($url, $this->parson);
            if ($result) {
                foreach ($result->getIsbn() as $isbn) {
                    if (str_replace('-', '', $isbn) == str_replace('-', '', $this->parson->isbn_custom)) {
                        $isbnMatches = $isbn;
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
                            $book->isbn = $isbnMatches;
                            $book->save();
                            break;
                        }
                    }
                }
            }
        }
    }
}
