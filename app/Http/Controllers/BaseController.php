<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;

class BaseController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'check.permission'
        ];
    }
}
