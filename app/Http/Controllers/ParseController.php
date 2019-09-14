<?php

namespace App\Http\Controllers;

use App\Book;
use App\Parser\v1\ExcelParser;
use App\Parser\v1\HtmlParser;
use App\ImageService;
use App\Jobs\ProcessExcel;
use App\Parson;
use App\Parser\v1\XmlParser;
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
        $file = $request->excel;
        if ($file) {
            $fileName = uniqid('excel_').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('excels'), $fileName);
            $request->files->remove('excel');
            $request->merge(['excel' => $fileName]);
        }

        $request->merge(['type' => $type]);
        if (!$request->has('name')) {
            $request->merge(['name' => uniqid('xml_')]);
        }
        if (!$request->has('urlForParse')) {
            $request->merge(['urlForParse' => uniqid()]);
        }

        $parson = Parson::create($request->request->all());
        ProcessExcel::dispatch($parson);

        return redirect()->back();
    }

    public function parseHtml(Request $request)
    {
        $url = $request->urlForHtml;

        $html = View::make($url)->render();

        dd($html);
    }
}
