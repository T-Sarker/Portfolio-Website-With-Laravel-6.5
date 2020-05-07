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
		<form action="{{ route('save-gallery-group-name') }}" method="POST">
		@csrf
			<div class="form-group">
				<label for="galleryGroup">Group Name</label>
				<input type="text" class="form-control" name="groupName" placeholder="website" value="{{ old('groupName') }}">
			</div>
			<button type="submit" class="btn btn-success" name="submit">Submit</button>
		</form>
	</div>
@endsection