@extends('layouts.app')

@section('content')
	<div class="container">
		<p>First name: {{ $employee->first_name }}</p>

		<p>Last name: {{ $employee->last_name }}</p>
		
		@isset($employee->companies_id	)
		    <p>Company: {{ $employee->company->name }}</p>
		@endisset

		@isset($employee->email)
		    <p>Email: {{ $employee->email }}</p>
		@endisset

		@isset($employee->phone)
		    <p>Phone: {{ $employee->phone }}</p>
		@endisset

	</div>
@endsection