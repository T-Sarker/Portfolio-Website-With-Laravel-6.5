@extends('admin.master')

@section('meta')
	<meta name="description" content="Personal Portfolio with laravel 6.5">
@endsection

@section('title')
	Side Profile | Tapos
@endsection

@section('body')
	<div class="container-fluid mt-3">
		<h3 class="mb-4">Add Profile Details</h3>
		@if(Session::get('message'))
			<span class="alert alert-success">Success</span>
		@endif
		<form action="{{ route('save-profile-details') }}" method="POST" enctype="multipart/form-data">
		@csrf
		  <div class="form-group">
		    <label for="name">Name</label>
		    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="profileName">
		  </div>
		  <div class="form-group">
		    <label for="cv">CV file</label>
		    <input type="file" class="form-control" id="cv" accept=".pdf,.doc,.docx" name="profileCv">
		  </div>
		  <div class="form-group">
		    <label for="image">Image</label>
		    <input type="file" class="form-control" id="image" accept=".jpg,.png,.jpeg" name="profileImage">
		  </div>
		  <div class="form-group">
		    <label for="skill">Skill</label>
		    <input type="text" class="form-control" id="skill" name="profileSkill" placeholder="Example: HTML5">
		  </div>
		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="profileEmail" placeholder="Enter Email">
		  </div>
		  <div class="form-group">
		    <label for="address">Address</label>
		    <input type="text" class="form-control" id="address" name="myLocation" placeholder="Enter Address">
		  </div>
		  <div class="form-group">
		    <label for="Age">Age</label>
		    <input type="text" class="form-control" id="Age" name="ProfileAge" placeholder="Enter Age">
		  </div>
		  <div class="form-group">
		    <label for="dateOfBirth">Date Of Birth</label>
		    <input type="text" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="Enter Date Of Birth">
		  </div>
		  <div class="form-group">
		    <label for="phone">Phone No</label>
		    <input type="tel" class="form-control" id="phone" name="profilePhone" placeholder="Example: 01736302961">
		  </div>
		  <div class="form-group">
		    <label for="country">Residence</label>
		    <input type="text" class="form-control" id="country" name="profileCountry" placeholder="Enter Country">
		  </div>
		  <button type="submit" class="btn btn-success">Submit</button>
		</form>
	</div>
@endsection


