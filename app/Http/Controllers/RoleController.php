<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use Auth;

class RoleController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['store', 'destroy', 'json']]);
	}
	
	/**
	 * Display a listing of the resource.
	 * GET /role
	 *
	 * @return Response
	 */
	public function index()
	{
		/*Get the roles*/
		$roles = Role::all();

		/*Load the view and pass the roles*/
		return \View::make('roles.index')->with('roles', $roles);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /role/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$roles = Role::all();

		$users = User::lists('user_username', 'user_id');

		return \View::make('roles.create', compact('users'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /role
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	 $input = Input::all();

		/*Validation*/
		$rules = array(
			'role_title'		=> 'required',
			'role_description'	=> 'required',
			'role_created'		=> 'required'
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make a role object*/
			$roles = new Role();

			$roles->role_title			= $input['role_title'];
			$roles->role_description	= $input['role_description'];
			$roles->role_created		= $input['role_created'];
			$roles->user_id				= Auth::id();

			$roles->save();

			$roles->users()->attach($request->input('user_list'));

			/*Redirect*/
			Session::flash('message', 'Successfully created the role!');
			return Redirect::to('roles');
		}
		else {
			return Redirect::to('roles/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /role/{role_id}
	 *
	 * @param  int  $role_id
	 * @return Response
	 */
	public function show($role_id)
	{
		$role = Role::find($role_id);
		return \View::make('roles.show')->with('role', $role);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /role/{role_id}/edit
	 *
	 * @param  int  $role_id
	 * @return Response
	 */
	public function edit($role_id)
	{
		$role = Role::findOrFail($role_id);

		$users = User::lists('user_username', 'user_id');

		return view('roles.edit', compact('role', 'users'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /role/{role_id}
	 *
	 * @param  int  $role_id
	 * @return Response
	 */
	public function update(Request $request, $role_id)
	{
		$role = Role::findOrFail($role_id);
		$role->update($request->all());

		$role->users()->sync((array)$request->input('user_list', []));

		return redirect('roles');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /role/{role_id}
	 *
	 * @param  int  $role_id
	 * @return Response
	 */
	public function destroy($role_id)
	{
		$roles = Role::find($role_id);
		$roles->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the role!');
		return Redirect::to('roles');
	}
}