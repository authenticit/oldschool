<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\BookCategory;
use Illuminate\Support\Str;


class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Book Categories';
        $data['categories'] = BookCategory::orderBy('id', 'ASC')->get();

        return view('backend.book-category.index', $data);
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

        $book = new BookCategory;
        $book->name = $request->name;
        $book->slug = Str::slug($request->name);
        $book->save();
        return redirect()->route('book-category.index')->with('success', 'Book Category Created Successfully');
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
        $data['title'] = 'Edit Book Category';
        $data['category'] = BookCategory::find($id);
        return view('backend.book-category.edit', $data);
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
        $book = BookCategory::find($id);
        $book->name = $request->name;
        $book->slug = Str::slug($request->name);
        $book->save();
        return redirect()->route('book-category.index')->with('success', 'Book Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = BookCategory::find($id);
        $book->delete();
        return redirect()->route('book-category.index')->with('success', 'Book Category Deleted Successfully');
    }
}
