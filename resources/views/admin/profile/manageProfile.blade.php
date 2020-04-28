@extends('admin.master')

@section('meta')
	jdskcdgcksjdkcjsjkd
@endsection

@section('title')
	Manage Profile | Tapos
@endsection

@section('body')
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
	      	<a href="{{ route('edit-profile-data',['id'=>$myprofile->id,'name'=>str_replace($myprofile->profileName,' ','-')]) }}" class="btn btn-warning">Edit</a>
	      	<a href="" class="btn btn-danger">Delete</a>
	      </td>
	    </tr>
	    
	  </tbody>
	</table>
@endsection
