<?php

namespace App\Http\Controllers;

use App\SendCode;
use App\Models\User;
use App\Mail\SendOtp;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\Admin\Blog;
use App\Models\Admin\Book;
use App\Models\Admin\Order;
use Illuminate\Support\Str;
use App\Models\Admin\Artist;
use App\Models\Admin\Course;
use Illuminate\Http\Request;
use App\Models\Admin\ArtWork;
use App\Models\Admin\Category;
use App\Models\Student\BookOrder;
use App\Models\Admin\BookCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Student\EnrolledCourse;

class FrontController extends Controller
{
    public function index()
    {
        $data['title'] = "Gains School | Home";
        $data['categories'] = Category::latest()->get();
        $data['instructors'] = User::where('role', 'instructor')->latest()->get();
        $data['books'] = Book::latest()->get();
        $data['blogs'] = Blog::latest()->get();
        $data['courses'] = Course::where('is_top', 0)->get();
        $data['top_courses'] = Course::where('is_top', 1)->get();
        $data['artists'] = Artist::orderBy('dob', 'desc')->get();
        $data['art_works'] = ArtWork::latest()->get();

        $data['search_course'] = Course::query();
        if (request('term')) {
            $data['search_course']->where('title', 'Like', '%' . request('term') . '%');
        }


        return view('welcome', $data);
    }

    public function searchCourse()
    {
        $data['title'] = "Gains School | Search Course";
        $data['categories'] = Category::latest()->get();
        $data['instructors'] = User::where('role', 'instructor')->latest()->get();
        $data['books'] = Book::latest()->get();
        $data['blogs'] = Blog::latest()->get();
        $data['courses'] = Course::where('is_top', 0)->get();
        $data['search_course'] = Course::where('title', 'Like', '%' . request('term') . '%')->get();
        return view('frontend.search', $data);
    }



    // instructor single page
    public function instructor($id)
    {
        $data['title'] = "Gains School | Instructor";
        $data['instructor'] = User::find($id);
        $data['categories'] = Category::latest()->get();
        $data['courses'] = Course::where('instructor_id', $id)->get();

        return view('frontend.instructor_detail', $data);
    }

    // book single page
    public function book($id)
    {
        $data['title'] = "Gains School | Book";
        $data['book'] = Book::find($id);
        $data['categories'] = BookCategory::latest()->get();


        return view('frontend.book_details', $data);
    }

    // blog single page
    public function blog($id)
    {
        $data['title'] = "Gains School | Blog";
        $data['blog'] = Blog::find($id);
        $data['categories'] = Category::latest()->get();

        return view('frontend.blog_details', $data);
    }

    // about page
    public function about()
    {
        $data['title'] = "Gains School | About";
        $data['categories'] = Category::latest()->get();

        return view('frontend.about', $data);
    }

    // career page
    public function career()
    {
        $data['title'] = "Gains School | Career";
        $data['categories'] = Category::latest()->get();

        return view('frontend.career', $data);
    }

    // press page
    public function press()
    {
        $data['title'] = "Gains School | Press";
        $data['categories'] = Category::latest()->get();

        return view('frontend.press', $data);
    }

    // help page
    public function help()
    {
        $data['title'] = "Gains School | Help";
        $data['categories'] = Category::latest()->get();

        return view('frontend.help', $data);
    }

    // contact page
    public function contact()
    {
        $data['title'] = "Gains School | Contact";
        $data['categories'] = Category::latest()->get();

        return view('frontend.contact_us', $data);
    }

    // privacy page
    public function privacy()
    {
        $data['title'] = "Gains School | Privacy policy";
        $data['categories'] = Category::latest()->get();

        return view('frontend.footer.policy', $data);
    }

    // terms and condition
    public function terms()
    {
        $data['title'] = "Gains School | Terms and conditions";
        $data['categories'] = Category::latest()->get();

        return view('frontend.footer.terms', $data);
    }


    public function register()
    {
        $data['title'] = "Register Page";

        return view('frontend.register', $data);
    }

    // send otp to phone number
    public function signup(Request $request)
    {

        $request->validate([
            'email' => 'required',
        ]);

        $email = $request->email;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $email)->first();
            if ($user) {
                return redirect('/student/signin')->with('error', 'Phone number already exists');
            } else {
                $user = new User;
                $code = rand(0, 9999);
                if ($code == "error") {
                    return redirect('student/register')->with('error', 'Something went wrong');
                }
                $user->email = $email;
                $user->role = 'user';
                $user->code = $code;
                $user->save();


                $mail_data = [
                    'recipient' => $user->email,
                    'fromEmail' => 'support@gainsschool.com',
                    'fromName' => 'Gainsschool',
                    'fromMessage' => 'Your Verification Code is: ' . $code
                ];

                Mail::send('frontend.mail_otp', $mail_data, function ($message) use ($mail_data) {
                    $message->to($mail_data['recipient'])->from($mail_data['fromEmail'], $mail_data['fromName'])->subject($mail_data['fromMessage']);
                });

                // Mail::to($request->email)->send(new SendOtp($data));
                session()->put('user', $user);
                return redirect('/student/otp');
            }
        } else {
            $user = User::where('phone', $email)->first();
            if ($user) {
                return redirect('/student/signin')->with('error', 'Phone number already exists');
            } else {
                $user = new User;
                $code = SendCode::sendCode($email);
                if ($code == "error") {
                    return redirect('student/register')->with('error', 'Something went wrong');
                }

                $user->phone = $email;
                $user->role = 'user';
                $user->code = $code;
                $user->save();
                $data = array(
                    'email'     =>  $request->email,
                    'code'     =>  $code,
                );

                // Mail::to($request->email)->send(new SendOtp($data));
                session()->put('user', $user);
                return redirect('/student/otp');
            }
        }
    }



    // check user otp and save otp same in session
    public function checkotp()
    {
        $user = User::find(session()->get('user')->id);
        if (isset($_POST['code'])) {
            $otp = $_POST['code'];
            if ($user->code == $otp) {
                $user->code = $otp;
                $user->save();
                session()->put('user', $user);
                return redirect('student/register/info');
            } else {
                return redirect('/student/register')->with('error', 'Invalid OTP');
            }
        }

        return view('frontend.otp');
    }

    public function registerInfo()
    {
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $user = session()->get('user');
            $user->name = $name;
            $user->password = bcrypt($password);
            $user->save();
            Auth::login($user);
            session()->put('user', $user);
            return redirect('/');
        }

        return view('frontend.register-info');
    }

    // signin page
    public function signin()
    {
        $data['title'] = "Gains School | Signin";
        return view('frontend.signin', $data);
    }

    // custome signin page
    public function customeLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);
        // $creadintials = $request->only('phone', 'password');
        // if(Auth::attempt($creadintials)){
        //     return redirect('student/profile');
        // }
        // else{
        //     return redirect('/student/signin')->with('error', 'Invalid phone number or password');
        // }   

        $user = User::where('phone', $request->phone)->orWhere('email', $request->phone)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect('student/profile');
            } else {
                return redirect('/student/signin')->with('error', 'Invalid phone number or password');
            }
        } else {
            return redirect('/student/signin')->with('error', 'Invalid phone number or password');
        }
    }




    // logout page
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    // profile page
    public function profile()
    {
        $data['title'] = "Gains School | Profile";
        $data['categories'] = Category::latest()->get();
        $data['user'] = Auth::user();
        // which student has which course
        $data['orders'] = Order::where('user_id', Auth::user()->id)->get();
        $data['certify'] = EnrolledCourse::whereUserId($data['user']->id)->whereCertificate(1)->pluck('course_id');
        $data['courses'] = EnrolledCourse::whereUserId($data['user']->id)->pluck('course_id');
        $data['enrolled_courses'] = Course::where('register_id', 0)->where('status', '=', 1)->whereIn('id', $data['courses'])->latest('id')->paginate(10);

        $data['e_courses'] = EnrolledCourse::where('user_id', $data['user']->id)->get();
        return view('frontend.profile', $data);
    }

    // edit profile page
    public function editProfile()
    {
        $data['title'] = "Gains School | Edit Profile";
        $data['categories'] = Category::latest()->get();
        $data['user'] = Auth::user();

        return view('frontend.edit_profile', $data);
    }

    // update profile page
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
            'bio' => 'nullable',
            'facebooklink' => 'nullable',
            'twitterlink' => 'nullable',
            'linkedinlink' => 'nullable',
            'image' => 'nullable',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->bio = $request->bio;
        $user->facebook_url = $request->facebooklink;
        $user->twitter_url = $request->twitterlink;
        $user->linkedin_url = $request->linkedinlink;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/student/profile');
            $image->move($destinationPath, $image_name);
            $user->image = $image_name;
        }

        $user->save();
        return redirect('/student/profile')->with('success', 'Profile updated successfully');
    }

    // course_detail page
    public function course_detail($slug)
    {
        $data['title'] = "Gains School | Course Detail";
        $data['course'] = Course::firstWhere('slug', $slug);
        // which section has which lessons
        $data['sections'] = Section::where('course_id', $data['course']->id)->get();
        $data['categories'] = Category::latest()->get();

        // which category has which course
        $data['courses'] = Course::where('category_id', $data['course']->category_id)->where('id', '!=', $data['course']->id)->latest()->get();

        if ($data['course'] == null) {
            return redirect('/');
        }

        $data['categories'] = Category::latest()->get();
        if (Auth::check() && Auth::user()->role == 'user') {
            $data['order'] = Order::where('user_id', Auth::user()->id)->where('course_id', $data['course']->id)->where('status', 'Completed')->first();
        }

        $data['enrolled'] = EnrolledCourse::where('course_id', $data['course']->id)->count();

        return view('frontend.course', $data);
    }

    // which category has which course
    public function category_course($id)
    {

        $data['title'] = "Gains School | Category Course";
        $data['courses'] = Course::where('category_id', $id)->get();
        $data['categories'] = Category::latest()->get();

        // which category has which course
        $data['category'] = Category::firstWhere('id', $id);
        return view('frontend.category_course', $data);
    }




    // which instructor has which course
    public function instructor_course($id)
    {
        $data['title'] = "Gains School | Instructor Course";
        $data['courses'] = Course::where('instructor_id', $id)->get();
        $data['categories'] = Category::latest()->get();

        return view('frontend.instructor_course', $data);
    }

    public function footerBlog()
    {
        $data['title'] = "Gains School | Blogs";
        $data['blogs'] = Blog::latest()->paginate(10);
        $data['categories'] = Category::get();

        return view('frontend.footer-blog', $data);
    }


    // become instructor page
    public function becomeInstructor()
    {
        $data['title'] = "Gains School | Become Instructor";
        $data['categories'] = Category::latest()->get();

        return view('frontend.become_instructor', $data);
    }


    public function becomeInstructorForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'address' => 'required',
            'bio' => 'nullable',
            'facebooklink' => 'nullable',
            'twitterlink' => 'nullable',
            'linkedinlink' => 'nullable',
            'image' => 'nullable',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->bio = $request->bio;
        $user->facebook_url = $request->facebooklink;
        $user->twitter_url = $request->twitterlink;
        $user->linkedin_url = $request->linkedinlink;
        $user->role = 'instructor';
        $user->is_instructor = 1;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/instructor/profile');
            $image->move($destinationPath, $image_name);
            $user->image = $image_name;
        }
        $user->save();
        return redirect('/')->with('success', 'Instructor added successfully');
    }

    public function changePassword()
    {
        $data['title'] = "Gains School | Change Password";
        $data['categories'] = Category::latest()->get();

        return view('frontend.change_password', $data);
    }

    public function changePasswordStore(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            return redirect()->route('student-signin')->with('success', 'Password changed successfully');
        } else {
            return redirect()->back()->with('error', 'Old password does not match');
        }
    }

    public function forgetPassword()
    {
        $data['title'] = "Gains School | Forget Password";
        $data['categories'] = Category::latest()->get();

        return view('frontend.forget_password', $data);
    }

    public function forgetPasswordStore(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $email = $request->email;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $code = rand(0, 999999);
                $user->password = Hash::make($code);
                $user->save();

                $mail_data = [
                    'recipient' => $user->email,
                    'fromEmail' => 'support@gainsschool.com',
                    'fromName' => 'Gainsschool',
                    'fromMessage' => 'Your Temporary Password is: ' . $code . 'please login and change your password'
                ];

                Mail::send('frontend.mail_otp', $mail_data, function ($message) use ($mail_data) {
                    $message->to($mail_data['recipient'])->from($mail_data['fromEmail'], $mail_data['fromName'])->subject($mail_data['fromMessage']);
                });
                return redirect()->route('student.waiting')->with('success', 'Password changed successfully');
                
            } else {
                return redirect('/student/signin')->with('error', 'Email does not exists');
            }
        } else {
            $user = User::where('phone', $email)->first();
            if ($user) {
                $code = SendCode::sendPass($email);
                if ($code == "error") {
                    return redirect('student/register')->with('error', 'Something went wrong');
                }
                $user->password = Hash::make($code);
                $user->save();
                $data = array(
                    'email'     =>  $request->email,
                    'code'     =>  $code,
                );
                return redirect()->route('student.waiting')->with('success', 'Password changed successfully');
            } else {
                return redirect('/student/signin')->with('error', 'Phone does not exists');
            }
        }
    }

    public function waiting()
    {
        $data['title'] = "Gains School | Waiting";
        $data['categories'] = Category::latest()->get();

        return view('frontend.waiting', $data);
    }
}
