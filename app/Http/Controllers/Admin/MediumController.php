<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Medium;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ArtCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MediumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Medium";
        $data['categories'] = ArtCategory::get();
        $data['mediums'] = Medium::orderBy('id', 'ASC')->get();

        return view('backend.art-medium.index', $data);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required',
        ]);

        $medium = new Medium;
        $medium->name = $request->name;
        $medium->slug = $this->createSlug($request->name);
        $medium->category_id = $request->category_id;
        $medium->added_by = Auth::user()->id;
        $medium->save();

        return redirect()->route('medium.index')->with('message', 'New Medium is added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Medium  $medium
     * @return \Illuminate\Http\Response
     */
    public function show(Medium $medium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Medium  $medium
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "Edit Medium";
        $data['categories'] = ArtCategory::all();
        $data['medium'] = Medium::findOrFail(intval($id));

        return view('backend.art-medium.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Medium  $medium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $medium = Medium::findOrFail(intval($id));
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required', 
        ]);

        $medium->name = $request->name;
        if($medium->name != $request->name){
            $medium->slug = $this->createSlug($request->name);
        }

        $medium->category_id = $request->category_id;
        $medium->save();

        return redirect()->route('medium.index')->with('message', 'Medium has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Medium  $medium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medium $medium)
    {
        //
    }

    protected function createSlug(string $name): string
    {

        $slugsFound = $this->getSlugs($name);
        $counter = 0;
        $counter += $slugsFound;
        $slug = str::slug($name, $separator = "-", app()->getLocale());
        if ($counter) {
            $slug = $slug . '-' . $counter;
        }

        return $slug;
    }

    protected function getSlugs($name): int
    {
        return Medium::select()->where('name', 'like', $name)->count();
    }
}
;