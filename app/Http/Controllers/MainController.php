<?php

namespace App\Http\Controllers;

use App\Http\Services\CurrencyService;
use CurrencyApi\CurrencyApi\CurrencyApiException;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index');
    }
}
