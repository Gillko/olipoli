<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Item;
use App\Models\Package;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;
use DB;

class TypeController extends Controller
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
	
	/*private $allModelRecords;

	public function __construct()
    {
        $allModelRecords = '$types';
    }*/

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		/*Get the types*/
		$types = Type::all();

		/*Load the view and pass the types*/
		return \View::make('types.index')->with('types', $types);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$types = Type::all();

		//$items    	= Item::all()->pluck('item_description', 'item_id');
		$packages 	= Package::all()->pluck('package_name', 'package_id');

		return \View::make('types.create', compact('packages'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$input = Input::all();

		/*Validation*/
		$rules = array(
			'type_name'			=> 'required',
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make a tutorial object*/
			$type  				= new Type();

			$type->type_name		= $input['type_name'];
			$type->type_description	= $input['type_description'];
			//$type->package_id		= Input::get('package_id');
			//$type->user_id    = Auth::id();

			$type->save();

			//$type->items()->attach($request->input('item_list'));
			$type->packages()->attach($request->input('package_list'));
			
		   /*Redirect*/
			Session::flash('message', 'Successfully created a type!');
			return Redirect::to('types');
		}
		else {
			return Redirect::to('types/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $type_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($type_id)
	{
		$type = Type::find($type_id);
		return \View::make('types.show')->with('type', $type);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $type_id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($type_id)
	{
		$type 	= Type::findOrFail($type_id);

		/*$items 		= Item::all()->pluck('item_description', 'item_id');*/
		$packages 	= Package::all()->pluck('package_name', 'package_id');

		return view('types.edit', compact('type', 'items', 'packages'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $type_id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $type_id)
	{
		$type = type::findOrFail($type_id);
		$type->update($request->all());

		/*$type->items()->sync((array)$request->input('item_list', []));*/
		$type->packages()->sync((array)$request->input('package_list', []));

		return redirect('types');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $type_id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($type_id)
	{
		$type = Type::find($type_id);
		$type->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the type!');
		return Redirect::to('types');
	}

	 /*JSON action (to use in the Frontoffice with AngularJS*/
	public function json()
	{
		$type = Type::with('items')->with('packages')->get();

		//return Response::json($type)->setCallback(Input::get('callback'));
		//return response()->json($data=['types' => $type], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
		return response()->json($data=$type, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
	}
}