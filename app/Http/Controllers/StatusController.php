<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin'])->except('index','show','changeStatus');
    }
    public function index()
    {
        $statues = Status::orderByDesc('id')->paginate(5);
        return view('statueses.index',compact('statues'));
    }

    public function create()
    {
        return view('statueses.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transformer' => 'required',
            'description' => 'required',
            'notes' => 'required',
            'procedure' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['transformer'] = $request->transformer;
        $data['description'] = $request->description;
        $data['notes'] = $request->notes;
        $data['procedure'] = $request->procedure;

        $status =Status::create($data);
        alert()->success('','Status Added Success');
        return redirect()->route('statues.index');
    }
    public function show($id)
    {
        $statues = Status::with('event')->whereId($id)->first();

        return view('statueses.show',compact('statues'));
    }
    public function edit($id)
    {
        $statues = Status::with('event')->whereId($id)->first();
        $events = event::all();
        return view('statueses.edit',compact('statues','events'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $status = Status::whereId($id)->first();
        if ($status){
            $data['event_id'] = $request->event_id;
        }
        $status->update($data);
        alert()->success('','Status Changed Success');
        return redirect()->route('statues.index');

    }

    public function changeStatus($id)
    {
        $status = Status::find($id);
        $status->event_id = 1;
        $status->save();
        alert()->success('', 'Status Closed Success');
        return redirect()->route('statues.index');


    }
}
