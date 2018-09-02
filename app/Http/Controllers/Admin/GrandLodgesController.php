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
        $district_lodges = \App\Districtlodge::get()->pluck('lodge_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.grand_lodges.create',compact('district_lodges'));
    }

    public function store(Request $request,$index)
    {
        $grand_lodge = GrandLodge::create($request->all());

        foreach ($request->input('district_lodges', ['.$index->id.']) as $id => $data){
            // $grand_lodge->district_lodges()->create($data);
            $up_dl = Districtlodge::find($id);
            $up_dl->grand_lodge_id = $grand_lodge->id;
            $up_dl->save();
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
        
        $lodge = GrandLodge::findOrFail($id);
        $district_lodges = \App\Districtlodge::get()->pluck('lodge_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.grand_lodges.edit', compact('district_lodges'));
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
