@extends('layout')

@section('content')

<div class="card my-5">
	<div class="card-header">
		Create new contact:
	</div>
	<div class="card-body">
		@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif

	
		<form method="post" action="{{route('contacts.store')}}">
			@csrf
			<div class="form-group">
				<label for="first_name">First Name:</label>
				<input type="text" class="form-control" name="first_name"/>
			</div>
			<div class="form-group">
				<label for="last_name">Last Name:</label>
				<input type="text" class="form-control" name="last_name"/>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" name="email"/>
			</div>
			<div class="form-group">
				<label for="phone">Phone:</label>
				<input type="tel" class="form-control" name="phone"/>
			</div>
			<div class="form-group">
				<label for="birthday">Birthday:</label>
				<input type="date" class="form-control" name="birthday"/>
			</div>
			<div class="form-group">
				<label for="address">Address:</label>
				<input type="text" class="form-control" name="address"/>
			</div>
			<div class="form-group">
				<label for="city">City:</label>
				<input type="text" class="form-control" name="city"/>
			</div>
			<div class="form-group">
				<label for="state">State:</label>
				<input type="text" class="form-control" name="state"/>
			</div>
			<div class="form-group">
				<label for="zip">Zip:</label>
				<input type="number" class="form-control" name="zip"/>
			</div>
			<button type="submit" class="btn btn-primary">Create</button>
		</form>
	</div>
</div>

@endsection
