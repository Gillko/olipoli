<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Contact;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;

class AddressController extends Controller
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
		/*Get the addresses*/
		$addresses = Address::all();

		/*Load the view and pass the addresses*/
		return \View::make('addresses.index')->with('addresses', $addresses);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$addresses = Address::all();

		$contacts = Contact::all()->pluck('contact_company', 'contact_id');

		return \View::make('addresses.create', compact('addresses', 'contacts'));
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
			'address_street'		=> 'required',
        	'address_number'		=> 'required',
        	'address_city'			=> 'required',
        	'address_postalcode'	=> 'required',
        	'address_latitude'		=> 'required',
        	'address_longitude'		=> 'required',
        	//'contact_id'			=> 'required'
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make an address object*/
			$address  = new Address();

			$address->address_street		= $input['address_street'];
			$address->address_number		= $input['address_number'];
			$address->address_city			= $input['address_city'];
			$address->address_postalcode	= $input['address_postalcode'];
			$address->address_latitude		= $input['address_latitude'];
			$address->address_longitude		= $input['address_longitude'];
			$address->contact_id			= Input::get('contact_id');
			
			$address->save();
		
		   /*Redirect*/
			Session::flash('message', 'Successfully created a address!');
			return Redirect::to('addresses');
		}
		else {
			return Redirect::to('addresses/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $address_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($address_id)
	{
		$address = Address::find($address_id);
		return \View::make('addresses.show')->with('address', $address);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $address_id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($address_id)
	{
		$address 	= Address::findOrFail($address_id);

		$contacts	= Contact::all()->pluck('contact_company', 'contact_id');

		return view('addresses.edit', compact('address', 'contacts'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $address_id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $address_id)
	{
		$address = Address::findOrFail($address_id);
		$address->update($request->all());

		return redirect('addresses');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $address_id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($address_id)
	{
		$address = Address::find($address_id);
		$address->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the address!');
		return Redirect::to('addresses');
	}

	 /*JSON action (to use in the Frontoffice with AngularJS*/
	public function json()
	{
		$address = Address::with('contact')->get();

		//return Response::json($address)->setCallback(Input::get('callback'));
		//return response()->json($data=['addresses' => $address], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
		return response()->json($data=$address, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
	}
}