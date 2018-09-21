<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Admin\Attach;
use App\Lodge_user;
use App\Lodge;
use App\User;

class LodgeUserController extends Controller
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
        $users = User::with('lodges')->get();
        
        return view('admin.lodge_users.index', compact('users'));
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
        $users = User::get()->pluck('name', 'id')
        ->prepend(trans('quickadmin.qa_please_select'), '');

        $lodges = Lodge::get()->pluck('lodge_name', 'id')
        ->prepend(trans('quickadmin.qa_please_select'), '');

        $data = [
            'users'=> $users,
            'lodges'=> $lodges
        ];
        return view('admin.lodge_users.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        /*if (! Gate::allows('role_create')) {
            return abort(401);
        }*/
        // $test = $request->lodges;
        $lodge = Lodge::find($request->lodges);
        foreach ($request->input('users', []) as $data) {
            $lodge->users()->attach($data);
        }
        // dd($test);
        return redirect()->route('admin.lodge_users.index');
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
        //
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
