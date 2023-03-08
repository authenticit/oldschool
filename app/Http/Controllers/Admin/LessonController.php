<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Admin\Course;
use App\Models\Section;


class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Lessons';
        $data['lessons'] = Lesson::latest()->get();

        return view('backend.lesson.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create Lesson';
        $data['lessons'] = Lesson::latest()->get();
        $data['sections'] = Section::latest()->get();
        $data['course'] = Course::latest()->get();

        return view('backend.lesson.create', $data);
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
            'section_id' => 'required',
            'title' => 'required|max:255',
            'type' => 'required',
            'details' => 'nullable',
            'file' => 'nullable',
            'url' => 'nullable',
            'duration' => 'nullable',
            'iframe_code' => 'nullable',
            'video_file' => 'nullable',
            'pos' => 'nullable',
        ]);

        

        $lesson = new Lesson();
        $lesson->course_id = $request->course_id;
        $lesson->section_id = $request->section_id;
        $lesson->title = $request->title;
        $lesson->type = $request->type;
        $lesson->details = $request->details;
        $lesson->url = $request->url;
        $lesson->duration = $request->duration;
        $lesson->iframe_code = $request->iframe_code;
        $lesson->pos = $request->pos;
        // upload video file
        if ($request->hasFile('video_file')) {
            $file = $request->file('video_file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/lessons/', $filename);
            $lesson->video_file = $filename;
        }

        // upload file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/lessons/', $filename);
            $lesson->file = $filename;
        }

     
        $lesson->save();
        return redirect()->route('lesson.index')->with('success', 'Lesson created successfully');
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
        $data['title'] = 'Edit Lesson';
        $data['lesson'] = Lesson::find($id);
        $data['sections'] = Section::latest()->get();

        return view('backend.lesson.edit', $data);
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
            'course_id' => 'nullable',
            'section_id' => 'nullable',
            'title' => 'nullable|max:255',
            'type' => 'nullable',
            'details' => 'nullable',
            'file' => 'nullable',
            'url' => 'nullable',
            'duration' => 'nullable',
            'iframe_code' => 'nullable',
            'video_file' => 'nullable',
            'pos' => 'nullable',
        ]);

        $lesson = Lesson::find($id);
        $lesson->section_id = $request->section_id;
        $lesson->title = $request->title;
        $lesson->type = $request->type;
        $lesson->details = $request->details;
        $lesson->url = $request->url;
        $lesson->duration = $request->duration;
        $lesson->iframe_code = $request->iframe_code;
        $lesson->pos = $request->pos;
        // upload video file
        if ($request->hasFile('video_file')) {
            $file = $request->file('video_file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/lessons/', $filename);
            $lesson->video_file = $filename;
        }

        // upload file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/lessons/', $filename);
            $lesson->file = $filename;
        }

     
        $lesson->save();
        return redirect()->route('lesson.index')->with('success', 'Lesson updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect()->route('lesson.index')->with('success', 'Lesson deleted successfully');
    }
}
