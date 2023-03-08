<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use File;
use App\Models\User;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Artist List";
        $data['artists'] = Artist::latest()->orderBy('id', 'ASC')->get();

        return view('backend.artist.index', $data);
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "Gains School | Edit Artist";
        $data['artist'] = Artist::find($id);

        return view('backend.artist.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'password' => 'nullable',
        ]);

        $artist = Artist::find($id);
        $art = User::where('phone', $artist->phone)->where('role', 'artist')->first();
        $art->password = bcrypt($request->password);
        $art->save();

        return redirect('admin/artist')->with('success', 'Artist Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        Storage::delete($artist->image);
        if($artist->delete()) {
            return redirect()->back()->with('message', 'Artist has been deleted successfully');
        }
        return redirect()->back()->with('error', 'Failed to delete artist');
    }

    /**
     * Create a slug from name
     * @param  string $name
     * @return string $slug
     */
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

    /**
     * Find same listing with same name
     * @param  string $name
     * @return int $total
     */
    protected function getSlugs($name): int
    {
        $slug = str::slug($name, $separator = "-", app()->getLocale());
        return Artist::select()->where('slug', 'like', $slug)->count();
    }
}