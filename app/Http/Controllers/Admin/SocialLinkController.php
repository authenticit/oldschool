<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\SocialLink;
use App\Models\Admin\Facebook;
use App\Models\Admin\Google;

class SocialLinkController extends Controller
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
        
        $data['title'] = 'Add Social Link';

        return view('backend.social.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'facebook' => 'required',
            'google_plus' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'dribble' => 'required',
            'f_status' => 'required',
            'g_status' => 'required',
            't_status' => 'required',
            'l_status' => 'required',
            'd_status' => 'required',
            
        ]);
        dd($request->all());
        $social = new SocialLink();
        $social->facebook = $request->facebook;
        $social->google_plus = $request->google_plus;
        $social->twitter = $request->twitter;
        $social->linkedin = $request->linkedin;
        $social->dribble = $request->dribble;

        if(!$request->f_status){
            $social->f_status = 1;
        }else{
            $social->f_status = 0;
        }

        if(!$request->g_status){
            $social->g_status = 1;
        }else{
            $social->g_status = 0;
        }

        if(!$request->t_status){
            $social->t_status = 1;

        }else{
            $social->t_status = 0;
        }

        if(!$request->l_status){
            $social->l_status = 1;
        }else{
            $social->l_status = 0;
        }

        if(!$request->d_status){
            $social->d_status = 1;
        }else{
            $social->d_status = 0;
        }

        
        // dd($social);
        $social->save();
        return redirect()->route('social.index')->with('success', 'Social Link added successfully.');
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


    public function facebook_create()
    {
        $data['title'] = 'Add Facebook Link';
        $data['facebook'] = Facebook::findOrFail(1);

        return view('backend.social.facebook', $data);
    }

    public function facebook_store(Request $request)
    {
        $request->validate([
            'app_id' => 'required',
            'app_secret' => 'required',
            'web_url' => 'required',
            'redirect_url' => 'required',
            
        ]);

        $f = new Facebook();
        $f->app_id = $request->app_id;
        $f->app_secret = $request->app_secret;
        $f->web_url = $request->web_url;
        $f->redirect_url = $request->redirect_url;
        $f->save();
        
        return redirect()->route('facebook.create')->with('success', 'Facebook Link added successfully.');
    }


    public function facebook_edit($id)
    {
        $data['title'] = 'Edit Facebook Link';
        $data['facebook'] = Facebook::findOrFail($id);

        return view('backend.social.facebook_edit', $data);
    }

    public function facebook_update(Request $request, $id)
    {
        $request->validate([
            'app_id' => 'required',
            'app_secret' => 'required',
            'web_url' => 'required',
            'redirect_url' => 'required',
            
        ]);

        $f = Facebook::findOrFail($id);
        $f->app_id = $request->app_id;
        $f->app_secret = $request->app_secret;
        $f->web_url = $request->web_url;
        $f->redirect_url = $request->redirect_url;
        $f->save();
        
        return redirect()->route('facebook.create')->with('success', 'Facebook Link added successfully.');
    }

}
