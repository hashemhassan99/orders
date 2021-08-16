<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\Maintaince;
use App\Models\MaintainceCategory;
use App\Models\User;
use App\Notifications\NewmaintainceNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Maintenance extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin'])->except('index', 'show', 'changeStatus','create','store','notification');
    }

    public function index()
    {
        $maintainces = Maintaince::orderByDesc('id')->paginate(5);
        return view('maintainces.index', compact('maintainces'));
    }

    public function create()
    {
        $categories = MaintainceCategory::all();
        return view('maintainces.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'maintaince_category_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $userId = auth()->check() ? auth()->id() : null;
        $data['description'] = $request->description;
        $data['maintaince_category_id'] = $request->maintaince_category_id;
        $data['user_id']        = $userId;

        $maintaince = Maintaince::create($data);
        if ($maintaince){

            $maintaince->user->notify(new NewmaintainceNotify($maintaince));
        }
        alert()->success('', 'Maintenance Added Success');
        return redirect()->route('maintenance.index');

    }

    public function show($id)
    {
        $maintaince = Maintaince::with(['MaintainceCategory', 'event'])->whereId($id)->first();

        return view('maintainces.show', compact('maintaince'));
    }

    public function edit($id)
    {
        $maintaince = Maintaince::with(['MaintainceCategory', 'event'])->whereId($id)->first();
        $events = event::all();
        return view('maintainces.edit', compact('maintaince', 'events'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $maintaince = Maintaince::whereId($id)->first();
        if ($maintaince) {
            $data['event_id'] = $request->event_id;
        }
        $maintaince->update($data);
        alert()->success('', 'Status Changed Success');
        return redirect()->route('maintenance.index');
    }

    public function changeStatus($id)
    {
        $maintaince = Maintaince::find($id);
        $maintaince->event_id = 1;
        $maintaince->save();
        alert()->success('', 'Maintaince Closed Success');
        return redirect()->route('maintenance.index');


    }

    public function messages()
    {
        $categories  = MaintainceCategory::all();
        return view('layouts.navigation',compact('categories'));
    }

    public function notification()
    {
        auth()->user()->unreadNotifications();

        return view('notifications',[
            'notifications' => auth()->user()->notifications()->get(),
        ]);
    }

}
