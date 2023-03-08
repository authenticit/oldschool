<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BookWithdraw;
use App\Models\User;
use App\Models\Admin\Course;
use App\Models\Admin\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class InstructorController extends Controller
{


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data['title'] = "instructor List";
		$data['instructors'] = User::where('role', 'instructor')->orderBy('id', 'desc')->paginate(10);

		// search instructor by name
		if (request()->search) {
			$data['instructors'] = User::where('role', 'instructor')->where('name', 'LIKE', '%' . request()->search . '%')->orderBy('id', 'desc')->paginate(10);
		}
		return view('backend.instructor.index', $data);
	}

	// search student by name
	public function search(Request $request)
	{
		$request->validate([
			'search' => 'required',
		]);

		$data['title'] = 'Instructor Search';
		$data['instructors'] = User::where('role', 'instructor')->where('name', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'DESC')->paginate(10);

		return view('backend.instructor.index', $data);
	}

	public function secretLogin($id)
	{
		$instructor = User::findOrFail($id);
		Auth::guard('web')->login($instructor);

		return redirect(route('instructor-dashboard'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$data['title'] = "Add Instructor";

		return view('backend.instructor.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if (User::where('email', $request->email)->where('register_id', 0)->exists()) {
			return redirect()->back()->with('error', 'This email has already been taken');
		}

		if (User::where('instructor_name', $request->instructor_name)->where('register_id', 0)->exists()) {
			return redirect()->back()->with('error', 'TThis instructor name has already been taken.');
		}

		$rules = [
			'image' => 'mimes:jpeg,jpg,png,svg',
			'name' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'facebook_url' => 'nullable|url',
			'twitter_url' => 'nullable|url',
			'linkedin_url' => 'nullable|url',
		];

		$customs = [
			'image.mimes' => __('Thumbnail Type is Invalid.'),
		];
		$validator = Validator::make($request->all(), $rules, $customs);

		if ($validator->fails()) {
			return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
		}
		//--- Validation Section Ends

		// logic section //
		$data = new User;
		$input = $request->all();
		$input['password'] = bcrypt($request['password']);
		if ($file = $request->file('image')) {
			$name = time() . str_replace(' ', '', $file->getClientOriginalName());
			$file->move('assets/images/users', $name);
			$input['image'] = $name;
		}

		$input['instructor_slug'] = str_replace(" ", "-", $input['instructor_name']);
		$input['affiliate_code'] = md5($request->name . $request->email);
		$input['is_instructor'] = 2;
		$input['role'] = 'instructor';
		$input['facebook_url'] = $request->facebook_url;
		$input['twitter_url'] = $request->twitter_url;
		$input['linkedin_url'] = $request->linkedin_url;
		$data->create($input);

		return redirect()->route('instructor.index')->with('message', 'Instructor create successfully');
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
		$data['title'] = "Edit instructor";
		$data['instructor'] = User::findOrFail($id);

		return view('backend.instructor.edit', $data);
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
		if (User::where('email', $request->email)->where('id', '!=', $id)->where('register_id', 0)->exists()) {
			return redirect()->back()->with('error', 'This email has already been taken');
		}
		if (User::where('instructor_name', $request->instructor_name)->where('id', '!=', $id)->where('register_id', 0)->exists()) {
			return redirect()->back()->with('error', 'TThis instructor name has already been taken.');
		}

		$rules = [
			'image' => 'mimes:jpeg,jpg,png,svg',
			'name' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'facebook_url' => 'nullable|url',
			'twitter_url' => 'nullable|url',
			'linkedin_url' => 'nullable|url',
		];

		$customs = [
			'image.mimes' => __('Thumbnail Type is Invalid.'),
		];
		$validator = Validator::make($request->all(), $rules, $customs);

		if ($validator->fails()) {
			return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
		}
		//--- Validation Section Ends\\

		// logic section //

		$input = $request->all();
		$data = User::findOrFail($id);

		if ($file = $request->file('image')) {
			if (file_exists(base_path('../assets/images/users/' . $data->image))) {
				unlink(base_path('../assets/images/users/' . $data->image));
			}
			$name = time() . str_replace(' ', '', $file->getClientOriginalName());
			$file->move('assets/images/users', $name);
			$input['image'] = $name;
		}

		if (!empty($request->password)) {
			$input['password'] = bcrypt($request['password']);
		} else {
			$input['password'] = $data->password;
		}
		$input['is_instructor'] = 2;
		$input['role'] = 'instructor';
		$input['facebook_url'] = $request->facebook_url;
		$input['twitter_url'] = $request->twitter_url;
		$input['linkedin_url'] = $request->linkedin_url;
		$input['instructor_slug'] = str_replace(" ", "-", $input['instructor_name']);
		$data->update($input);

		return redirect()->route('instructor.index')->with('message', 'Instructor updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		// which instructor is deleted then all courses of that instructor will be deleted
		$instructor = User::findOrFail($id);
		$courses = Course::where('user_id', $instructor->id)->get();
		foreach ($courses as $course) {
			$course->delete();
		}
		$instructor->delete();


		return redirect()->route('instructor.index')->with('message', 'Instructor has been deleted successfully');
	}


	public function status($id1, $id2)
	{
		$data = User::findOrFail($id1);
		$data->status = $id2;
		$data->update();

		return redirect()->route('instructor.index')->with('message', 'Status has been updated successfully');
	}


	public function details($id)
	{
		$data['instructor'] = User::findOrFail($id);

		return view('backend.instructor.details', $data);
	}



	public function withdraws()
	{
		$data['title'] = "Withdraws List";
		$data['withdraws'] = Withdraw::where('status', 'completed')->latest()->get();

		return view('backend.instructor.withdraws', $data);
	}

	public function withdrawRejectList()
	{
		$data['title'] = "Reject Withdraws";
		$data['withdraws'] = Withdraw::where('status', 'reject')->latest()->get();


		return view('backend.instructor.withdraw_reject', $data);
	}

	//*** JSON Request
	public function withdrawList()
	{
		$data['title'] = "Withdraws list";
		$data['withdraws'] = Withdraw::where('status', 'pending')->latest()->get();

		return view('backend.instructor.withdraw_list', $data);
	}


	//*** GET Request       
	public function withdrawDetails($id)
	{
		$data['withdraw'] = Withdraw::findOrFail($id);

		return view('backend.instructor.withdraw-details', $data);
	}

	//*** GET Request   
	public function accept($id)
	{
		$withdraw = Withdraw::findOrFail($id);

		if ($withdraw->status == 'pending') {
			$withdraw->status = 'completed';
			$withdraw->update();
		}

		return redirect()->route('withdraw.index')->with('message', 'Withdraw accepted');
	}

	//*** GET Request   
	public function reject($id)
	{
		$withdraw = Withdraw::findOrFail($id);

		if ($withdraw->status == 'pending') {
			$withdraw->status = 'reject';
			$withdraw->update();
		}

		return redirect()->route('withdraw.reject.book.list')->with('message', 'Withdraw reject');
	}

	// book functionality

	public function bookComplete()
	{
		$data['title'] = "Withdraws List";
		$data['withdraws'] = BookWithdraw::where('status', 'completed')->latest()->get();

		return view('backend.instructor.book.c_withdraw', $data);
	}

	public function bookWithdrawReject()
	{
		$data['title'] = "Reject Withdraws";
		$data['withdraws'] = BookWithdraw::where('status', 'reject')->latest()->get();


		return view('backend.instructor.book.withdraw_reject', $data);
	}

	//*** JSON Request
	public function pendingWithdraw()
	{
		$data['title'] = "Withdraws list";
		$data['withdraws'] = BookWithdraw::where('status', 'pending')->latest()->get();

		return view('backend.instructor.book.withdraw_list', $data);
	}

	public function bookAccept($id)
	{
		$withdraw = BookWithdraw::findOrFail($id);

		if ($withdraw->status == 'pending') {
			$withdraw->status = 'completed';
			$withdraw->update();
		}

		return redirect()->route('withdraw.book.index')->with('message', 'Withdraw accepted');
	}

	//*** GET Request   
	public function bookReject($id)
	{
		$withdraw = BookWithdraw::findOrFail($id);

		if ($withdraw->status == 'pending') {
			$withdraw->status = 'reject';
			$withdraw->update();
		}

		return redirect()->route('withdraw.reject.book.list')->with('message', 'Withdraw reject');
	}
}
