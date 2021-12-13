<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Uuids;

class Events extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
    protected $fillable = [
		'name',
		'slug',
		'createdAt',
		'updatedAt',
    ];
	*/
	
	use HasFactory;
	public $timestamps = false;
	protected $casts = ['id' => 'string']; 
	protected $fillable = ["name" , "slug"];
	
	static public function index() { //get all
		$result =  self::all();       
        return ($result);
    }
	/*
	protected static function boot() {
        parent::boot();

        static::creating(function ($event) {
            $event->slug = Str::slug($event->name);
        });
    }
*/
	protected static function boot()
    {
        parent::boot();

        static::created(function ($event) {

            $event->slug = $event->createSlug($event->name);
            $event->save();
        });
    }

    /** 
     * Write code on Method
     *
     * @return response()
     */
    public function createSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {

            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {

                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
    
	/*static public function getactive() { //get active events
		$result =  self::orderBy('id')->lists('nama', 'id');       
        return ($result);
    }
	
	static public function findone() { //get an event
		$result =  self::orderBy('id')->lists('nama', 'id');       
        return ($result);
    }
	
	static public function create() { //get all
		$result =  self::orderBy('id')->lists('nama', 'id');       
        return ($result);
    }
	
	static public function update() { //get all
		$result =  self::orderBy('id')->lists('nama', 'id');       
        return ($result);
    }
	
	static public function delete() { //get all
		$result =  self::orderBy('id')->lists('nama', 'id');       
        return ($result);
    }*/
}