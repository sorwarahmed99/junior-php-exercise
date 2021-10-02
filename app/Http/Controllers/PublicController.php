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
}
