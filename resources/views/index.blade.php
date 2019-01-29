@extends('layout')

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

@section('content')

<div class="my-5">
	@if(session()->get('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}  
	</div>
  	@endif
	
	<a class="btn btn-primary my-5" href="{{route('contacts.create')}}">Create new contact</a>

	<table id="contacts" class="display">
	<thead>
		<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Birthday</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Actions</th></tr>
	</thead>
	<tbody>
		@foreach($contacts as $contact)
		<tr><td>{{$contact->first_name}}</td>
		<td>{{$contact->last_name}}</td>
		<td>{{$contact->email}}</td>
		<td>{{$contact->phone}}</td>
		<td>{{$contact->birthday}}</td>
		<td>{{$contact->address}}</td>
		<td>{{$contact->city}}</td>
		<td>{{$contact->state}}</td>
		<td>{{$contact->zip}}</td>
		<td>
		<a class="btn btn-primary" href="{{route('contacts.edit', $contact->id)}}">View/Edit</a>
		<form action="{{route('contacts.destroy', $contact->id)}}" method="post">
			@csrf
			@method('DELETE')
			<button class="btn btn-danger" type="submit">Delete</button>
		</form>
		</td></tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr><td>First Name</th><th>Last Name</th></tr>
	</tfoot>
	</table>
</div>

<script>
$(document).ready(function() {
	$('#contacts').DataTable();
} );
</script>

@endsection
