<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User

class Service extends Model {

	protected $table = 'services';
	protected $fillable = ['name', 'description', 'schedule', 'fee'];

	public function contracts()
	{
		return $this->belongsToMany('User', 'contracts');
	}

	public function payments()
	{
		return $this->belongsToMany('User', 'payments');
	}
}
