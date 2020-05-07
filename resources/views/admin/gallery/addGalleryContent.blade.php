@extends('admin.master')

@section('meta')
	<meta name="description" content="Personal Portfolio with laravel 6.5">
@endsection

@section('title')
	About | Tapos
@endsection

@section('body')
	<div class="container-fluid mt-3">
		<h3>Add Gallery Groups</h3>

		@if(Session::get('message'))
			<span class="alert alert-success">{{ Session::get('message') }}</span>
		@endif
		<form action="{{ route('insert-Gallery-media') }}" method="POST" enctype="multipart/form-data">
		@csrf
			<div class="form-group">
				<label for="galleryGroup">Group Name</label>
				<select class="form-control" name="galleryHeading">
				  <option disabled selected>Choose..</option>
				  @if($heading)
				  	@foreach($heading as $head)
				  		<option value="{{ $head['groupName'] }}">{{ $head['groupName'] }}</option>
				  	@endforeach
				 @endif
				</select>
			</div>
			<div class="form-group">
				<label for="galleryTitle">Title</label>
				<input type="text" class="form-control" name="galleryTitle" placeholder="Title" value="{{ old('galleryTitle') }}">
			</div>
			<div class="form-group">
				<label for="galleryLink">Link</label>
				<input type="text" class="form-control" name="galleryLink" placeholder="Link" value="{{ old('galleryLink') }}">
			</div>
			<div class="form-group">
				<label for="galleryTitle">Image</label>
				<input type="file" class="form-control" name="galleryImage" accept=".PNG,.png,.jpg,.JPG,.JPEG,.gif,.GIF">
			</div>
			<button type="submit" class="btn btn-success" name="submit">Submit</button>
		</form>
	</div>
@endsection