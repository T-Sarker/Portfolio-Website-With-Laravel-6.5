@extends('admin.master')

@section('meta')
	<meta name="description" content="Personal Portfolio with laravel 6.5">
@endsection

@section('title')
	Manage Portfolio | Tapos
@endsection

@section('body')
	<div class="container-fluid mt-3">
		<h3 class="mb-4">Manage Portfolio</h3>
		@if(Session::get('message'))
			<span class="alert alert-success">{{ Session::get('message') }}</span>
		@endif
		@if(!empty($galleries))
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Image</th>
			      <th scope="col">Title</th>
			      <th scope="col">Heading</th>
			      <th scope="col">Link</th>
			      <th scope="col">Actions</th>
			    </tr>
			  </thead>
			  <tbody>
			    @foreach($galleries as $gallery)
			    <tr>
			      <td><img src="{{ asset('/') }}{{ $gallery->galleryImage }}" alt="{{ $gallery->galleryTitle }}" style="width:100px;"></td>
			      <td>{{ $gallery->galleryTitle }}</td>
			      <td>{{ $gallery->galleryHeading }}</td>
			      <td>{{ $gallery->galleryLink }}</td>
			      <td>
			      	<a href="{{ route('edit-gallery-media-data',['id'=>$gallery->id,'name'=>str_replace(' ', '-', $gallery->galleryTitle)]) }}" class="btn btn-warning">Edit</a>
			      	
			      	<a href="" class="btn btn-danger" onclick="
						event.preventDefault();
						var check = confirm('Are You Sure?');
						if(check){
							document.getElementById('del-form{{ $gallery->id }}').submit();
						}
			      	">Delete</a>
			      	<form action="{{ route('delete-gallery-media') }}" method="POST" id="del-form{{ $gallery->id }}">
			      	@csrf
						<input type="hidden" value="{{ $gallery->id }}" name="id">
			      	</form>
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
