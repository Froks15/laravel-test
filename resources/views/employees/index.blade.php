@extends('layouts.app')

@section('content')
	<div class="container">
		<h3>Employees list:</h3>

		<a href="/admin/employees/create" class="badge badge-primary">Add new employees</a>

		<br> <br>

		<table class="table table-hover table-dark">
		  <thead>
		    <tr>
		      <th scope="col">First name</th>
		      <th scope="col">Last name</th>
		      <th scope="col">Company</th>
		      <th scope="col">Email</th>
		      <th scope="col">Phone</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Delete</th>
		    </tr>
		  </thead>
		  <tbody>
			  @foreach ($employees as $employee)
		          <tr>
		          	<td>
		          		<a href="{{ url('/admin/employees/' . $employee->id) }}">{{ $employee->first_name }}</a>
	          		</td>
		          	<td>{{ $employee->last_name }}</td>
		          	<td><a href="{{ url('admin/companies/' . $employee->company->id) }}">{{ $employee->company->name }}</a></td>
		          	<td>{{ $employee->email }}</td>
		          	<td>{{ $employee->phone }}</td>
		          	<td><a href="/admin/employees/{{ $employee->id }}/edit">Edit</a></td>
		          	<td>
		          		<form action="/admin/employees/{{ $employee->id }}" method="POST">
		          			{{ csrf_field() }}
		          			{{ method_field('DELETE') }}
		          			<button class="btn btn-danger" type="submit">Delete</button>
		          		</form>
		          	</td>
		          </tr>
		      @endforeach
		  </tbody>
		</table>
		{{ $employees->links() }}
	</div>
@endsection