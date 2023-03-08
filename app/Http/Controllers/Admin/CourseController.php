<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Wishlist;
use App\Models\Section;

class CourseController extends Controller
{
    public $curr;
    public function __construct()
    {
        $this->curr = DB::table('currencies')->where('register_id',0)->where('is_default','=',1)->first();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Course List";
        $data['courses'] = Course::paginate(10);

        // search course by title or course category
        if (request()->search) {
            $data['courses'] = Course::where('title', 'LIKE', '%' . request()->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }

        return view('backend.course.index', $data);
    }

    // search course by title or course category
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $data['title'] = 'Course Search';
        $data['courses'] = Course::where('title', 'LIKE', '%' . request()->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('backend.course.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function course_create()
    {
        $data['title'] = "Create Course";
        $data['instructors'] = User::where('role', 'instructor')->get();

        return view('backend.course.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Course::where('title',$request->title)->where('register_id',0)->exists()){
            return redirect()->back()->with('error', 'This title has already been taken.');
        }

        $rules = [
            'photo' => 'mimes:jpeg,jpg,png,svg',
        ];
        $customs = [
            'photo.mimes' => __('Thumbnail Type is Invalid.'),
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section

        $data = new Course();
        $input = $request->all();
        if ($file = $request->file('photo'))
        {
            $name = time().str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/images/courses',$name);
            $input['photo'] = $name;
        }

        if ($request->is_top){
            $input['is_top'] = 1;
        }

        if ($request->is_free){
            $input['is_free'] = 1;
            $input['price'] = 0;
            $input['discount_price'] = 0;
        }else{
            $input['is_free'] = 0;
            $input['price'] = $input['price'];
            $input['discount_price'] = $input['discount_price'];
        }

        $input['requirements'] = implode(',,,', $request->requirements);
        $input['outcomes'] = implode(',,,', $request->outcomes);
        // $input['include_icon'] = implode(',,,', $request->include_icon);
        $input['include_text'] = implode(',,,', $request->include_text);
        $input['status'] = 1;
        $input['user_id'] = $request->user_id;
        if(!empty($request->meta_keywords)){
            $input['meta_keywords'] = str_replace(["value", "{", "}", "[","]",":","\""], '', $request->meta_keywords);
        }

        $data->fill($input)->save();
        return redirect()->route('course.index')->with('message', 'Course added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "Edit course";
        $data['course'] = Course::findOrFail($id);
        $data['instructors'] = User::where('role', 'instructor')->orderBy('id', 'desc')->get();

        return view('backend.course.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if(Course::where('title',$request->title)->where('id','!=',$id)->where('register_id',0)->exists()){
            return redirect()->back()->with('error', 'This title has already been taken.');
        }

        //--- Validation Section
        $rules = [
            'photo' => 'mimes:jpeg,jpg,png,svg',
        ];
        $customs = [
            'photo.mimes' => __('Icon Type is Invalid.'),
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Course::findOrFail($id);

        $input = $request->all();
        if ($file = $request->file('photo'))
        {
            if(file_exists(base_path('../assets/images/courses/'.$data->photo))){
                unlink(base_path('../assets/images/courses/'.$data->photo));
            }

            $name = time().str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/images/courses',$name);
            $input['photo'] = $name;
        }
        if ($request->is_top){
            $input['is_top'] = 1;
        }
        if ($request->is_free){
            $input['is_free'] = 1;
            $input['price'] = 0;
            $input['discount_price'] = 0;
        }else{
            $input['is_free'] = 0;
            $input['price'] = $input['price'];
            $input['discount_price'] = $input['discount_price'];
        }

        $input['requirements'] = implode(',,,', $request->requirements);
        $input['outcomes'] = implode(',,,', $request->outcomes);
        // $input['include_icon'] = implode(',,,', $request->include_icon);
        $input['include_text'] = implode(',,,', $request->include_text);
        $input['user_id'] = $request->user_id;
        if(!empty($request->meta_keywords)){
            $input['meta_keywords'] = str_replace(["value", "{", "}", "[","]",":","\""], '', $request->meta_keywords);
        }



        $data->update($input);
        return redirect()->route('course.index')->with('message', 'Course updated successfully');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Course::findOrFail($id);
        if($data->ratings->count()>0){
            foreach($data->ratings as $rating){
                $rating->delete();
            }
        }

        //If Photo Doesn't Exist
        if($data->photo == null){
            $data->delete();
            return redirect()->back()->with('message', 'Photo Deleted successfully');
        }
        
        //If Photo Exist
        if(file_exists(base_path('../assets/images/courses/'.$data->photo))){
            unlink(base_path('../assets/images/courses/'.$data->photo));
        }

        $data->delete();
        return redirect()->route('course.index')->with('message', 'Course deleted successfully');
    }

    public function status($id1, $id2)
    {
        $data = Course::findOrFail($id1);
        $data->status = $id2;
        $data->update();

        return redirect()->back()->with('message', 'Status updated successfully');

    }
}
