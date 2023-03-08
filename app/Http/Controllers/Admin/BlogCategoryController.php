<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;;
use App\Models\Admin\BlogCategory;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Blog Categories';
        $data['categories'] = BlogCategory::orderBy('id', 'ASC')->get();
        return view('backend.blog-category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'name' => 'required|max:255',

        ]);

        $blog = new BlogCategory;
        $blog->name = $request->name;
        $blog->slug = Str::slug($request->name);
        $blog->save();
        return redirect()->route('blog-category.index')->with('success', 'Blog Category Created Successfully');
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
        $data['title'] = 'Edit Blog Category';
        $data['blog'] = BlogCategory::findOrFail(intval($id));
        return view('backend.blog-category.edit', $data);
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
            'name' => 'required|max:255',

        ]);

        $blog = BlogCategory::findOrFail(intval($id));
        $blog->name = $request->name;
        $blog->slug = Str::slug($request->name);
        $blog->save();
        return redirect()->route('blog-category.index')->with('success', 'Blog Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = BlogCategory::findOrFail(intval($id));
        $blog->delete();
        return redirect()->route('blog-category.index')->with('success', 'Blog Category Deleted Successfully');
    }
}
