<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    public function index()
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $lodges = \App\Lodge::get()->pluck('lodge_name', 'lodge_name')->prepend(trans('quickadmin.qa_please_select'), '');
        $data = [
            'roles'=> $roles,
            'lodges'=> $lodges
        ];
        return view('admin.users.create')->with($data);
    }

    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        $user = User::create($request->all());



        return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUsersRequest $request, $id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->update($request->all());



        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {
        if (! Gate::allows('user_view')) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$user_actions = \App\UserAction::where('user_id', $id)->get();

        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user', 'user_actions'));
    }

    public function destroy($id)
    {
        if (! Gate::allows('user_delete')) {
            return redirect()->route('admin.users.index');
        }
        $user = User::findOrFail($id);
        $user->posts()->delete();
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_delete')) {
            return 'you are not allowed to delete';
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                // $entry->posts()->delete();
                $entry->delete();
            }
        }
    }

}
