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
		<form method="POST" action="/admin/employees" enctype="multipart/form-data">
		  {{ csrf_field() }}
		  <div class="form-group">
		    <label for="InputName">First name</label>
		    <input type="text" name="first_name" class="form-control" id="InputName" placeholder="First name">
		  </div>
		  <div class="form-group">
		    <label for="InputLastName">Last name</label>
		    <input type="text" name="last_name" class="form-control" id="InputLastName" placeholder="Last name">
		  </div>
		  <div class="form-group">
		    <label for="InputCompanyId">Company id</label>
		    <input type="text" name="companies_id" class="form-control" id="InputCompanyId" placeholder="Enter company id">
		  </div>
		  <div class="form-group">
		    <label for="InputEmail">Email</label>
		    <input type="text" name="email" class="form-control" id="InputEmail" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="InputPhone">Phone</label>
		    <input type="text" name="phone" class="form-control" id="InputPhone" placeholder="Enter phone">
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection