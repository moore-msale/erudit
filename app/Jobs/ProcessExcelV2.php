<?php

namespace App\Jobs;

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
            $resultExcel = (new ExcelParser())->parse($this->parson->excel);

            foreach ($resultExcel as $item) {
                $results = $this->parser->parseSearchPage($url, $item[0], $this->parson);
            }


        } else {
            $result = $this->parser->parse($url, $this->parson);
        }
    }
}
