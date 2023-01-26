<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class InfoController extends Controller
{
        public function info(): View
    {
        return \view('news.info');
    }

}
