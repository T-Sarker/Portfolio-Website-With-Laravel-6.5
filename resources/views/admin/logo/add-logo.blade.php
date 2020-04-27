@extends('admin.master')

@section('title')
	Add | Logo
@endsection


@section('body')
	<div class="container-fluid mt-3">
		<h3 class="mb-4">ADD A LOGO</h3>
		@if (Session::get('message'))
			<h4 class="text-success">{{ Session::get('message') }}</h4>
		@endif
		<form action="{{ route('save-logo') }}" method="POST" enctype="multipart/form-data">
		@csrf


		<div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
		  </div>
		  <div class="custom-file">
		    <input type="file" class="custom-file-input" name="logoImage" accept=".jpeg, .jpg, .png">
		    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
		    
		  </div>
		  	
		</div>
		@error('logoImage')
				<p class="text-danger">{{ $message }}</p>
		    @enderror
		  <div class="form-group">
		  	
		    <label for="imageName">Image Name</label>
		    <input type="text" class="form-control" id="imageName" name="imageName">
		    @error('imageName')
				<span class="text-danger">{{ $message }}</span>
		    @enderror
		  </div>
		  	
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection