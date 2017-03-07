<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Models\Content;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;

class SocialController extends Controller
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
		/*Get the socials*/
		$socials = Social::all();

		/*Load the view and pass the socials*/
		return \View::make('socials.index')->with('socials', $socials);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$socials = Social::all();

		$contents = Content::all()->pluck('content_title', 'content_id');

		return \View::make('socials.create', compact('socials', 'contents'));
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
			'social_fontawesome'	=> 'required',
        	'social_link'			=> 'required',
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make an social object*/
			$social  = new Social();

			$social->social_fontawesome	= $input['social_fontawesome'];
			$social->social_link		= $input['social_link'];
			$social->content_id			= Input::get('content_id');
			
			$social->save();
		
		   /*Redirect*/
			Session::flash('message', 'Successfully created a social link!');
			return Redirect::to('socials');
		}
		else {
			return Redirect::to('socials/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $social_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($social_id)
	{
		$social = Social::find($social_id);
		return \View::make('socials.show')->with('social', $social);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $social_id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($social_id)
	{
		$social 	= Social::findOrFail($social_id);

		$contents	= Content::all()->pluck('content_title', 'content_id');

		return view('socials.edit', compact('social', 'contents'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $social_id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $social_id)
	{
		$social = Social::findOrFail($navigation_id);
		$social->update($request->all());

		return redirect('socials');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $social_id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($social_id)
	{
		$social = Social::find($social_id);
		$social->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the social link!');
		return Redirect::to('socials');
	}

	 /*JSON action (to use in the Frontoffice with AngularJS*/
	public function json()
	{
		$social = Social::with('content')->get();

		//return Response::json($social)->setCallback(Input::get('callback'));
		//return response()->json($data=['socials' => $social], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
		return response()->json($data=$social, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
	}
}