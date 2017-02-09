<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Address;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;
use DB;

class ContactController extends Controller
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
		/*Get the contacts*/
		$contacts = Contact::all();

		/*Load the view and pass the contacts*/
		return \View::make('contacts.index')->with('contacts', $contacts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$contacts = Contact::all();

		//$addresses = Address::all()->pluck('address_street', 'address_id');
		$addresses    = Address::all(DB::raw('concat (address_street, " " ,address_number, " ", address_city) as address_address, address_id'))->pluck('address_address', 'address_id');

		return \View::make('contacts.create', compact('addresses'));
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
			 'contact_company'		=> 'required',
			 'contact_phoneA'		=> 'required',
			 'contact_email'		=> 'required',
			 'contact_information'	=> 'required',
			 'contact_anchor'		=> 'required'
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make a contact object*/
			$contact  = new Contact();

			$contact->contact_company			= $input['contact_company'];
			$contact->contact_phoneA			= $input['contact_phoneA'];
			$contact->contact_phoneB			= $input['contact_phoneB'];
			$contact->contact_email				= $input['contact_email'];
			$contact->contact_information		= $input['contact_information'];
			$contact->contact_anchor			= $input['contact_anchor'];

			$contact->save();
			
		   /*Redirect*/
			Session::flash('message', 'Successfully created a contact!');
			return Redirect::to('contacts');
		}
		else {
			return Redirect::to('contacts/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $contact_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($contact_id)
	{
		$contact = Contact::find($contact_id);
		return \View::make('contacts.show')->with('contact', $contact);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $contact_id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($contact_id)
	{
		$contact = Contact::findOrFail($contact_id);

		return view('contacts.edit', compact('contact'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $contact_id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $contact_id)
	{
		$contact = Contact::findOrFail($contact_id);
		$contact->update($request->all());

		return redirect('contacts');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $contact_id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($contact_id)
	{
		$contact = Contact::find($contact_id);
		$contact->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the contact!');
		return Redirect::to('contacts');
	}

	 /*JSON action (to use in the Frontoffice with AngularJS*/
	public function json()
	{
		$contact = Contact::with('addresses')->get();

		//return Response::json($contact)->setCallback(Input::get('callback'));
		//return response()->json($data=['contacts' => $contact], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
		return response()->json($data=$contact, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
	}
}