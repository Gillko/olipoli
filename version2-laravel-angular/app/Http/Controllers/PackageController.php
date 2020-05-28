<?php

namespace App\Http\Controllers;

$controllerModel = 'Package';

use App\Models\Package;
use App\Models\Type;
use App\Models\Item;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;
use DB;

class PackageController extends Controller
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
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		/*Get the packages*/
		$packages = Package::all();

		/*Load the view and pass the packages*/
		return \View::make('packages.index')->with('packages', $packages);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$packages = Package::all();

		$types    = Type::all()->pluck('type_name', 'type_id');

		$items    = Item::all()->pluck('item_description', 'item_id');

		return \View::make('packages.create', compact('types', 'items'));
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
			'package_name'			=> 'required',
			'package_conditions'	=> 'required',
			'package_price'			=> 'required',
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make a tutorial object*/
			$package  = new Package();

			$package->package_name 				= $input['package_name'];
			$package->package_description 		= $input['package_description'];
			$package->package_conditions 		= $input['package_conditions'];
			$package->package_price 			= $input['package_price'];
			//$package->user_id    = Auth::id();

			$package->save();

			$package->types()->attach($request->input('type_list'));
			$package->items()->attach($request->input('item_list'));
			
		   /*Redirect*/
			Session::flash('message', 'Successfully created a package!');
			return Redirect::to('packages');
		}
		else {
			return Redirect::to('packages/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $package_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($package_id)
	{
		$package = Package::find($package_id);
		return \View::make('packages.show')->with('package', $package);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $package_id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($package_id)
	{
		$package 	= Package::findOrFail($package_id);

		$types 		= Type::all()->pluck('type_name', 'type_id');

		$items    = Item::all()->pluck('item_description', 'item_id');

		return view('packages.edit', compact('package', 'types', 'items'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $package_id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $package_id)
	{
		$package = Package::findOrFail($package_id);
		$package->update($request->all());

		$package->types()->sync((array)$request->input('type_list', []));
		$package->items()->sync((array)$request->input('item_list', []));

		return redirect('packages');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $package_id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($package_id)
	{
		$package = Package::find($package_id);
		$package->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the package!');
		return Redirect::to('packages');
	}

	 /*JSON action (to use in the Frontoffice with AngularJS*/
	public function json()
	{
		$package = Package::with('types')->with('items')->get();

		//return Response::json($package)->setCallback(Input::get('callback'));
		//return response()->json($data=['packages' => $package], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
		return response()->json($data=$package, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
	}
}