<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        //$link = "https://news.mail.ru/rss/culture";
        //$link = "https://news.rambler.ru/rss/tech/";
        //$link = "https://lenta.ru/rss";
        $load = $parser
            ->setLink("https://news.mail.ru/rss/culture")
            ->getParseData();

        //dd($load);
    }
}
