<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$contacts = Contact::all();
	
	return view('index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
		'first_name' => 'required',
		'last_name' => 'required',
		'email' => 'required|email',
		'phone' => 'numeric',
		'birthday' => 'date',
		'zip' => 'numeric'
	]);	

	$contact = new Contact([
		'first_name' => $request->get('first_name'),
		'last_name' => $request->get('last_name'),
		'email' => $request->get('email'),
		'phone' => $request->get('phone'),
		'birthday' => $request->get('birthday'),
		'address' => $request->get('address'),
		'city' => $request->get('city'),
		'state' => $request->get('state'),
		'zip' => $request->get('zip')
	]);
	$contact->save();

	return redirect('/contacts')->with('success', 'New contact added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/contacts/'.$id.'/edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $contact = Contact::find($id);
	    return view('contacts.edit', compact('share'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	$request->validate([
	    	'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone' => 'numeric',
                'birthday' => 'date',
                'zip' => 'numeric'
	]);

	$contact = Contact::find($id);
	$contact->first_name = $request->get('first_name');
	$contact->last_name = $request->get('last_name');
	$contact->email = $request->get('email');
	$contact->phone = $request->get('phone');
	$contact->birthday = $request->get('birthday');
	$contact->address = $request->get('address');
	$contact->city = $request->get('city');
	$contact->state = $request->get('state');
	$contact->zip = $request->get('zip');
	$contact->save();

	return redirect('/contacts')->with('success', 'Contact updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $contact = Contact::find($id);
	    $contact->delete();

	    return redirect('/contacts')->with('success', 'Contact deleted');
    }
}
