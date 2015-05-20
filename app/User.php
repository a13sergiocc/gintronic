<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use App\Service

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'users';
	protected $fillable = ['name', 'surname', 'email', 'password', 'birthname', 'telephone', 'address', 'admin'];
	protected $hidden = ['password', 'remember_token'];

	public function contracts()
	{
		return $this->belongsToMany('Service', 'contracts');
	}

	public function payments()
	{
		return $this->belongsToMany('Service', 'payments');
	}

}
