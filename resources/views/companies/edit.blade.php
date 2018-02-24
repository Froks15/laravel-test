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
	<form method="POST" action="/admin/companies/{{ $company->id }}" enctype="multipart/form-data">
	  {{ csrf_field() }}
	  {{ method_field('PUT') }}
	  <div class="form-group">
	    <label for="InputName">Company name</label>
	    <input type="text" value="{{ $company->name }}" name="name" class="form-control" id="InputName" placeholder="Enter company name">
	  </div>
	  <div class="form-group">
	    <label for="InputEmail">Email address</label>
	    <input type="email" value="{{ $company->email }}" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
	  </div>
	  <div class="form-group">
	    <label for="InputWebSite">Company web site</label>
	    <input type="text" value="{{ $company->website }}" name="website" class="form-control" id="InputWebSite" placeholder="Enter company web site">
	  </div>
	  <div class="form-group">
	  	<label for="customFile">Company logo</label>
	  	<div class="custom-file">
	  	  <input type="file" name="logo" class="custom-file-input" id="customFile">
	  	  <label class="custom-file-label" for="customFile">Choose logo</label>
	  	</div>
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
@endsection
