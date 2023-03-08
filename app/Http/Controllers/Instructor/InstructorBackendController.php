<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Book;
use App\Models\Admin\BookOrder;
use App\Models\Admin\Course;
use App\Models\Student\EnrolledCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class InstructorBackendController extends Controller
{

    /* instructor module */

    // instructor signin page
    public function instructorSignin()
    {
        $data['title'] = "Gains School | Instructor Signin";
        return view('frontend.instructor.instructor_signin', $data);
    }

    // custome instructor signin page
    public function instructorLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $creadintials = $request->only('email', 'password');
        if (Auth::attempt($creadintials)) {
            if (Auth::user()->role == 'instructor') {
                return redirect()->route('instructor.dashboard');
            } else {
                return redirect('/student/signin')->with('error', 'Invalid email or password');
            }
        } else {
            return redirect('/student/signin')->with('error', 'Invalid email or password');
        }
    }

    // instructor dashboard
    public function instructorDashboard()
    {
        $data['title'] = "Gains School | Instructor Dashboard";


        return view('frontend.instructor.instructor_dashboard', $data);
    }

    // Total list of courses which is added by which instructor
    public function instructorCourse()
    {
        $data['title'] = "Gains School | Instructor Course";
        $data['courses'] = Course::where('user_id', Auth::user()->id)->get();

        return view('frontend.instructor.instructor_course', $data);
    }


    // which instructor has which course student enrolled
    public function instructorEnrolledStudent()
    {
        $data['title'] = "Gains School | Instructor Course Student";
        $data['orders'] = EnrolledCourse::join('courses', 'enrolled_courses.course_id', '=', 'courses.id')->where('courses.user_id', Auth::user()->id)->get();

        return view('frontend.instructor.instructor_enrolled_student', $data);
    }

    // which instructor has which book
    public function instructorBook()
    {
        $data['title'] = "Gains School | Instructor Book";
        $data['books'] = Book::where('user_id', Auth::user()->id)->get();

        return view('frontend.instructor.instructor_book', $data);
    }

    // which instructor book has order
    public function instructorBookOrder()
    {
        $data['title'] = "Gains School | Instructor Book Order";
        $data['orders'] = Book::join('book_orders', 'books.id', '=', 'book_orders.book_id')->where('books.user_id', Auth::user()->id)->get();

        return view('frontend.instructor.instructor_book_order', $data);
    }


    public function addCourse()
    {
        $data['title'] = "Create Course";

        return view('frontend.instructor.create_course', $data);
    }

    public function storeCourse(Request $request)
    {
        if (Course::where('title', $request->title)->where('register_id', 0)->exists()) {
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
        if ($file = $request->file('photo')) {
            $name = time() . str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/images/courses', $name);
            $input['photo'] = $name;
        }

        if ($request->is_top) {
            $input['is_top'] = 1;
        }

        if ($request->is_free) {
            $input['is_free'] = 1;
            $input['price'] = 0;
            $input['discount_price'] = 0;
        } else {
            $input['is_free'] = 0;
            $input['price'] = $input['price'];
            $input['discount_price'] = $input['discount_price'];
        }

        $input['requirements'] = implode(',,,', $request->requirements);
        $input['outcomes'] = implode(',,,', $request->outcomes);
        // $input['include_icon'] = implode(',,,', $request->include_icon);
        $input['include_text'] = implode(',,,', $request->include_text);
        $input['status'] = 1;
        $input['user_id'] = Auth::user()->id;
        if (!empty($request->meta_keywords)) {
            $input['meta_keywords'] = str_replace(["value", "{", "}", "[", "]", ":", "\""], '', $request->meta_keywords);
        }

        $data->fill($input)->save();
        return redirect()->route('instructor.course')->with('message', 'Course added successfully');
    }


    // instructor change his own course
    public function editCourse($id)
    {
        $data['title'] = "Gains School | Instructor Change Course";
        $data['course'] = Course::findOrFail($id);

        return view('frontend.instructor.edit_course', $data);
    }

    public function updateCourse(Request $request, $id)
    {
        if (Course::where('title', $request->title)->where('id', '!=', $id)->where('register_id', 0)->exists()) {
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
        if ($file = $request->file('photo')) {
            if (file_exists(base_path('../assets/images/courses/' . $data->photo))) {
                unlink(base_path('../assets/images/courses/' . $data->photo));
            }

            $name = time() . str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/images/courses', $name);
            $input['photo'] = $name;
        }
        if ($request->is_top) {
            $input['is_top'] = 1;
        }
        if ($request->is_free) {
            $input['is_free'] = 1;
            $input['price'] = 0;
            $input['discount_price'] = 0;
        } else {
            $input['is_free'] = 0;
            $input['price'] = $input['price'];
            $input['discount_price'] = $input['discount_price'];
        }

        $input['requirements'] = implode(',,,', $request->requirements);
        $input['outcomes'] = implode(',,,', $request->outcomes);
        // $input['include_icon'] = implode(',,,', $request->include_icon);
        $input['include_text'] = implode(',,,', $request->include_text);
        $input['user_id'] = Auth::user()->id;
        if (!empty($request->meta_keywords)) {
            $input['meta_keywords'] = str_replace(["value", "{", "}", "[", "]", ":", "\""], '', $request->meta_keywords);
        }



        $data->update($input);
        return redirect()->route('instructor.course')->with('message', 'Course updated successfully');
    }
}
