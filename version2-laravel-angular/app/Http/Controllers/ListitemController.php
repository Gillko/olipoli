<?php

namespace App\Http\Controllers;

use App\Models\Listitem;
use App\Models\Navigation;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;

class ListitemController extends Controller
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
		/*Get the listitems*/
		$listitems = Listitem::all();

		/*Load the view and pass the listitems*/
		return \View::make('listitems.index')->with('listitems', $listitems);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$listitems = Listitem::all();

		$navigations = Navigation::all()->pluck('navigation_title', 'navigation_id');

		return \View::make('listitems.create', compact('listitems', 'navigations'));
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
			'listitem_title' 		=> 'required',
			'listitem_description' 	=> 'required',
			'listitem_anchor' 		=> 'required',
			'listitem_position' 	=> 'required',
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			$listitem  = new Listitem();
			
			$listitem->listitem_title			= $input['listitem_title'];
			$listitem->listitem_description		= $input['listitem_description'];
			$listitem->listitem_anchor			= $input['listitem_anchor'];
			$listitem->listitem_position		= $input['listitem_position'];
			$listitem->navigation_id			= Input::get('navigation_id'); 

			$listitem->save();
			
		   /*Redirect*/
			Session::flash('message', 'Successfully created a listitem!');
			return Redirect::to('listitems');
		}
		else {
			return Redirect::to('listitems/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $listitem_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($listitem_id)
	{
		$listitem = ListItem::find($listitem_id);
		return \View::make('listitems.show')->with('listitem', $listitem);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $listitem_id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($listitem_id)
	{
		$listitem 		= Listitem::findOrFail($listitem_id);

		$navigations 	= Navigation::all()->pluck('navigation_title', 'navigation_id');

		return view('listitems.edit', compact('listitem', 'navigations'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $listitem_id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $listitem_id)
	{
		$listitem = Listitem::findOrFail($listitem_id);
		$listitem->update($request->all());

		return redirect('listitems');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $listitem_id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($listitem_id)
	{
		$listitem = Listitem::find($listitem_id);
		$listitem->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the listitem!');
		return Redirect::to('listitems');
	}

	 /*JSON action (to use in the Frontoffice with AngularJS*/
	public function json()
	{
		$listitem = Listitem::with('navigation')->get();

		//return Response::json($listitem)->setCallback(Input::get('callback'));
		//return response()->json($data=['listitems' => $listitem], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
		return response()->json($data=$listitem, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
	}
}