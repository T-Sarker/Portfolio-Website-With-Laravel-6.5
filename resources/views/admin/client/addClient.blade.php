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
		<form action="{{ route('insert-client-message') }}" method="POST" enctype="multipart/form-data">
		@csrf
			
			<div class="form-group">
				<label for="clientName">Client Name</label>
				<input type="text" class="form-control" name="clientName" placeholder="Client Name" value="{{ old('clientName') }}">
				@error('clientName')
					{{ $message }}
				@enderror
			</div>
			<div class="form-group">
				<label for="clientJob">Client Designation</label>
				<input type="text" class="form-control" name="clientJob" placeholder="Client Designation" value="{{ old('clientJob') }}">
				@error('clientJob')
					{{ $message }}
				@enderror
			</div>
			<div class="form-group">
				<label for="clientImage">Client Image</label>
				<input type="file" class="form-control" name="clientImage" accept=".PNG,.png,.jpg,.JPG,.JPEG,.gif,.GIF">
				@error('clientImage')
					{{ $message }}
				@enderror
			</div>

			<div class="form-group">
				<label for="clientMessage">Client Message</label>
				<textarea class="form-control" name="clientMessage" id="clientMessage" placeholder="Client Message"></textarea>
				@error('clientMessage')
					{{ $message }}
				@enderror
			</div>
			<button type="submit" class="btn btn-success" name="submit">Submit</button>
		</form>
	</div>
@endsection