<?php

namespace App\Http\Controllers;
use App\Http\Controllers\API\BaseController as BaseController;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;

class EventsController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
       $result =  Events::all();       
       return view('phpiv')->with('events', $result);
    }
	
	public function show($id) {
		$result = Events::find($id);
		return view('show')->with('events', $result);
	}
	
	public function edit($id) {
		$result = Events::find($id);
		return view('update')->with('events', $result);
	}
	
	public function create(Request $request) {
		return view('create');
	}
	
	public function store(Request $request) {
		//$post_data = Input::get();
		$event = new Events();
		$event->id = Str::uuid()->toString();
		$event->name = $request->name;
		$event->slug = $event->createSlug($event->name);
		$event->createdAt = date("Y-m-d H:i:s");;
		$event->updatedAt = date("Y-m-d H:i:s");;
		$event->save();
		
		return redirect('/');
	}
	
	public function update(Request $request) {
		//$post_data = Input::get();
		$id = $request->id;
		$result = Events::find($request->id);
		$result->name = $request->name;
		$result->update();
		
		Orchestra\Messages::add('success', 'Permohonan KM Telah Dijana.');
		return view('update')->with('events', $result);
	}
	
	public function destroy(Request $request)
    {
		$result =  Events::find($request->id); 
		$result->delete();	   
		return redirect('/');
    }
	public function find($id)
    {
       $result =  Events::find($id);       
       return ($result);
    }
	

}