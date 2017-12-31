<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use App\Models\Listitem;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;

class NavigationController extends Controller
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
		/*Get the navigations*/
		$navigations = Navigation::all();

		/*Load the view and pass the navigations*/
		return \View::make('navigations.index')->with('navigations', $navigations);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$navigations = Navigation::all();

		$listitems    	= Listitem::all()->pluck('listitem_title', 'listitem_id');

		return \View::make('navigations.create', compact('listitems'));
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
			'navigation_title' 			=> 'required',
			'navigation_description' 	=> 'required',
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make a navigation object*/
			$navigation  = new Navigation();

			$navigation->navigation_title		= $input['navigation_title'];
			$navigation->navigation_description	= $input['navigation_description']; 

			$navigation->save();
			
		   /*Redirect*/
			Session::flash('message', 'Successfully created a navigation!');
			return Redirect::to('navigations');
		}
		else {
			return Redirect::to('packages/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $navigation_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($navigation_id)
	{
		$navigation = Navigation::find($navigation_id);
		return \View::make('navigations.show')->with('navigation', $navigation);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $navigation_id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($navigation_id)
	{
		$navigation = Navigation::findOrFail($navigation_id);

		return view('navigations.edit', compact('navigation'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $navigation_id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $navigation_id)
	{
		$navigation = Navigation::findOrFail($navigation_id);
		$navigation->update($request->all());

		return redirect('navigations');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $navigation_id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($navigation_id)
	{
		$navigation = Navigation::find($navigation_id);
		$navigation->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the navigation!');
		return Redirect::to('navigations');
	}

	 /*JSON action (to use in the Frontoffice with AngularJS*/
	public function json()
	{
		$navigation = Navigation::with('listitems')->get();

		//return Response::json($navigation)->setCallback(Input::get('callback'));
		//return response()->json($data=['navigations' => $navigation], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
		return response()->json($data=$navigation, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
	}
}