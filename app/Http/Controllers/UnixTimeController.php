<?php

namespace App\Http\Controllers;

use App\Models\UnixTime;
use Illuminate\Http\Request;

class UnixTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $timestamps = UnixTime::all();
        return response()->json([
            'timestamps' => $timestamps,
        ]);
    }

    public function convertToTimestamp(Request $request)
    {
        $unix = $request->time;
        $convert = Controller::unixTime($unix);

        $unix_time = new UnixTime();
        $unix_time->unix_time = $unix;
        $unix_time->converted_time = $convert;
        $unix_time->save();

        return response()->json($convert);
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
     * @param  \App\Models\UnixTime  $unixTime
     * @return \Illuminate\Http\Response
     */
    public function show(UnixTime $unixTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnixTime  $unixTime
     * @return \Illuminate\Http\Response
     */
    public function edit(UnixTime $unixTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnixTime  $unixTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnixTime $unixTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnixTime  $unixTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnixTime $unixTime)
    {
        //
    }
}
