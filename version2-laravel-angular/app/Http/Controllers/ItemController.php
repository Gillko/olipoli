<?php

namespace App\Http\Controllers;

$controllerModel = 'Item';

use App\Models\Item;
use App\Models\Type;
use App\Models\Package;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;
use DB;

class ItemController extends Controller
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
		/*Get the items*/
		$items = Item::all();

		/*Load the view and pass the items*/
		return \View::make('items.index')->with('items', $items);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$items = Item::all();

		$types    	= Type::all()->pluck('type_name', 'type_id');
		$packages	= Package::all()->pluck('package_name', 'package_id');

		return \View::make('items.create', compact('types', 'packages'));
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
			'item_description' => 'required',
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
				
			for($i= 0; $i < count($input['item_description']); $i++){
				$item  = new Item();
				
				//$item->item_id 			= $request['item_id'];
				$item->item_description	= $input['item_description'][$i];
				$item->type_id			= Input::get('type_id'); 

				$item->save();

				$item->packages()->attach($request->input('package_list'));
			}
			
		   /*Redirect*/
			Session::flash('message', 'Successfully created a item!');
			return Redirect::to('items');
		}
		else {
			return Redirect::to('items/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $item_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($item_id)
	{
		$item = Item::find($item_id);
		return \View::make('items.show')->with('item', $item);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $item_id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($item_id)
	{
		$item 		= Item::findOrFail($item_id);

		$types 		= Type::all()->pluck('type_name', 'type_id');
		$packages 	= Package::all()->pluck('package_name', 'package_id');

		return view('items.edit', compact('item', 'types', 'packages'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $item_id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $item_id)
	{
		$item = Item::findOrFail($item_id);
		$item->update($request->all());

		$item->packages()->sync((array)$request->input('package_list', []));

		return redirect('items');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $item_id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($item_id)
	{
		$item = Item::find($item_id);
		$item->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the item!');
		return Redirect::to('items');
	}

	 /*JSON action (to use in the Frontoffice with AngularJS*/
	public function json()
	{
		$item = Item::with('types')->get();

		//return Response::json($item)->setCallback(Input::get('callback'));
		//return response()->json($data=['items' => $item], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
		return response()->json($data=$item, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
	}
}