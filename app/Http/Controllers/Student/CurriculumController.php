<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Course;
use App\Models\Lesson;
use App\Models\Student\EnrolledCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Section;


class CurriculumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //*** GET Request
    public function curriculumLesson($id)
    {
        $data['enrolledCourse'] = EnrolledCourse::where('user_id', Auth::user()->id)->where('course_id', $id)->first();
        $data['sections'] = Section::where('course_id', $data['enrolledCourse']->course_id)->get();
        $data['section_id'] = $data['sections'][0]->id;
        $data['lesson'] = Lesson::where('section_id', $data['section_id'])->get();
        $data['categories'] = Category::latest()->get();
        
        return view('student.curriculum-view', $data);
    }

     // lesson single view
     public function lessonView($id)
     {
         $data['lesson'] = Lesson::findOrFail($id);
         $data['categories'] = Category::latest()->get();
         $data['sections'] = Section::where('course_id', $data['lesson']->course_id)->get();
         
         return view('student.lesson-view', $data);
     }


    //*** POST Request
    public function result(Request $request)
    {
        $input = $request->all();
        $lsn = Lesson::find($input['lesson_id']);
        $answers = $input['answers'];
        $result = [];
        $result['correct_answers_count'] = 0;
        $result['correct_answers'] = [];
        $result['submitted_answers'] = [];
        $result['main_answers'] = [];

        $pi = 0;
        foreach($answers as $pans){
            $ci = 0;
            foreach($pans as $key => $ans){
                if($ans == 1){
                    $result['submitted_answers'][$pi][$ci] = $key;
                    $ci++;
                }

            }
            $pi++;
        }

        $pi = 0;
        foreach($lsn->questions()->oldest('pos')->get() as $key => $qsn){

            if($answers[$key] == json_decode($qsn->answers,true)){
                $result['main_answers'][$key] = true;
                $result['correct_answers_count']++;
            }else{
                $result['main_answers'][$key] = false;
            }

            $ci = 0;
            foreach(json_decode($qsn->answers,true) as $key => $ans){
                if($ans == 1){
                    $result['correct_answers'][$pi][$ci] = $key;
                    $ci++;
                }

            }

            $pi++;
        }


        return redirect()->back()->with('result',$result);
    }


    
}
