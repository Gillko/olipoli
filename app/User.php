<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	use Notifiable;
	
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'user_firstname',
		'user_surname',
		'user_fullname',
		'user_username',
		'email',
		'password'
	];

	protected $table ='users';

	protected $primaryKey = 'user_id';

	public $timestamps = false;


	protected $guarded = [];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	* A user has many roles
	*
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	/*public function roles()
	{
		return $this->hasMany('App\Models\Role');
	}*/
}