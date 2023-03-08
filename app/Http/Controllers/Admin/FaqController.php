<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;

class FaqController extends Controller
{
    public function datatables()
    {
         $datas = Faq::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
            ->editColumn('details', function(Faq $data) {
                $details = mb_strlen(strip_tags($data->details),'utf-8') > 250 ? mb_substr(strip_tags($data->details),0,250,'utf-8').'...' : strip_tags($data->details);
                return  $details;
            })
            ->addColumn('action', function(Faq $data) {
                return '<div class="actions-btn"><a href="' . route('admin-faq-edit',$data->id) . '" class="btn btn-primary btn-sm btn-rounded">
                <i class="fas fa-edit"></i> '.__("Edit").'
                </a><button type="button" data-toggle="modal" data-target="#deleteModal"  data-href="' . route('admin-faq-delete',$data->id) . '" class="btn btn-danger btn-sm btn-rounded">
                <i class="fas fa-trash"></i>
                </button></div>';
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }
    public function index()
    {
        $data['title'] = "Faq";

        return view('backend.faq.index', $data);
    }
    public function create()
    {
        $data['title'] = "Create Faq";

        return view('backend.faq.create', $data);
    }

    public function store(Request $request)
    {
        //--- Validation Section

        //--- Validation Section Ends

        //--- Logic Section
        $data = new Faq();
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        return redirect()->route('faq.index')->with('message', 'New Data is added successfully');
        //--- Redirect Section Ends
    }
    public function edit($id)
    {
        $data['title'] = "Edit Faq";
        $data['faq'] = Faq::findOrFail($id);

        return view('backend.faq.edit', $data);
    }
    public function update(Request $request, $id)
    {
        //--- Validation Section

        //--- Validation Section Ends

        //--- Logic Section
        $data = Faq::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        return redirect()->route('faq.index')->with('message', 'New Data is updated successfully');
        //--- Redirect Section Ends
    }
    public function destroy($id)
    {
        $data = Faq::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        return redirect()->route('faq.index')->with('message', 'Data is deleted successfully');
        //--- Redirect Section Ends
    }
}
