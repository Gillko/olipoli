<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Picture;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;

class ContentController extends Controller
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
		/*Get the contents*/
		$contents = Content::all();

		/*Load the view and pass the contents*/
		return \View::make('contents.index')->with('contents', $contents);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$contents = Content::all();

		$pictures = Picture::all()->pluck('picture_title', 'picture_id');

		return \View::make('contents.create', compact('pictures'));
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
			'content_title' 			=> 'required',
			//'content_subtitle' 		=> 'required',
			'content_description' 		=> 'required',
			'content_anchor'			=> 'required',
			//'content_button' 			=> 'required',
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make a content object*/
			$content  = new Content();

			$content->content_title			= $input['content_title'];
			$content->content_subtitle		= $input['content_subtitle'];
			$content->content_description	= $input['content_description'];
			$content->content_anchor		= $input['content_anchor'];
			$content->content_button		= $input['content_button'];

			$content->save();
			
		   /*Redirect*/
			Session::flash('message', 'Successfully created a content!');
			return Redirect::to('contents');
		}
		else {
			return Redirect::to('contents/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $content_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($content_id)
	{
		$content = Content::find($content_id);
		return \View::make('contents.show')->with('content', $content);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $content_id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($content_id)
	{
		$content = Content::findOrFail($content_id);

		return view('contents.edit', compact('content'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $content_id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $content_id)
	{
		$content = Content::findOrFail($content_id);
		$content->update($request->all());

		return redirect('contents');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $content_id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($content_id)
	{
		$content = Content::find($content_id);
		$content->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the content!');
		return Redirect::to('contents');
	}

	 /*JSON action (to use in the Frontoffice with AngularJS*/
	public function json()
	{
		$content = Content::with('pictures')->get();

		//return Response::json($content)->setCallback(Input::get('callback'));
		//return response()->json($data=['contents' => $content], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
		return response()->json($data=$content, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
	}
}