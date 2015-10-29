<?php

namespace HLS\Http\Controllers;

use HLS\Enquiry;
use Illuminate\Http\Request;
use HLS\Http\Requests;
use HLS\Http\Controllers\Controller;

class Enquire extends Controller
{
    /**
     * Show the form for creating a new Enquiry.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact-us');
    }

    /**
     * Store Enquiry and return POST route
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function postContactUs(Request $request)
    {
        $this->store($request);

        return view('contact-us-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Enquiry::create($request->all());
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
