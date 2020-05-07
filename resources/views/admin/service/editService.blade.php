@extends('admin.master')

@section('meta')
	<meta name="description" content="Personal Portfolio with laravel 6.5">
@endsection

@section('title')
	Edit Service | Tapos
@endsection

@section('body')
	<div class="container-fluid mt-3">
		<h3 class="mt-3 mb-3">Add Service</h3>
		@if(Session::get('message'))
			<span class="alert alert-success mt-3 mb-3">Successful</span>
		@endif

		@if($service)
		<form action="{{ route('update-service') }}" method="POST">
		@csrf
			<div  class="form-group">
				<label for="serviceIcon">Service Icon</label>
				<input type="text" class="form-control" id="serviceIcon" name="serviceIcon" value="{{ $service->serviceIcon }}">
				<input type="hidden" value="{{ $service->id }}" name="id">
				@error('serviceIcon')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
			<div  class="form-group">
				<label for="servicetitle">Service Title</label>
				<input type="text" class="form-control" id="servicetitle" name="servicetitle" value="{{ $service->serviceTitle }}">
				@error('servicetitle')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
			<div  class="form-group">
				<label for="serviceDetails">Service Details</label>
				<textarea class="form-control" id="serviceDetails" name="serviceDetails">{{ $service->serviceDetails }}</textarea>
				@error('serviceDetails')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>

			<button type="submit" class="btn btn-success" name="submit">Submit</button>
		</form>
			@else
				{{ 'Nothing Found' }}
		@endif
	</div>
@endsection