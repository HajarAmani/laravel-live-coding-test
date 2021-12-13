<?php
namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events;

class ApiController extends Controller
{
    public function index() {
		$result = Events::all();       
		return ($result);
	}
	
	public function show($id) {
		$result = Events::findorFail($id);       
		return ($result);
	}
	
	//public function update(Request $request,$id) {
	public function update($id) {
		$result = Events::find($id);
		$result->name = $request->input('name','Sally');
		$result->update();
		return ($result);
	}
	
    public function active_events() {
		$result = Events::all();       
		return ($result);
	}
	
	public function store(Request $request)
    {
        $faker = \Faker\Factory::create();
			DB::table("events")->insert([
			"id" => $faker->uuid(),
            "name" => $faker->name(),
            "slug" => $faker->slug,
			'createdAt' => now(),
			'updatedAt' => now(),
        ]);
        $request->validate([
		
            'name'=>'required',
            'description'=>'required',
            'slug'=>'required',
            'price'=>'required'


        ]);
       return Events::create($request->all());
    }
	
	public function patch($id) {
		$result = Events::find($id);
		$result->name = $request->input('name','Sally');
		$result->update();
		return ($result);
	}
	
    public function delete($id) {
		return Events::destroy($id);
    }
}