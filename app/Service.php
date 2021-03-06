<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	protected $table = 'services';
	protected $fillable = ['name', 'description', 'schedule', 'fee'];

	public function contracts()
	{
		return $this->belongsToMany('App\User', 'contracts')->withTimestamps();
	}

	public function payments()
	{
		return $this->belongsToMany('App\User', 'payments')->withTimestamps();
	}
}
