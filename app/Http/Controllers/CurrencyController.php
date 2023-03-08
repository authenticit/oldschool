<?php

namespace App\Http\Controllers;

use App\Models\Admin\Currency;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CurrencyController extends Controller
{
    public function dataTables()
    {
         $datas = Currency::where('register_id',0)->orderBy('id')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
        ->addColumn('action', function(Currency $data) {

            $delete = $data->id == 1 ? '':'<a href="javascript:;" data-href="' . route('currency.delete',$data->id) . '" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm btn-rounded"><i class="fas fa-trash-alt"></i></a>';
            $default = $data->is_default == 1 ? '<a href="javascript:;" class="btn btn-primary btn-sm btn-rounded"><i class="fa fa-check"></i> Default</a>' : '<a class="status btn btn-primary btn-sm btn-rounded" href="javascript:;" data-href="' . route('currency.status',['id1'=>$data->id,'id2'=>1]) . '">'.__('Set Default').'</a>';
            return '<div class="actions-btn"><a href="' . route('currency.edit',$data->id) . '" class="btn btn-primary btn-sm btn-rounded"> <i class="fas fa-edit"></i>Edit</a>'.$delete.$default.'</div>';
        })
        ->rawColumns(['action'])
        ->toJson(); //--- Returning Json Data To Client Side
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Currencies';

        return view('backend.currency.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create Currency';

        return view('backend.currency.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //--- Logic Section
        $data = new Currency();
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        return redirect()->route('currency.index')->with('message', 'New Data is added successfully');
        //--- Redirect Section Ends
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "Edit currency";
        $data['currency'] = Currency::findOrFail($id);
        
        return view('backend.currency.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Currency::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return redirect()->route('currency.index')->with('message', 'New Data is added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id == 1)
        {
            return __("You cant't remove the main currency.");
        }

        $data = Currency::findOrFail($id);
        if($data->is_default == 1) {
            Currency::where('id','=',1)->update(['is_default' => 1]);
        }

        $data->delete();
        return redirect()->back()->with('message', 'Data deleted successfully');
    }

    public function status($id1, $id2)
    {
        $data = Currency::findOrFail($id1);
        $data->is_default = $id2;
        $data->update();
        $data = Currency::where('id','!=',$id1)->where('register_id',0)->update(['is_default' => 0]);

        return redirect()->back()->with('message', 'Status updated successfully');
    }
}
