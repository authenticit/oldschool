<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Page;
use Illuminate\Http\Request;
use Datatables;

class PageController extends Controller
{
   //*** JSON Request
    public function dataTables()
    {
        $datas = Page::where('register_id', 0)->orderBy('id','desc')->get();
        //--- Integrating This Collection Into DataTables
        return Datatables::of($datas)
        ->editColumn('status', function(Page $data) {
            $status      = $data->status == 1 ? __('Activated') : __('Deativated');
            $status_sign = $data->status == 1 ? 'success'   : 'danger';
            return '<div class="btn-group mb-1">
            <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                '.$status .'
            </button>
            <div class="dropdown-menu" x-placement="bottom-start">
                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin-page-status',['id1' => $data->id, 'id2' => 1]).'">'.__("Active").'</a>
                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin-page-status',['id1' => $data->id, 'id2' => 0]).'">'.__("Deativate").'</a>
            </div>
            </div>';
        })
        ->addColumn('action', function(Page $data) {
            return '<div class="actions-btn"><a href="' . route('admin-page-edit',$data->id) . '" class="btn btn-primary btn-sm btn-rounded">
            <i class="fas fa-edit"></i> '.__("Edit").'
            </a><button type="button" data-toggle="modal" data-target="#deleteModal"  data-href="' . route('admin-page-delete',$data->id) . '" class="btn btn-danger btn-sm btn-rounded">
            <i class="fas fa-trash"></i>
            </button></div>';
        })
        ->rawColumns(['status','action'])
        ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index()
    {
        $data['title'] = "Other page";

        return view('backend.page.index', $data);
    }

    public function create()
    {
        $data['title'] = "Create Other page";

        return view('backend.page.create', $data);
    }

    public function store(Request $request)
    {
        if(Page::where('slug',$request->slug)->where('register_id',0)->exists()){
          return response()->json(array('errors' => [0 =>'This slug has already been taken.']));
        }

        $data = new Page();
        $input = $request->all();
        $common_rep   = ["value", "{", "}", "[","]",":","\""];
        $metatag = str_replace($common_rep, '', $request->meta_tag);
        if ($metatag)
        {
            $input['meta_tag'] = $metatag;
        }
        if ($request->secheck == "")
        {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
        }

        $data->fill($input)->save();
        return redirect()->route('page.index')->with('message', 'New Data is added successfully');
    }

    public function edit($id)
    {
        $data['title'] = "Create Other page";
        $data['setting'] = Page::findOrFail($id);

        return view('backend.page.edit', $data);
    }

    public function update(Request $request, $id)
    {
        if(Page::where('slug',$request->slug)->where('id','!=',$id)->where('register_id',0)->exists()){
          return response()->json(array('errors' => [0 =>'This slug has already been taken.']));
        }

        $data = Page::findOrFail($id);
        $input = $request->all();
        $common_rep   = ["value", "{", "}", "[","]",":","\""];
        $metatag = str_replace($common_rep, '', $request->meta_tag);
        if ($metatag)
        {
            $input['meta_tag'] = $metatag;
        }
        else {
            $input['meta_tag'] = null;
        }
        if ($request->secheck == "")
        {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
        }
        $data->update($input);
        $msg = 'Data Updated Successfully.'.'<a href="'.route("admin-page-index").'">View Page Lists</a>';
        return response()->json($msg);
    }
    
      //*** GET Request Header
      public function status($id1,$id2)
        {

            $data = Page::findOrFail($id1);
            $data->status = $id2;
            $data->update();
            $mgs = __('Data Update Successfully.');
            return response()->json($mgs);
        }


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Page::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
