<?php

namespace App\Http\Controllers;

use App\Models\FlipCoin;
use App\Models\UnixTime;
use App\Models\ValdateEmail;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }
}
