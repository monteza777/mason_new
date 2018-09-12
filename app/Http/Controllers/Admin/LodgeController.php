<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Lodge;
use App\User;
class LodgeController extends Controller
{
    public function index()
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }
        $lodges = Lodge::all();
        return view('admin.lodges.index', compact('lodges'));
    }

    public function create()
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        $users = \App\User::get()->pluck('name', 'id')
        ->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.lodges.create',compact('users'));
    }

    public function store(Request $request)
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }

        $lodges = Lodge::create($request->all());
        $user_id = $request->input('users');
        if($request->input('users') != ''){
        User::whereIn('id',$user_id)->update(['lodge_id'=> $lodges->id]);
        }
        return redirect()->route('admin.lodges.index');
    }

    public function show($id)
    {
        $lodge = Lodge::findorFail($id);
        $users = \App\User::where('lodge_id', $id)->get();

        return view('admin.lodges.show',compact('lodge','users'));
    }

    public function edit($id)
    {
       if (! Gate::allows('user_edit')) {
            return redirect()->route('admin.lodges.index');
        }

        $lodge = Lodge::findorFail($id);
        $users = \App\User::get()->pluck('name', 'id')
        ->prepend(trans('quickadmin.qa_please_select'), '');
        $data = [
            'lodge' => $lodge,
            'users' => $users
        ];
        return view('admin.lodges.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('user_edit')) {
            return redirect()->route('admin.lodges.index');
        }
        $lodge = Lodge::findOrFail($id);
        $lodge->update($request->all());

        $user_id = $request->input('users');
        if($request->input('users') != ''){
        User::whereIn('id',$user_id)->update(['lodge_id'=> $id]);
        }
        return redirect()->route('admin.lodges.index');
    }

    public function destroy($id)
    {
        if (! Gate::allows('user_delete')) {
            return redirect()->route('admin.lodges.index');
        }
        $lodge = Lodge::findOrFail($id);
        $lodge->delete();

        return redirect()->route('admin.lodges.index');
    }

}
