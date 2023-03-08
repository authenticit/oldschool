<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ArtCategory;
use App\Models\Admin\Artist;
use App\Models\Admin\Medium;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Galleries";
        $data['galleries'] = Gallery::orderBy('id', 'DESC')->get();

        return view('backend.gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Image';
        $data['artists'] = Artist::orderBy('id', 'ASC')->get();
        $data['categories'] = ArtCategory::get();

        return view('backend.gallery.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|min:5|max:255',
            'artist_id' => 'required',
            'size_inc' => 'required',
            'size_cm' => 'required',
            'category_id' => 'nullable',
            'medium_id' => 'nullable',
            'year' => 'required',
            'details' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,gif,png|max:2048',
        ));

        $image = new Gallery;
        $image->title = $request->title;
        $image->slug = $this->createSlug($request->title);
        $image->artist_id = $request->artist_id;
        $image->size_inc = $request->size_inc;
        $image->size_cm = $request->size_cm;
        $image->category_id = 1;
        $image->medium_id = 1;
        $image->year = $request->year;
        $image->copyright = $request->copyright;
        $image->details = $request->details;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('upload/images/', $filename);
            $image->image = $filename;
        }

        $image->added_by = Auth::user()->id;
        $image->save();

        return redirect()->route('gallery.index')->with('message', 'New image is added in gallery');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "Edit Image";
        $data['image'] = Gallery::findOrFail(intval($id));
        $data['artists'] = Artist::orderBy('id', 'ASC')->get();
        $data['medium'] = Medium::where('id', $data['image']->medium_id)->first();
        $data['categories'] = ArtCategory::get();

        return view('backend.gallery.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required|min:5|max:255',
            'artist_id' => 'required',
            'size_inc' => 'required',
            'size_cm' => 'required',
            'category_id' => 'nullable',
            'medium_id' => 'nullable',
            'year' => 'required',
            'details' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,gif,png|max:2048',
        ));

        $image = Gallery::findOrFail(intval($id));
        $image->title = $request->title;
        if($image->title != $request->title){
            $image->slug = $this->createSlug($request->title);
        }

        $image->artist_id = $request->artist_id;
        $image->size_inc = $request->size_inc;
        $image->size_cm = $request->size_cm;
        $image->category_id = 1;
        $image->medium_id = 1;
        $image->year = $request->year;
        $image->copyright = $request->copyright;
        $image->details = $request->details;
        if($request->hasfile('image')){
            if($image->image){
                storage::delete($image->image);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('upload/images/', $filename);
            $image->image = $filename;
        }

        $image->added_by = Auth::user()->id;
        $image->save();

        return redirect()->route('gallery.index')->with('message', 'Image is updated in gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        dd($gallery);
        Storage::delete($gallery->image);
        if($gallery->delete()) {
            return redirect()->route('gallery.index')->with('message', 'Image has been deleted successfully');
        }
        return redirect()->back()->with('error', 'Failed to delete Image');
    }

    protected function createSlug(string $title): string
    {

        $slugsFound = $this->getSlugs($title);
        $counter = 0;
        $counter += $slugsFound;
        $slug = str::slug($title, $separator = "-", app()->getLocale());
        if ($counter) {
            $slug = $slug . '-' . $counter;
        }

        return $slug;
    }

    protected function getSlugs($title): int
    {
        $slug = str::slug($title, $separator = "-", app()->getLocale());

        return Gallery::select()->where('slug', 'like', $slug)->count();
    }
}