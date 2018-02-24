@extends('layouts.app')

@section('content')
	<div class="container">
		<h3>Companies list:</h3>

		<a href="/admin/companies/create" class="badge badge-primary">Add new company</a>

		<br> <br>

		<table class="table table-hover table-dark">
		  <thead>
		    <tr>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Web site</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Delete</th>
		    </tr>
		  </thead>
		  <tbody>
			  @foreach ($companies as $company)
		          <tr>
			          	<td>
			          		<a href="/admin/companies/{{ $company->id }}">{{ $company->name }}</a>
		          		</td>
			          	<td>{{ $company->email }}</td>
			          	<td><a href="#">{{ $company->website }}</a></td>
			          	<td><a href="/admin/companies/{{ $company->id }}/edit">Edit</a></td>
			          	<td>
			          		<form action="/admin/companies/{{ $company->id }}" method="POST">
			          			{{ csrf_field() }}
			          			{{ method_field('DELETE') }}
			          			<button class="btn btn-danger" type="submit">Delete</button>
			          		</form>
			          	</td>
		          </tr>
		      @endforeach
		  </tbody>
		</table>
		{{ $companies->links() }}
	</div>
@endsection