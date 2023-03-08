<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Course;
use App\Models\Admin\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Student\EnrolledCourse;


class OrderController extends Controller
{
    public $curr;

    public function __construct()
    {
        $this->curr = DB::table('currencies')->where('register_id', 0)->where('is_default', '=', 1)->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Purchase History";
        $data['orders'] = Order::where('register_id', 0)->orderBy('id', 'desc')->paginate(10);

        // search order by order_number
        if (request()->search) {
            $data['orders'] = Order::where('register_id', 0)->where('order_number', 'LIKE', '%' . request()->search . '%')->orderBy('id', 'DESC')->paginate(10);
        }
        return view('backend.order.index', $data);
    }

    // search order by order_number
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $data['title'] = 'Order Search';
        $data['orders'] = Order::where('register_id', 0)->where('order_number', 'LIKE', '%' . request()->search . '%')->orderBy('id', 'DESC')->paginate(10);

        return view('backend.order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrfail(intval($id));
        $order->delete();

        return redirect()->back()->with('message', 'Purchase history has been deleted successfully');
    }

    public function purchaseDetails($id)
    {
        $data['order'] = Order::findOrfail($id);
        $data['course'] = Course::where('id', $data['order']->course_id)->first();

        return view('backend.order.details', $data);
    }

    //*** GET Request Status
    public function status($id1, $id2)
    {
        $data = Order::findOrFail($id1);
        $data->status = $id2;
        $data->update();

        return redirect()->route('purchase.index')->with('message', 'Status has been updated successfully');
    }



    public function enrollCourse()
    {
        $data['title'] = "Enrolled Courses";
        $data['enrolled_courses'] = EnrolledCourse::latest()->orderBy('id', 'DESC')->paginate(20);

        // search order by order_number or user name
        if (request()->search) {
            $data['enrolled_courses'] = EnrolledCourse::whereHas('user', function ($query) {
                $query->where('name', 'LIKE', '%' . request()->search . '%');
            })->paginate(10);
        }
        return view('backend.order.enrolled_courses', $data);
    }

    public function searchEnrolledCourse(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $data['title'] = 'Enrolled Course Search';
        $data['enrolled_courses'] = EnrolledCourse::whereHas('user', function ($query) {
            $query->where('name', 'LIKE', '%' . request()->search . '%');
        })->paginate(10);
        return view('backend.order.enrolled_courses', $data);
    }


    public function createEnrolledCourse()
    {
        $data['title'] = 'Enrolled Course Create';

        return view('backend.order.add_enrolled_courses', $data);
    }


    public function storeEnrollCourse(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'user_id' => 'required',
            'course_id' => 'required',
            'status' => 'required',
        ]);

        $enroll = new EnrolledCourse();
        $enroll->user_id = $request->user_id;
        $enroll->course_id = $request->course_id;
        $enroll->order_id = $request->order_id;
        $enroll->status = $request->status;

        $enroll->save();
        return redirect()->route('course.enroll')->with('success', 'Course Enrolled Successfully');
    }
}
