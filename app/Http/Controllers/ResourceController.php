<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\Resource;
use App\Models\ResourceCategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin'])->except('index','show','changeStatus');
    }

    public function index()
    {
        $resources = Resource::orderByDesc('id')->paginate(5);
        return view('resources.index',compact('resources'));
    }

    public function create()
    {
        $categories = ResourceCategory::all();
        $units  = Unit::all();
        return view('resources.create',compact('categories','units'));
   }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required',
            'value' => 'required',
            'purpose' => 'required',
            'resource_category_id' => 'required',
            'unit_id' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $quantity = $request->quantity;
        $value = $request->value;
        $purpose = $request->purpose;
        $resource_category_id = $request->resource_category_id;
        $unit_id = $request->unit_id;

        for ($i=0;$i<count($quantity);$i++){
            $datasave = [
              'quantity' => $quantity[$i],
              'value' => $value[$i],
              'purpose' => $purpose[$i],
              'resource_category_id' => $resource_category_id[$i],
              'unit_id' => $unit_id[$i],
            ];
            $resource = Resource::create($datasave);
        }
        alert()->success('','Resources Added Success');
        return redirect()->route('resources.index');


    }

    public function show($id)
    {
        $resource = Resource::with(['ResourceCategory','unit','event'])->whereId($id)->first();
        return view('resources.show',compact('resource'));
    }

    public function edit($id)
    {
        $resources = Resource::with(['ResourceCategory','event','unit'])->whereId($id)->first();
        $events = event::all();
        return view('resources.edit',compact('resources','events'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $resource = Resource::whereId($id)->first();
        if ($resource){
            $data['event_id'] = $request->event_id;
        }
        $resource->update($data);
        alert()->success('','Status Changed Success');
        return redirect()->route('resources.index');

    }
    public function changeStatus($id)
    {
        $resource = Resource::find($id);
        $resource->event_id = 1;
        $resource->save();
        alert()->success('', 'Resource Closed Success');
        return redirect()->route('statues.index');


    }
}
