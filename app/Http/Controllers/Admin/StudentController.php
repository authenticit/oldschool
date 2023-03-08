<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Student;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Student\EnrolledCourse;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Student List';
        $data['students'] = User::where('role', 'user')->orderBy('id', 'DESC')->paginate(10);
        
        // search student by name or phone number
        if (request()->search) {
            $data['students'] = User::where('role', 'user')->where('name', 'LIKE', '%' . request()->search . '%')->orWhere('phone', 'LIKE', '%' . request()->search . '%')->orderBy('id', 'DESC')->paginate(10);
        }
        

        return view('backend.student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Student Create';

        return view('backend.student.create', $data);
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
            'name' => 'nullable|max:255',
            'email' => 'nullable|email|unique:users|max:255',
            'bio' => 'nullable',
            'address' => 'nullable',
            'phone' => 'required|unique:users|max:14',
            'facebook_url' => 'nullable',
            'twitter_url' => 'nullable',
            'linkedin_url' => 'nullable',
            'password' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,gif,png|max:8192',
        ]);

        $student = new User;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->bio = $request->bio;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->facebook_url = $request->facebook_url;
        $student->twitter_url = $request->twitter_url;
        $student->linkedin_url = $request->linkedin_url;
        $student->role = 'user';
        $student->password = Hash::make($request->password);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('uploads/images/student/', $filename);
            $student->image = $filename;
        }
        $student->save();

        return redirect()->route('student.index')->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['student'] = User::findOrFail($id);

        // which student is enrolled in which course
        $data['courses'] = EnrolledCourse::where('user_id', $id)->get();

        return view('backend.student.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Student Edit';
        $data['student'] = User::findOrFail($id);
        
        return view('backend.student.edit', $data);
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
            'name' => 'nullable|max:255',
            'email' => 'nullable|max:255',
            'bio' => 'nullable',
            'address' => 'nullable',
            'phone' => 'required|max:14',
            'facebook_url' => 'nullable',
            'twitter_url' => 'nullable',
            'linkedin_url' => 'nullable',
            'password' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,jpg,gif,png|max:8192',
        ]);

        $student = User::findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->bio = $request->bio;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->facebook_url = $request->facebook_url;
        $student->twitter_url = $request->twitter_url;
        $student->linkedin_url = $request->linkedin_url;
        $student->role = 'user';
        $student->password = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('uploads/images/student/', $filename);
            $student->image = $filename;
        }
        $student->save();

        return redirect()->route('student.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Storage::delete('uploads/images/student/'.$id);
        $student = User::findOrFail(intval($id));
        $student->delete();

        return redirect()->route('student.index')->with('message', 'Student has been deleted successfully');
    }

    // search student by name
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $data['title'] = 'Student List';
        $data['students'] = $data['students'] = User::where('role', 'user')->where('name', 'LIKE', '%' . request()->search . '%')->orWhere('phone', 'LIKE', '%' . request()->search . '%')->orderBy('id', 'DESC')->paginate(10);

        return view('backend.student.index', $data);
    }
}
