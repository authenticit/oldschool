<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\BookCategory;
use App\Models\Admin\Instructor;
use Illuminate\Support\Str;
use App\Models\Admin\Book;
use App\Models\User;
use App\Models\Admin\BookOrder;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Book List';
        $data['books'] = Book::orderBy('id', 'ASC')->get();

        // search book by title
        if (request()->search) {
            $data['books'] = Book::where('name', 'LIKE', '%' . request()->search . '%')->orderBy('id', 'DESC')->get();
        }

        return view('backend.book.index', $data);
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $data['title'] = 'Book Search';
        $data['books'] = Book::where('name', 'LIKE', '%' . request()->search . '%')->orderBy('id', 'DESC')->get();

        return view('backend.book.index', $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create Book';
        $data['categories'] = BookCategory::orderBy('id', 'ASC')->get();
        $data['instructors'] = User::where('role', 'instructor')->orderBy('id', 'ASC')->get();

        return view('backend.book.create', $data);
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
            'book_category_id' => 'required',
            'instructor_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,gif,png',
            'actual_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'instructor_percentage' => 'required|numeric',
            'description' => 'nullable',
            'meta_keywords' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_image' => 'nullable|image|mimes:jpeg,jpg,gif,png',
        ]);

        $book = new Book;
        $book->name = $request->name;
        $book->slug = Str::slug($request->name);
        $book->book_category_id = $request->book_category_id;
        $book->user_id = $request->instructor_id;
        $book->actual_price = $request->actual_price;
        $book->sale_price = $request->sale_price;
        $book->instructor_percentage = $request->instructor_percentage;
        $book->description = $request->description;
        $book->meta_keywords = $request->meta_keywords;
        $book->meta_description = $request->meta_description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('uploads/images/book/', $filename);
            $book->image = $filename;
        }

        if ($request->hasFile('meta_image')) {
            $file = $request->file('meta_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('uploads/images/book/', $filename);
            $book->meta_image = $filename;
        }

        $book->save();
        return redirect()->route('book.index')->with('success', 'Book Created Successfully');
    
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
        $data['title'] = 'Edit Book';
        $data['book'] = Book::findOrFail(intval($id));
        $data['categories'] = BookCategory::orderBy('id', 'ASC')->get();
        $data['instructors'] = User::where('role', 'instructor')->orderBy('id', 'ASC')->get();

        return view('backend.book.edit', $data);
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
            'name' => 'required',
            'book_category_id' => 'required',
            'instructor_id' => 'required',
            'actual_price' => 'nullable',
            'sale_price' => 'nullable',
            'instructor_percentage' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'description' => 'nullable',
            'meta_keywords' => 'nullable',
            'meta_description' => 'nullable',
            'meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8192',

        ]);
        $book = Book::findOrFail(intval($id));
        $book->name = $request->name;
        $book->slug = Str::slug($request->name);
        $book->book_category_id = $request->book_category_id;
        $book->user_id = $request->instructor_id;
        $book->actual_price = $request->actual_price;
        $book->sale_price = $request->sale_price;
        $book->instructor_percentage = $request->instructor_percentage;
        $book->description = $request->description;
        $book->meta_keywords = $request->meta_keywords;
        $book->meta_description = $request->meta_description;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('uploads/images/book/', $filename);
            $book->image = $filename;
        }

        if ($request->hasFile('meta_image')) {
            $file = $request->file('meta_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('uploads/images/book/', $filename);
            $book->meta_image = $filename;
        }

        $book->save();
        return redirect()->route('book.index')->with('success', 'Book Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete image
        $book = Book::findOrFail(intval($id));
        if ($book->image) {
            $image_path = public_path('uploads/images/book/').$book->image;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
        }

        if ($book->meta_image) {
            $image_path = public_path('uploads/images/book/').$book->meta_image;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
        }
        $book->delete();
        return redirect()->route('book.index')->with('success', 'Book Deleted Successfully');
    }
    
    public function bookOrderList()
    {
        $data['title'] = 'Book Order List';
        $data['book_orders'] = BookOrder::latest()->get();

        return view('backend.book.order-details', $data);
    }
}
