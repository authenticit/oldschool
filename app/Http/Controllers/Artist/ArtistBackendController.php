<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin\Artist;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\Category;   
use Intervention\Image\Facades\Image;
use App\Models\Admin\ArtWork;
use App\Models\ArtWorkOrder;

class ArtistBackendController extends Controller
{
    public function register()
    {
        $data['title'] = 'Artist Register';
        return view('frontend.artist.register', $data);
    }

    // signup artist 
    public function signup(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        // how to check if phone number already exists in users table
        $user = User::where('phone', $request->phone)->first();
        $artist = Artist::where('phone', $request->phone)->first();

        if($user){
            $artist2 = new Artist();
            $artist2->phone = $request->phone;
            $artist2->role = 'artist';
            $artist2->password = Hash::make($request->password);
            $artist2->save();

            $u = new User();
            $u->phone = $request->phone;
            $u->role = 'artist';
            $u->password = Hash::make($request->password);
            $u->save();

            Auth::login($user);
            return redirect()->route('artist.verify')->with('success', 'Artist Register Successfully');
        
        }
        
        if($artist){
            Auth::login($artist);
            return redirect()->route('artist.verify')->with('success', 'Artist Register Successfully');
        }
        else{
            $artist = new Artist();
            $artist->phone = $request->phone;
            $artist->role = 'artist';
            $artist->password = Hash::make($request->password);
            $artist->save();

            $u = new User();
            $u->phone = $request->phone;
            $u->role = 'artist';
            $u->password = Hash::make($request->password);
            $u->save();
        }

        return redirect()->route('artist.signin')->with('success', 'Artist signup successfully');
    }




    public function login()
    {
        $data['title'] = 'Artist Login';

        return view('frontend.artist.signin', $data);
    }

    // signin artist
    public function artistLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        // find the user by phone number is exist or not
        $user = User::where('phone', $request->phone)->where('role', 'artist')->first();
        if ($user) {   
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('artist.dashboard')->with('success', 'Artist Login Successfully');
            } else {
                return redirect()->back()->with('error', 'Password is incorrect');
            }
            Auth::login($user);
            return redirect()->route('artist.verify');
        } else {
            return redirect()->route('artist.signup')->with('error', 'Artist not found');
        }
    }


    // artist checkouts


    public function artistVerification()
    {
        $data['title'] = 'Artist Verification';

        return view('frontend.artist.verify', $data);
    }

    // artist dashboard
    public function artistDashboard()
    {
        $data['categories'] = Category::latest()->get();
        $data['title'] = 'Artist Dashboard';
        $data['artists'] = Artist::orderBy('dob', 'ASC')->get();
        $data['recent_artists'] = Artist::latest()->orderBy('id', 'DESC')->get();
        

       
        return view('frontend.artist.dashboard', $data);
    }


    // profile page
    public function profile ()
    {
        $data['title'] = "Gains School | Profile";
        $data['categories'] = Category::latest()->get();
        $data['user'] = Auth::user();
        $data['artist'] = Artist::where('phone', Auth::user()->phone)->first();
        // which artist has which art work
        $data['art_works'] = ArtWork::where('artist_id', $data['artist']->id)->get();
        // $data['order_artworks'] = ArtWorkOrder::where('artwork_id', $data['artist']->id)->get();
        // foreach($data['art_works'] as $art_work){
        //     // $data['order_artworks'] = ArtWorkOrder::where('artwork_id', $art_work->id)->get();
        //     // get artist id from art_work
        //     $data['artist_id'] = $art_work->artist_id;
        //     $data['order_artworks'] = ArtWorkOrder::where('artist_id', Auth::user()->id)->get();
           
        // }
        $data['order_artworks'] = ArtWorkOrder::where('artist_id', $data['artist']->id)->get();
        
        

        

        return view('frontend.artist.profile', $data);
    }

    // edit profile page
    public function editProfile ($id)
    {
        $data['title'] = "Gains School | Edit Profile";
        $data['categories'] = Category::latest()->get();
        $data['user'] = Auth::user();
        // $data['artist'] = Artist::where('phone', Auth::user()->phone)->first();
        $data['artist'] = Artist::find($id);

        // which artist has which art work
        $data['art_works'] = ArtWork::where('artist_id', $data['artist']->id)->get();
        
        
        return view('frontend.artist.edit_profile', $data);
    }

    // update profile page
    public function updateProfile (Request $request)
    {
        $request->validate([
            'name' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'bio' => 'nullable',
            'facebooklink' => 'nullable',
            'twitterlink' => 'nullable',
            'linkedinlink' => 'nullable',
            'image' => 'nullable',
            'details'=> 'nullable',
            'theme' => 'nullable',
            'future_plan' => 'nullable',
            'dob'=> 'nullable',
            'nationality'=> 'nullable',
            'education'=> 'nullable',
            'notable_work'=> 'nullable',
            'awards'=> 'nullable',
            'gender'=> 'nullable',
            'address'=> 'nullable',
            'is_public'=> 'nullable',

        ]);
        
        $userID = Auth::user()->id;
        $user = User::find($userID);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->bio = $request->bio;
        $user->address = $request->address;
        $user->facebook_url = $request->facebooklink;
        $user->twitter_url = $request->twitterlink;
        $user->linkedin_url = $request->linkedinlink;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/artist/profile');
            $image->move($destinationPath, $image_name);
            $user->image = $image_name;
        }
        
        $user->save();


        $files = [];
        if($request->hasfile('art_work'))
         {
            foreach($request->file('art_work') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                // image resize
                $destinationPath = public_path('files');
                $img = Image::make($file->path());
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($destinationPath.'/'.$name);

                $file->move(public_path('files'), $name);  
                $files[] = $name;  
            }
         }

        // update profile save to artist table
        $artist = Artist::where('phone', $user->phone)->first();
       
        $artist->name = $user->name;
        $artist->email = $user->email;
        $artist->phone = $user->phone;
        $artist->address = $user->address;
        $artist->details = $request->details;
        $artist->theme = $request->theme;
        $artist->future_plan = $request->future_plan;
        $artist->bio = $user->bio;
        $artist->facebook_url = $user->facebook_url;
        $artist->twitter_url = $user->twitter_url;
        $artist->linkedin_url = $user->linkedin_url;
        $artist->dob = $request->dob;
        $artist->nationality = $request->nationality;
        $artist->education = $request->education;
        $artist->notable_work = $request->notable_work;
        $artist->awards = $request->awards;
        $artist->gender = $request->gender;
        $artist->image = $user->image;
        $artist->art_work1 = json_encode($files);

        
        if ($request->is_public == 1) {
            $artist->is_public = 1;
        } else {
            $artist->is_public = 0;
        }

        $artist->save();
        

        return redirect('/artist/profile')->with('success', 'Profile updated successfully');
    }

    public function artistDetails($id)
    {
        $data['title'] = 'Artist Details';
        $data['categories'] = Category::latest()->get();
        $data['artist'] = Artist::find($id);
        $data['recent_artists'] = Artist::latest()->orderBy('id', 'DESC')->get();
        $data['artists'] = Artist::latest()->orderBy('id', 'ASC')->get();
        // which artist has which art work
        $data['art_works'] = ArtWork::where('artist_id', $data['artist']->id)->get();

        return view('frontend.artist.artist_details', $data);
    }

    // create art work page
    public function createArtWork ()
    {
        $data['title'] = "Gains School | Create Art Work";
        $data['categories'] = Category::latest()->get();
    
        $data['artist'] = Artist::where('phone', Auth::user()->phone)->first();
        
        return view('frontend.artist.create_art_work', $data);
    }
   

    // upload art work
    public function uploadArtWork (Request $request)
    {
        $data['artist'] = Artist::where('phone', Auth::user()->phone)->first();
        $this->validate(request(), [
            'title' => 'required',
            'price' => 'nullable',
            'image' => 'nullable',
            'description' => 'nullable',
            'year' => 'nullable',
            'media' => 'nullable',
        ]);

        $art_work = new ArtWork();
        $art_work->title = $request->title;
        $art_work->price = $request->price;
        $art_work->description = $request->description;
        $art_work->year = $request->year;
        $art_work->media = $request->media;
        $art_work->artist_id = $data['artist']->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/artist/art_work');
            $image->move($destinationPath, $image_name);
            $art_work->image = $image_name;
        }

        $art_work->save();

        return redirect('/artist/profile')->with('success', 'Art work uploaded successfully');

    }

    // edit art work page
    public function editArtWork ($id)
    {
        $data['title'] = "Gains School | Edit Art Work";
        $data['categories'] = Category::latest()->get();
        $data['art_work'] = ArtWork::find($id);
        $data['artist'] = Artist::where('phone', Auth::user()->phone)->first();
        
        return view('frontend.artist.edit_art_work', $data);
    }

    // update art work
    public function updateArtWork (Request $request, $id)
    {
        $data['artist'] = Artist::where('phone', Auth::user()->phone)->first();
        $this->validate(request(), [
            'title' => 'required',
            'price' => 'nullable',
            'image' => 'nullable',
            'description' => 'nullable',
            'year' => 'nullable',
            'media' => 'nullable',
        ]);

        $art_work = ArtWork::find($id);
        $art_work->title = $request->title;
        $art_work->price = $request->price;
        $art_work->description = $request->description;
        $art_work->year = $request->year;
        $art_work->media = $request->media;
        $art_work->artist_id = $data['artist']->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/artist/art_work');
            $image->move($destinationPath, $image_name);
            $art_work->image = $image_name;
        }

        $art_work->save();

        return redirect('/artist/profile')->with('success', 'Art work updated successfully');

    }

    // artwork details
    public function artWorkDetails ($id)
    {
        $data['title'] = 'Art Work Details';
        $data['categories'] = Category::latest()->get();
        $data['art_work'] = ArtWork::find($id);
        // $data['artist'] = Artist::where('phone', Auth::user()->phone)->first();
        // $data['recent_artists'] = Artist::latest()->orderBy('id', 'DESC')->get();
        // $data['artists'] = Artist::latest()->orderBy('id', 'ASC')->get();
        // // which artist has which art work
        // $data['art_works'] = ArtWork::where('artist_id', $data['artist']->id)->get();

        return view('frontend.artist.artwork_details', $data);
    }

    public function deleteArtWork ($id)
    {
        $art_work = ArtWork::find($id);
        $art_work->delete();

        return redirect('/artist/profile')->with('success', 'Art work deleted successfully');
    }

    public function artworkGallery()
    {
        $data['title'] = 'Art Work Gallery';
        $data['categories'] = Category::latest()->get();
        $data['artworks'] = ArtWork::latest()->get();
        $data['artists'] = Artist::latest()->get();

        return view('frontend.artist.artworks', $data);
    }


}
