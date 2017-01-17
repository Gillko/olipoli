<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = ['role_title', 'role_description', 'role_created', 'role_modified'];

	protected $table ='roles';

	protected $primaryKey = 'role_id';

	public $timestamps = false;

	/**
	* A role belongs to a user
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	/**
	*Get the users associated with the given role.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function users()
	{
		return $this->belongsToMany('App\Models\User', 'roles_users', 'role_id', 'user_id');
	}

	/**
	*Get a list of user ids associated with the current role.
	*
	*@return array
	*/
	public function getUserListAttribute()
	{
		return $this->users->lists('user_id')->all();
	}
}