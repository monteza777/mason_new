<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Districtlodge;
use App\Lodge;
class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }
        $lodges = DistrictLodge::all();
        return view('admin.district_lodges.index',compact('lodges'));
    }

    public function create()
    {
        $lodges = \App\Lodge::get()->pluck('lodge_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.district_lodges.create',compact('lodges'));
    }

    public function store(Request $request)
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }
        $d_lodge = Districtlodge::create($request->all());
        $lodge_id = $request->input('lodges');
        if($request->input('lodges') != ''){
        Lodge::whereIn('id',$lodge_id)->update(['district_lodge_id'=> $d_lodge->id]);
        } 
        return redirect()->route('admin.district_lodges.index');
    }

    public function show($id)
    {
        if (! Gate::allows('user_view')) {
            return abort(401);
        }
        
        $d_lodges = Districtlodge::findOrFail($id);
        $lodge = \App\Lodge::where('district_lodge_id', $id)->get();

        return view('admin.district_lodges.show', compact('d_lodges','lodge'));
    }

    public function edit($id)
    {
        if (! Gate::allows('user_edit')) {
            return redirect()->route('admin.district_lodges.index');
        }
        $lodges = Districtlodge::findorFail($id);
        $c_lodges = \App\Lodge::get()->pluck('lodge_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $data = [
            'lodges'=> $lodges,
            'c_lodges'=> $c_lodges
        ];
        return view('admin.district_lodges.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $lodge = Districtlodge::findOrFail($id);
        $lodge->update($request->all());

        $lodge_id = $request->input('lodges');
        if($request->input('lodges') != ''){
        Lodge::whereIn('id',$lodge_id)->update(['district_lodge_id'=> $id]);
        }
        return redirect()->route('admin.district_lodges.index');
    }

    
    public function destroy($id)
    {
        //
    }
}
