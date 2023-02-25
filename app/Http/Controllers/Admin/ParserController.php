<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\QueryBuilders\SourcesQueryBuilder;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param SourcesQueryBuilder $sourcesQueryBuilder
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, SourcesQueryBuilder $sourcesQueryBuilder)
    {
        $links = $sourcesQueryBuilder->getAll()->pluck('url');

        foreach($links as $link) {
            \dispatch(new JobNewsParsing($link));
        }

        return "Parsing completed";
    }
}
