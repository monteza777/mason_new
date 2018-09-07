<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\GrandLodge;
use App\Districtlodge;
class GrandLodgesController extends Controller
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
        $lodges = GrandLodge::all();
        return view('admin.grand_lodges.index',compact('lodges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        $district_lodges = \App\Districtlodge::get()
                        ->pluck('lodge_name', 'id')
                        ->prepend(trans('quickadmin.qa_please_select'), '');
                        
        return view('admin.grand_lodges.create',compact('district_lodges'));
    }

    public function store(Request $request)
    {
        $grand_lodge = GrandLodge::create($request->all());
        //update foreign key of childs
        $district_id = $request->input('district_lodges');
        if($request->input('district_lodges') != ''){
        Districtlodge::whereIn('id',$district_id)->update(['grand_lodge_id'=> $grand_lodge->id]);
        } 
        return redirect()->route('admin.grand_lodges.index');
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
        
        $grand_lodges = GrandLodge::findOrFail($id);
        $district_lodges = \App\Districtlodge::get()->pluck('lodge_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $data = [
            'grand_lodges'=> $grand_lodges,
            'district_lodges'=> $district_lodges
        ];
        return view('admin.grand_lodges.edit')->with($data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
