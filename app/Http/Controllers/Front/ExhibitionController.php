<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Front\Exhibition;
use App\Models\Front\Exhibitor;
use Carbon\Carbon;
use App\Models\Group;

class ExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_timestamp = Carbon::now();
        $data['title'] = 'Exhibitions';
    	$data['exhibitions'] = Exhibition::whereDate('end', '>=', $current_timestamp)->get();
        $data['end_exhibitions'] = Exhibition::whereDate('end', '<', $current_timestamp)->get();

        return view('frontend.exhibition.index', $data);
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
    public function show($slug)
    {
        $data['exhibition'] = Exhibition::where('slug', $slug)->firstOrFail();
        $data['groups'] = Group::all();
        $data['exhibitors'] = Exhibitor::where('exhibition_id', $data['exhibition']->id)->paginate(5);
        // dd($data);

        return view('frontend.exhibition.show', $data);
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

    public function fetch_data(Request $request)
    {
        if($request->ajax()){
            $group = $request->group;

            if($group){
                $exhibitors = Exhibitor::where('exhibition_id', $request->exhibition_id)->where('group', $group)->paginate(5);
                return view('frontend.exhibition.partials.list', compact('exhibitors'))->render();
            }else{
                $exhibitors = Exhibitor::where('exhibition_id', $request->exhibition_id)->paginate(5);
                return view('frontend.exhibition.partials.list', compact('exhibitors'))->render();
            }
            
        }
    }

    public function apply($id)
    {
        $data['exhibition'] = Exhibition::findOrFail(intval($id));
        $data['countries'] = Country::orderBy('name', 'ASC')->get();

        return view('frontend.exhibition.form', $data);
    }
}
