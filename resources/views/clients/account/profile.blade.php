@extends('layouts.layout-header-and-footer')
@section('content')
<div class="top-brands">
		<div class="container">
		<div class="section group">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="background-color: #f1f1f1;text-align: center;">
				<br>
				<h1>Dashboard</h1>
				<br>
				<h1>
					<img src="{{ asset('uploads/users/'. Auth::user()->avatar) }}" width="100px" height="100px">
					<br>
					{{ Auth::user()->name }}
				</h1>
				<br>
				<ul>
					<li style="background-color: #53EF0E;padding:7px">
						<a class="ico ico-user" href="{{ url('profile') }}">
							<p style="font-size: 20px;">Profile</p>
						</a>
					</li>
				</ul>
				<br>
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				@if(Session::has('success_change_profile'))
					<p style="color: #00F0FF">{{ Session::get('success_change_profile') }}</p>
				@endif

				@if(Session::has('success_change_password'))
					<p style="color: #00F0FF">{{ Session::get('success_change_password') }}</p>
				@endif
				

				{!! Form::open(['method' => 'POST', 'url' => 'profile/'.Auth::user()->id, 'files' => true]) !!}

					<label for="username">Name</label>
					{!! Form::text('name', Auth::user()->name, ['id' => 'username', 
													 				'class' => 'form-control']) !!}
					<br>
					<label for="gender">Gender</label><br>
					<div style="margin-left: 30px;margin-top: 5px">
						{!! Form::radio('gender', 'male', true) !!}Male
						{!! Form::radio('gender', 'female') !!}Female
					</div>
					<br>
					<label for="email">Email</label>
					{!! Form::email('email', Auth::user()->email, ['id' => 'email',
																  'readonly' => true,
																  'class' => 'form-control']) !!}
					<br>
					<label for="dob">Dob</label>
					{!! Form::date('birthday', Auth::user()->birthday, ['id' => 'dob',
															   'class' => 'form-control']) !!}
					<br>
					<label for="address">Address</label>
					{!! Form::text('address', Auth::user()->address, ['id' => 'address',
															   'class' => 'form-control']) !!}
					<br>
					<label for="phone">Phone</label>
					{!! Form::text('phone', Auth::user()->phone, ['id' => 'phone',
															   'class' => 'form-control']) !!}
					<br>
					<label for="avatar">Avatar</label>
					{!! Form::file('avatar', ['class' => 'form-control']) !!}
					<br>
					{!! Form::submit('Edit') !!}

				{!! Form::close() !!}
				
					<a class="btn btn-primary" href="{{ url('profile/change-password') }}" style="color: white;margin-top: 10px">
						Change password
					</a>
			</div>
		</div>
	</div>
</div>
@endsection
