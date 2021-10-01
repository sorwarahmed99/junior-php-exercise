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
        $timestamps = UnixTime::all();
        $emails = ValdateEmail::all();
        $flips = FlipCoin::all();

        return view('welcome', compact('timestamps', 'emails', 'flips'));
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

    public function emailValiation(Request $request)
    {
        $email = $request->email;
        $validate = Controller::validateEmail($email);

        $validation = new ValdateEmail();
        $validation->input_email = $email;
        $validation->is_valid = $validate;
        $validation->save();


        return response()->json($validate);
    }

    public function flipACoin(Request $request)
    {
        $number_of_time = $request->number;
        $p = Controller::percentagePrint($number_of_time);

        $a1 = $p[0];
        $b1 = $p[1];

        $flips = new FlipCoin();
        $flips->number_of_flip = $number_of_time;
        $flips->head = $a1;
        $flips->tail = $b1;
        $flips->save();

        $response = [
            'head' => $p[0],
            'tail' => $p[1],
        ];

        return response()->json($response);

        // echo json_encode($a1, $b1);
        // echo json_encode(array($num1, $num2));


        // return back()->with('a1', $a1)->with('b1', $b1);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
