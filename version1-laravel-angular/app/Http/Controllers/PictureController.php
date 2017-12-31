<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Content;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;

class PictureController extends Controller
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
		/*Get the pictures*/
		$pictures = Picture::all();

		/*Load the view and pass the pictures*/
		return \View::make('pictures.index')->with('pictures', $pictures);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$pictures = Picture::all();

		$contents = Content::all()->pluck('content_title', 'content_id');

		return \View::make('pictures.create', compact('pictures', 'contents'));
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
			'picture_title'			=> 'required',
        	'picture_description'	=> 'required',
        	'picture_alt'			=> 'required',
        	'picture_url'			=> 'required|mimes:jpg,jpeg,png,gif',
        	'picture_type'			=> 'required',
        	//'content_id'			=> 'required'
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*Uploading images*/
			$picture 			= $request->file('picture_url');
			$filename 			= $picture->getClientOriginalName();
			$destinationPath 	= public_path('/uploads');
			$success 			= $picture->move($destinationPath, $filename);

			if($success){
				/*We make an picture object*/
				$picture  = new Picture();

				$picture->picture_title			= $input['picture_title'];
				$picture->picture_description	= $input['picture_description'];
				$picture->picture_alt			= $input['picture_alt'];
				$picture->picture_url			= $filename;
				$picture->picture_type			= $input['picture_type'];
				$picture->content_id			= Input::get('content_id');
				
				$picture->save();
			
			   /*Redirect*/
				Session::flash('message', 'Successfully created a picture!');
				return Redirect::to('pictures');
			}
		}
		else {
			return Redirect::to('pictures/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $picture_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($picture_id)
	{
		$picture = Picture::find($picture_id);
		return \View::make('pictures.show')->with('picture', $picture);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $picture_id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($picture_id)
	{
		$picture 	= Picture::findOrFail($picture_id);

		$contents	= Content::all()->pluck('content_title', 'content_id');

		return view('pictures.edit', compact('picture', 'contents'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $picture_id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $picture_id)
	{
		// $picture = Picture::findOrFail($picture_id);
		// $picture->update($request->all());

		// return redirect('pictures');

		/*Validation*/
		$validation = \Validator::make($request->all(), [
			// 'image_title'		=> 'required',
			// 'image_modified'	=> 'required'
		]);

		/*Check if it fails*/
		if( $validation->fails() ){
			return redirect()->back()->withInput()->with('errors', $validation->errors());
		}

		/*Process valid data & go to success page*/
		$picture = Picture::findOrFail($picture_id);

		if($request->hasFile('picture_url') ){
		   $file 				= $request->file('picture_url');
		   $filename 			= $file->getClientOriginalName();
		   $destinationPath 	= public_path('uploads/');
		   $file->move($destinationPath, $filename);
		}
		
		$picture->picture_title 		= $request->input('picture_title');
		$picture->picture_description 	= $request->input('picture_description');
		$picture->picture_url 			= $filename;
		$picture->picture_alt 			= $request->input('picture_alt');
		$picture->picture_type 			= $request->input('picture_type');
		$picture->save();

		//$image->tags()->sync((array)$request->input('tag_list', []));

		return redirect('/pictures')->with('message','You just updated a picture!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $picture_id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($picture_id)
	{
		$picture = Picture::find($picture_id);
		$picture->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the picture!');
		return Redirect::to('pictures');
	}

	 /*JSON action (to use in the Frontoffice with AngularJS*/
	public function json()
	{
		$picture = Picture::with('content')->get();

		//return Response::json($picture)->setCallback(Input::get('callback'));
		//return response()->json($data=['pictures' => $picture], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
		return response()->json($data=$picture, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
	}
}