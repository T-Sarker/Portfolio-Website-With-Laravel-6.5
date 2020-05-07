@extends('admin.master')

@section('meta')
	<meta name="description" content="Personal Portfolio with laravel 6.5">
@endsection

@section('title')
	Edit About | Tapos
@endsection

@section('body')
	<div class="container-fluid mt-3">
		@if(Session::get('message'))
		<span class="alert alert-success mb-4">{{ Session::get('message') }}</span>
		@endif
		<form action="{{ route('update-about-details') }}" method="POST" enctype="multipart/form-data">
		@csrf
		  <div class="form-group">
		    <label for="title">About Title</label>
		    <input type="text" class="form-control" id="title" name="aboutTitle" value="{{ $about->aboutTitle }}" required>
		    <input type="hidden" value="{{ $about->id }}" name="aboutId">
		    @error('aboutTitle')
		    	{{ $message }}
		    @enderror
		  </div>

		  <div class="form-group">
		  	<label class="" for="customFile">About Image</label>
		  	<input type="file" class="form-control" name="aboutImage" accept=".jpg,.JPG,.PNG,.png,.jpeg,.JPEG">
		  	<img src="{{ asset('/') }}{{ $about->aboutImage }}" style="width:50px;height:50px;">
		  	@error('aboutImage')
		    	{{ $message }}
		    @enderror
		  </div>

		  <div class="form-group">
		    <label for="details">About Details</label>
		    <textarea class="form-control" id="details" rows="3" name="aboutDetails" required>{{ $about->aboutDetails }}</textarea>
		    @error('aboutDetails')
		    	{{ $message }}
		    @enderror
		  </div>
		  <button type="submit" class="btn btn-success" name="submit">Submit</button>
		</form>
	</div>
@endsection