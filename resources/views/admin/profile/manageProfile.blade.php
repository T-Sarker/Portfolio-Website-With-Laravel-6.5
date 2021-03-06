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
		@if($myprofile !=null)
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Image</th>
			      <th scope="col">Name</th>
			      <th scope="col">BirthDay</th>
			      <th scope="col">Phone</th>
			      <th scope="col">Email</th>
			      <th scope="col">Actions</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td><img src="{{ asset('/') }}{{ $myprofile->profileImage }}" alt="{{ $myprofile->profileName }}" style="width:100px;"></td>
			      <td>{{ $myprofile->profileName }}</td>
			      <td>{{ $myprofile->dateOfBirth }}</td>
			      <td>{{ $myprofile->profilePhone }}</td>
			      <td>{{ $myprofile->profileEmail }}</td>
			      <td>
			      	<a href="{{ route('edit-profile-data',['id'=>$myprofile->id,'name'=>str_replace(' ', '-', $myprofile->profileName)]) }}" class="btn btn-warning">Edit</a>
			      	<a href="" class="btn btn-danger">Delete</a>
			      </td>
			    </tr>
			    
			  </tbody>
			</table>
			@else
				{{ 'no data found' }}
		@endif
	</div>
@endsection
