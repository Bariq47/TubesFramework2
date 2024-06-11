<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeeController extends Controller
{
    function index()
    {
        $pageTitle = 'Home';

        return view('homee', ['pageTitle' => $pageTitle]);
    }
}
