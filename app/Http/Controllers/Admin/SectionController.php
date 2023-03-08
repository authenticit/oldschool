<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Admin\Course;
use App\Models\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Sections';
        $data['sections'] = Section::all();

        return view('backend.section.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create Section';
        $data['sections'] = Section::latest()->get();
        $data['courses'] = Course::latest()->get();

        return view('backend.section.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required',
            'title' => 'required|max:255',
            'pos' => 'required',
        ]);

        $section = new Section();
        $section->course_id = $request->course_id;
        $section->title = $request->title;
        $section->pos = $request->pos;
        $section->save();

        return redirect()->route('section.index')->with('success', 'Section created successfully');
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
        $data['title'] = 'Edit Section';
        $data['section'] = Section::find($id);
        $data['courses'] = Course::latest()->get();

        return view('backend.section.edit', $data);
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
        $this->validate($request, [
            'course_id' => 'required',
            'title' => 'required|max:255',
            'pos' => 'required',
        ]);

        $section = Section::find($id);
        $section->course_id = $request->course_id;
        $section->title = $request->title;
        $section->pos = $request->pos;
        $section->save();

        return redirect()->route('section.index')->with('success', 'Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();

        return redirect()->route('section.index')->with('success', 'Section deleted successfully');
    }
}
