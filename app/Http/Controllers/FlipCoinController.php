<?php

namespace App\Http\Controllers;

use App\Models\FlipCoin;
use Illuminate\Http\Request;

class FlipCoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coins = FlipCoin::orderBy('created_at', 'desc')->get();
        return response()->json([
            'coins' => $coins,
        ]);
    }

    public function flip(Request $request)
    {
        $number_of_time = $request->number;
        $percentage = Controller::percentagePrint($number_of_time);

        $heads = $percentage[0];
        $tails = $percentage[1];

        $flips = new FlipCoin();
        $flips->number_of_flip = $number_of_time;
        $flips->head = $heads;
        $flips->tail = $tails;
        $flips->save();

        $response = array(
            'head' => $heads,
            'tail' => $tails,
        );

        return response()->json($response);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FlipCoin  $flipCoin
     * @return \Illuminate\Http\Response
     */
    public function show(FlipCoin $flipCoin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FlipCoin  $flipCoin
     * @return \Illuminate\Http\Response
     */
    public function edit(FlipCoin $flipCoin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FlipCoin  $flipCoin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlipCoin $flipCoin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FlipCoin  $flipCoin
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlipCoin $flipCoin)
    {
        //
    }
}
