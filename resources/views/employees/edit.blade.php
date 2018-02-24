@extends('layouts.app')

@section('content')
	<div class="container">
	<br>
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<form method="POST" action="/admin/employees/{{ $employee->id }}" enctype="multipart/form-data">
		  {{ csrf_field() }}
		  {{ method_field('PUT') }}
		  <div class="form-group">
		    <label for="InputFirstName">First name</label>
		    <input type="text" value="{{ $employee->first_name }}" name="first_name" class="form-control" id="InputFirstName" placeholder="First name">
		  </div>
		  <div class="form-group">
		    <label for="InputLastName">Last name</label>
		    <input type="text" value="{{ $employee->last_name }}" name="last_name" class="form-control" id="InputLastName" placeholder="Last name">
		  </div>
		  <div class="form-group">
		    <label for="InputCompanyId">CompanyId</label>
		    <input type="text" value="{{ $employee->companies_id }}" name="companies_id" class="form-control" id="InputCompanyId" placeholder="Company id">
		  </div>
		  <div class="form-group">
		    <label for="InputEmail">Email</label>
		    <input type="email" value="{{ $employee->email }}" name="email" class="form-control" id="InputEmail" placeholder="Email">
		  </div>
		  <div class="form-group">
		    <label for="InputPhone">Phone</label>
		    <input type="text" value="{{ $employee->phone }}" name="phone" class="form-control" id="InputPhone" placeholder="Phone">
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection