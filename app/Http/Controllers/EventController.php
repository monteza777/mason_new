<?php

namespace App\Http\Controllers;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Support\Facades\Gate;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('events.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $events = Event::create($request->all());
        return redirect()->route('events.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findorFail($id);
        return view('events.show',compact('event'));
        // return $events;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_edit')) {
            return redirect()->route('events.index');
        }
        $event = Event::findorFail($id);
        $dt_start = \DateTime::createFromFormat('Y-m-d H:i:s', $event->event_start);
        $dt_end = \DateTime::createFromFormat('Y-m-d H:i:s', $event->event_end);
        $date_start = $dt_start->format('Y-m-d\TH:i');
        $date_end = $dt_end->format('Y-m-d\TH:i');

        $data = [
            'date_start'=> $date_start,
            'date_end'=> $date_end,
            'event'=>$event
        ];
        return view('events.edit')->with($data);
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
        if (! Gate::allows('user_edit')) {
            return redirect()->route('events.index');
        }
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('user_delete')) {
            return redirect()->route('events.index');
        }
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index');
    }
}
