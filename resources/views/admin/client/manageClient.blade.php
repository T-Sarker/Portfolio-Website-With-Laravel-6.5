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
		@if($clients !=null)

			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Image</th>
			      <th scope="col">Name</th>
			      <th scope="col">Designation</th>
			      <th scope="col">Message</th>
			      <th scope="col">Actions</th>
			    </tr>
			  </thead>
			  <tbody>
			  @foreach($clients as $client)
			    <tr>
			      <td><img src="{{ asset('/') }}{{ $client->clientImage }}" style="width:100px;" alt="{{ $client->clientName }}"></td>
			      <td>{{ $client->clientName }}</td>
			      <td>{{ $client->clientJob }}</td>
			      <td>{{ $client->clientMessage }}</td>
			      <td>
			      	<a href="{{ route('edit-client-data',['id'=>$client->id,'name'=>str_replace(' ', '-', $client->clientName)]) }}" class="btn btn-warning">Edit</a>
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
