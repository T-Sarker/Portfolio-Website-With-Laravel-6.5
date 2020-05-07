@extends('admin.master')

@section('meta')
	<meta name="description" content="Personal Portfolio with laravel 6.5">
@endsection

@section('title')
	Manage Profile | Tapos
@endsection

@section('body')
	<div class="container-fluid mt-3">
		<h3 class="mb-4">Add Profile Details</h3>
		@if(Session::get('message'))
			<span class="alert alert-success">{{ Session::get('message') }}</span>
		@endif
		@if($services !=null)

			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Icon</th>
			      <th scope="col">Title</th>
			      <th scope="col">Description</th>
			      <th scope="col">Actions</th>
			    </tr>
			  </thead>
			  <tbody>
			  @foreach($services as $service)
			    <tr>
			      <td><i class="{{ $service->serviceIcon }}"></i></td>
			      <td>{{ $service->serviceTitle }}</td>
			      <td>{{ $service->serviceDetails }}</td>
			      <td>
			      	<a href="{{ route('edit-service-data',['id'=>$service->id,'name'=>str_replace(' ', '-', $service->serviceTitle)]) }}" class="btn btn-warning">Edit</a>
			      	<a href="" class="btn btn-danger">Delete</a>
			      </td>
			    </tr>
			  @endforeach
			  </tbody>
			</table>
			@else
				{{ 'no data found' }}
		@endif
	</div>
@endsection
