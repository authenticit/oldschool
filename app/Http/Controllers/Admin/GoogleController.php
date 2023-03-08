<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Google;

class GoogleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Google Plus Link';
        $data['google'] = Google::findorfail(1);

        return view('backend.social.google', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'client_secret' => 'required',
            'web_url' => 'required',
            'redirect_url' => 'required',
            
        ]);

        $g = new Google();
        $g->client_id = $request->client_id;
        $g->client_secret = $request->client_secret;
        $g->web_url = $request->web_url;
        $g->redirect_url = $request->redirect_url;
        $g->save();
        
        return redirect()->route('google.create')->with('success', 'Google Plus Link added successfully.');
    
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
        $data['title'] = 'Edit Google Plus Link';
        $data['google'] = Google::findOrFail($id);

        return view('backend.social.google_edit', $data);
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
        $request->validate([
            'client_id' => 'required',
            'client_secret' => 'required',
            'web_url' => 'required',
            'redirect_url' => 'required',
            
        ]);

        $g = Google::findOrFail($id);
        $g->client_id = $request->client_id;
        $g->client_secret = $request->client_secret;
        $g->web_url = $request->web_url;
        $g->redirect_url = $request->redirect_url;
        $g->save();
        
        return redirect()->route('google.create')->with('success', 'Google Plus Link added successfully.');
    
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
