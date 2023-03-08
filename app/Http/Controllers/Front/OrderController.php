<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Course;
use App\Models\Admin\Order;
use App\Models\Student\EnrolledCourse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addOrder(Request $request, $course_id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $enrolled = EnrolledCourse::where('user_id', $user->id)->where('course_id', $course_id)->first();
        $course = Course::where('id', $course_id)->first();

        if ($enrolled) {
            // return redirect()->route('student-course-curriculum-lesson', $course->lessons->first()->id);
            // if course is already enrolled then redirect to course curriculum
            return redirect()->route('student-course-curriculum-lesson', $course->id);
        } else {
            $check = Order::where('course_id', $course_id)->where('user_id', Auth::user()->id)->first();
            if ($check) {
                return redirect()->route('frontend.checkout', $check->order_number);
            } else {
                $order = new Order;
                $order->user_id = $user->id;
                $order->order_number = Str::random(4) . time();
                $order->course_id = $course->id;
                $order->status = 'Pending';
                $order->payment_status = 'Pending';
                $order->save();

                return redirect()->route('frontend.checkout', $order->order_number);
            }
        }
    }
}
