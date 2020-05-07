@extends('admin.master')

@section('meta')
	<meta name="description" content="Personal Portfolio with laravel 6.5">
@endsection

@section('title')
	Service | Tapos
@endsection

@section('body')
	<div class="container-fluid mt-3">
		<h3 class="mt-3 mb-3">Add Service</h3>
		@if(Session::get('message'))
			<span class="alert alert-success mt-3 mb-3">Successful</span>
		@endif
		<form action="{{ route('insert-service') }}" method="POST">
		@csrf
			<div  class="form-group">
				<label for="serviceIcon">Service Icon</label>
				<input type="text" class="form-control" id="serviceIcon" name="serviceIcon" placeholder="Example: fa fa-bell " value="{{ old('serviceIcon') }}">
				@error('serviceIcon')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
			<div  class="form-group">
				<label for="servicetitle">Service Title</label>
				<input type="text" class="form-control" id="servicetitle" name="servicetitle" placeholder="Service Title " value="{{ old('servicetitle') }}">
				@error('servicetitle')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
			<div  class="form-group">
				<label for="serviceDetails">Service Details</label>
				<textarea class="form-control" id="serviceDetails" name="serviceDetails" placeholder="Service Details">{{ old('serviceDetails') }}</textarea>
				@error('serviceDetails')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>

			<button type="submit" class="btn btn-success" name="submit">Submit</button>
		</form>
	</div>
@endsection