@extends('layouts.app')

@section('content')
	<div class="container">
		<p>Company name: {{ $company->name }}</p>
		
		@isset($company->email)
		    <p>Company email: {{ $company->email }}</p>
		@endisset

		@isset($company->website)
		    <p>Company website: {{ $company->website }}</p>
		@endisset

	</div>
@endsection