<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Admin\BlogCategory;
use App\Models\Admin\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Blog';
        $data['blogs'] = Blog::orderBy('id', 'ASC')->get();
        return view('backend.blog.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create Blog';
        $data['categories'] = BlogCategory::orderBy('id', 'ASC')->get();
        return view('backend.blog.create', $data);
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
            'title' => 'required|max:255',
            'blog_category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,gif,png|max:2048',
            'description' => 'nullable|min:5',
            'tags' => 'required|max:255',
            'source' => 'nullable|max:255',
            'meta_keywords' => 'nullable|max:255',
            'meta_description' => 'nullable',
        ]);

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->blog_category_id = $request->blog_category_id;
        $blog->description = $request->description;
        $blog->tags = $request->tags;
        $blog->source = $request->source;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('uploads/images/blog/', $filename);
            $blog->image = $filename;
        }
        $blog->save();
        return redirect()->route('blog.index')->with('success', 'Blog Created Successfully');
    
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
        $data['title'] = 'Edit Blog';
        $data['categories'] = BlogCategory::orderBy('id', 'ASC')->get();
        $data['b'] = Blog::find($id);
        return view('backend.blog.edit', $data);
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
            'title' => 'required|max:255',
            'blog_category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,gif,png|max:2048',
            'description' => 'nullable|required|min:5',
            'tags' => 'required',
            'source' => 'nullable|required',
            'meta_keywords' => 'nullable|required',
            'meta_description' => 'nullable|required',
        ]);
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->blog_category_id = $request->blog_category_id;
        $blog->description = $request->description;
        $blog->tags = $request->tags;
        $blog->source = $request->source;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('uploads/images/blog/', $filename);
            $blog->image = $filename;
        }
        $blog->save();
        return redirect()->route('blog.index')->with('success', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $blog = Blog::findOrFail(intval($id));
        if ($blog->image) {
            $image_path = public_path('uploads/images/blog/').$blog->image;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
        }
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Blog Deleted Successfully');
    }
}
