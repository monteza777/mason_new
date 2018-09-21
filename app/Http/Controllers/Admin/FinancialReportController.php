<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\FinancialReport;

class FinancialReportController extends Controller
{
    
    public function index()
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }
        $freport = FinancialReport::all();
        return view('admin.financial_reports.index',compact('freport'));
    }

    public function create()
    {
        return view('admin.financial_reports.create');
    }

    public function store(Request $request)
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }
        $d_lodge = FinancialReport::create($request->all());
        return redirect()->route('admin.financial_reports.index');
    }

    public function show($id)
    {
        if (! Gate::allows('user_view')) {
            return abort(401);
        }
        $reports = FinancialReport::findOrFail($id);
        return view('admin.financial_reports.show', compact('reports'));

    }

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
