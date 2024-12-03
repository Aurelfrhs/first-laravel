<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        
        $activity = new Activity();
        $data = $activity->all();
        return view('home', compact('data'));
    }

    function add()
    {
        return view('add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'activity_name' => 'required|min:4|max:20|'
        ],[
            'activity_name.required'=> 'isi mas',
            'activity_name.min'=> 'isi 4 kata mas',
            'activity_name.max'=> 'jangan lebih 20 kata mas',
        ]);

        $activity = new Activity();

        $activity->activity_name = $request->activity_name;
        $activity->save();

        // $activity->create([
            //     'activity_name' => $request->activity_name
            // ]);
            
        return redirect('/')->with('success', 'Activity has added!');
    }
    
    function show(string $id)
    {
        $activity = new Activity();
        $data = $activity->find($id);
        if (!isset($data)) {
            return abort(404, 'Activity not found');
        }
        return view('update', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'activity_name' => 'required|min:4|max:20|'
        ],[
            'activity_name.required'=> 'isi mas',
            'activity_name.min'=> 'isi 4 kata mas',
            'activity_name.max'=> 'jangan lebih 20 kata mas',
        ]);
        
        $activity = new Activity();
        $data = $activity->find($id);
        $data->activity_name = $request->activity_name;
        $data->save();
        
        // $activity->create([
            //     'activity_name' => $request->activity_name
            // ]);
            
            return redirect('/')->with('success', 'Activity has updated');
            
        }

        function destroy(string $id)
        {
            $activity = new Activity();
            $data = $activity->find($id);
            $data->delete();
            return redirect('/')->with('success', 'Activity has deleted!');
        }
    }
    