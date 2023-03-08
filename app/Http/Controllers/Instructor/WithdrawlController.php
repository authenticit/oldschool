<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Admin\Withdraw;
use App\Models\Student\EnrolledCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawlController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function complete_withdrawl_list()
    {
        $data['title'] = 'Withdrawl List';
        $data['withdrawls'] = Withdraw::where('user_id', Auth::user()->id)->where('status', 'completed')->latest()->get();

        return view('frontend.instructor.complete_withdrawl_list', $data);
    }

    public function withdrawl_list()
    {
        $data['title'] = 'Withdrawl List';
        $data['withdrawls'] = Withdraw::where('user_id', Auth::user()->id)->where('status', 'pending')->latest()->get();

        return view('frontend.instructor.withdrawl_list', $data);
    }

    public function withdrawl_create()
    {

        $total = 0;
        $orders = EnrolledCourse::join('courses', 'enrolled_courses.course_id', '=', 'courses.id')->where('courses.user_id', Auth::user()->id)->get();

        foreach ($orders as $order) {
            $subtotal = ($order->price * 0.7);
            $total += $subtotal;
        }

        $w_total = 0;

        $withdrawls = Withdraw::where('user_id', Auth::user()->id)->where('status', 'pending')->get();
        foreach ($withdrawls as $withdrawl) {
            $subtotal = $withdrawl->payable;
            $w_total += $subtotal;
        }


        $data['pending_amount'] = $w_total;

        $w_amount = 0;
        $c_withdrawl = Withdraw::where('user_id', Auth::user()->id)->where('status', 'completed')->get();
        foreach ($c_withdrawl as $c_withdraw) {
            $subtotal = $c_withdraw->payable;
            $w_amount += $subtotal;
        }

        $data['new_balance'] = $w_amount;

        $data['balance'] = $total - $w_total - $w_amount;
        $data['title'] = 'Withdrawl Request';
        $data['orders'] = EnrolledCourse::join('courses', 'enrolled_courses.course_id', '=', 'courses.id')->where('courses.user_id', Auth::user()->id)->get();
        $data['withdrawls'] = Withdraw::where('status', 'pending')->get();

        return view('frontend.instructor.withdrawl_create', $data);
    }


    public function withdrawl_store(Request $request)
    {
        $total = 0;
        $orders = EnrolledCourse::join('courses', 'enrolled_courses.course_id', '=', 'courses.id')->where('courses.user_id', Auth::user()->id)->get();

        foreach ($orders as $order) {
            $subtotal = ($order->price * 0.7);
            $total += $subtotal;
        }


        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        $withdraw = new Withdraw();
        $withdraw->user_id = Auth::user()->id;
        $withdraw->amount = $request->amount;
        $withdraw->payable = $request->payable;
        $withdraw->bkash_no = $request->bkash_no;
        $withdraw->nogod_no = $request->nogod_no;
        $withdraw->rocket_no = $request->rocket_no;
        $withdraw->account_no = $request->account_no;
        $withdraw->account_name = $request->account_name;
        $withdraw->account_branch = $request->account_branch;
        if ($withdraw->bkash_no) {
            $withdraw->type = 'Bkash';
        } else if ($withdraw->nogod_no) {
            $withdraw->type = 'Nogod';
        } else if ($withdraw->rocket_no) {
            $withdraw->type = 'Rocket';
        } else if ($withdraw->account_no) {
            $withdraw->type = 'Account';
        } else {
            $withdraw->type = 'Other';
        }
        $withdraw->status = 'pending';


        if ($withdraw->amount > $total) {
            return redirect()->back();
        } else {
            $withdraw->save();
        }

        return redirect()->route('withdraw.instructor.list')->with('message', 'Your request has been saved wait admin approvel');
    }
}
