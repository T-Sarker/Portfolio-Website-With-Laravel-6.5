@extends('admin.master')

@section('meta')
	<meta name="description" content="Personal Portfolio with laravel 6.5">
@endsection

@section('title')
	Manage Profile | Tapos
@endsection

@section('body')
	<div class="container-fluid mt-3">
		<h3 class="mb-4">Manage Abouts</h3>
		@if(Session::get('message'))
			<span class="alert alert-success">{{ Session::get('message') }}</span>
		@endif
		@if($about !=null)

			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Image</th>
			      <th scope="col">Title</th>
			      <th scope="col">Details</th>
			      <th scope="col">Actions</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td><img src="{{ asset('/') }}{{ $about->aboutImage }}" alt="{{ $about->aboutImage }}" style="width:100px;"></td>
			      <td>{{ $about->aboutTitle }}</td>
			      <td style="width:30%;">{{ substr($about->aboutDetails,0,100)."..." }}</td>
			      <td>
			      	<a href="{{ route('edit-about-data',['id'=>$about->id,'name'=>str_replace(' ', '-', $about->aboutTitle)]) }}" class="btn btn-warning">Edit</a>
			      	
			      	<a href="" class="btn btn-danger" onclick="
						event.preventDefault();
						var check = confirm('Are You Sure?');
						if(check){
							document.getElementById('del-form{{ $about->id }}').submit();
						}
			      	">Delete</a>
			      	<form action="{{ route('delete-about') }}" method="POST" id="del-form{{ $about->id }}">
			      	@csrf
						<input type="hidden" value="{{ $about->id }}" name="id">
			      	</form>
			      </td>
			    </tr>
			    
			  </tbody>
			</table>
			@else
				{{ 'no data found' }}
		@endif
	</div>
@endsection
