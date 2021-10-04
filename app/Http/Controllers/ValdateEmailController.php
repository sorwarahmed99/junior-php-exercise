<?php

namespace App\Http\Controllers;

use App\Models\ValdateEmail;
use Illuminate\Http\Request;

class ValdateEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $emails = ValdateEmail::orderBy('created_at', 'desc')->get();
        return response()->json([
            'emails' => $emails,
        ]);
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
     * @param  \App\Models\ValdateEmail  $valdateEmail
     * @return \Illuminate\Http\Response
     */
    public function show(ValdateEmail $valdateEmail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ValdateEmail  $valdateEmail
     * @return \Illuminate\Http\Response
     */
    public function edit(ValdateEmail $valdateEmail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ValdateEmail  $valdateEmail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ValdateEmail $valdateEmail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ValdateEmail  $valdateEmail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ValdateEmail $valdateEmail)
    {
        //
    }
}
