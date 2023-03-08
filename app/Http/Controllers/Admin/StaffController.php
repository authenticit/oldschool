<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function dataTables()
    {
        $datas = Admin::where('parent_id', Auth::user()->id)->get();
        
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
        ->addColumn('role_id', function(Admin $data) {
            $role = $data->role_id == 0 ? 'No Role' : $data->staff_role->name;
            return $role;
        }) 
        ->addColumn('action', function(Admin $data) {
            return '<div class="actions-btn">
            <a href="' . route('staff.edit',$data->id) . '" class="btn btn-primary btn-sm btn-rounded">
            <i class="fas fa-edit"></i> '.__("Edit").'
            </a>
            <button type="button" data-toggle="modal" data-target="#deleteModal"  data-href="' . route('staff.delete',$data->id) . '" class="btn btn-danger btn-sm btn-rounded">
            <i class="fas fa-trash"></i>
            </button></div>';


        }) 
        ->rawColumns(['action','role_id'])
        ->toJson(); //--- Returning Json Data To Client Side
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Manage Staff';

        return view('backend.staff.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Staff Create';

        return view('backend.staff.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Admin::where('email',$request->email)->where('parent_id',1)->exists()){
            return redirect()->back()->with('error', 'This email has already been taken.');
        }
        if(Admin::where('username',$request->username)->where('parent_id',1)->exists()){
            return redirect()->back()->with('error', 'This username has already been taken.');
        }
        //--- Validation Section
        $rules = [
            'photo' => 'required|mimes:jpeg,jpg,png,svg',
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Admin();
        $input = $request->all();
        $input['parent_id'] = Auth::user()->id;
        if ($file = $request->file('photo')) 
         {      
            $name = time().str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/images/admins',$name);           
            $input['photo'] = $name;
        } 

        $input['role'] = "admin";
        $input['role_id'] = $request->role_id;
        $input['password'] = bcrypt($request['password']);
        $data->fill($input)->save();

        return redirect()->route('staff.index')->with('message', 'Staff has been created successfully');
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
        $data['title'] = 'Staff Edit';
        $data['staff'] = Admin::findOrFail($id); 

        return view('backend.staff.edit', $data);
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
        if(Admin::where('email',$request->email)->where('id','!=',$id)->where('parent_id',1)->exists()){
            return redirect()->back()->with('error', 'This email has already been taken.');
        }
        if(Admin::where('username',$request->username)->where('id','!=',$id)->where('parent_id',1)->exists()){
            return redirect()->back()->with('error', 'This username has already been taken.');
        }
        //--- Validation Section
        if($id != Auth::user()->id)
        {
            $rules =
            [
                'photo' => 'mimes:jpeg,jpg,png,svg',
                'email' => 'unique:admins,email,'.$id
            ];

            $validator = Validator::make($request->all(), $rules);
            
            if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }
            //--- Validation Section Ends
            $input = $request->all();  
            $data = Admin::findOrFail($id);        
                if ($file = $request->file('photo')) 
                {              
                    $name = time().str_replace(' ', '', $file->getClientOriginalName());
                    $file->move('assets/images/admins/',$name);
                    if($data->photo != null)
                    {
                        if (file_exists(public_path().'/assets/images/admins/'.$data->photo)) {
                            unlink(public_path().'/assets/images/admins/'.$data->photo);
                        }
                    }            
                $input['photo'] = $name;
                } 
            if($request->password == ''){
                $input['password'] = $data->password;
            }
            else{
                $input['password'] = Hash::make($request->password);
            }
            $data->update($input);
            return redirect()->route('staff.index')->with('message', 'Staff has been updated successfully');
        }
        else{
            return redirect()->route('staff.index')->with('error', 'You can not change your role');     
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id == 1)
    	{
        return "You don't have access to remove this admin";
    	}
        $data = Admin::findOrFail($id);
        //If Photo Doesn't Exist
        if($data->photo == null){
            $data->delete();
            //--- Redirect Section     
            $msg = 'Data Deleted Successfully.';
            return response()->json($msg);      
            //--- Redirect Section Ends     
        }
        //If Photo Exist
        if (file_exists(public_path().'/assets/images/admins/'.$data->photo)) {
            unlink(public_path().'/assets/images/admins/'.$data->photo);
        }
        $data->delete();
        return redirect()->route('staff.index')->with('message', 'Staff has been deleted successfully');
    }
}
