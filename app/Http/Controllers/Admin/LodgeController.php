<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Lodge;

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
        return view('admin.lodges.create');
    }

    public function store(Request $request)
    {
        $lodges = Lodge::create($request->all());
        return redirect()->route('admin.lodges.index');
    }

    public function show($id)
    {
        $lodge = Lodge::findorFail($id);
        return view('admin.lodges.show',compact('lodge'));
    }

    public function edit($id)
    {
       if (! Gate::allows('user_edit')) {
            return redirect()->route('admin.lodges.index');
        }
        $lodge = Lodge::findorFail($id);
        return view('admin.lodges.edit',compact('lodge'));
    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('user_edit')) {
            return redirect()->route('admin.lodges.index');
        }
        $lodge = Lodge::findOrFail($id);
        $lodge->update($request->all());
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
