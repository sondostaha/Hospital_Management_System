@extends('Dashboard.layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
<style>
	.loginForm{
		display: none;
	}
</style>
@endsection
@section('title')
User Login
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('Dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' .'user' .'/'. $page='dashboard') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>Welcome back!</h2>
												<div class="form-group">
													<label for="exampleFormControlSelect1">which type you want to signin</label>
													<select class="form-control" id="selector">
														<option value="" selected disabled>Please chooses one of them </option>
														<option value="user">User</option>
														<option value="admin">Admin</option>
														<option ></option>
												
													</select>
												</div>
										{{-- Form User --}}
											<div class="loginForm" id="user">

												<h5 class="font-weight-semibold mb-4">User SingIn</h5>
												<form action="{{ route('login') }}" method="POST">
												@csrf
													<div class="form-group">
														<label>Email</label> 
														<input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ old('password') }}"  required autocomplete="email" autofocus>
														@error('email')
														<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
													
													<div class="form-group">
														<label>Password</label> 
														<input id="password"  type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="current-password" >
														@error('password')
														<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												
													<button type="submit" class="btn btn-main-primary btn-block" >Sign In</button>
													<div class="row row-xs">
														<div class="col-sm-6">
															<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
														</div>
													</div>
												</form>
												<div class="main-signin-footer mt-5">
													<p><a href="">Forgot password?</a></p>
													<p>Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></p>
												</div>
											</div>
										{{-- End Form User --}}
										{{-- Form Admin --}}
											<div class="loginForm" id="admin">

												<h5 class="font-weight-semibold mb-4">Admin SingIn</h5>
												<form action="{{ route('admin.login') }}" method="POST">
												@csrf
													<div class="form-group">
														<label>Email</label> 
														<input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ old('password') }}"  required autocomplete="email" autofocus>
														@error('email')
														<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
													
													<div class="form-group">
														<label>Password</label> 
														<input id="password"  type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="current-password" >
														@error('password')
														<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												
													<button type="submit" class="btn btn-main-primary btn-block" >Sign In</button>
													<div class="row row-xs">
														<div class="col-sm-6">
															<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
														</div>
													</div>
												</form>
												<div class="main-signin-footer mt-5">
													<p><a href="">Forgot password?</a></p>
													<p>Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></p>
												</div>
											</div>
											
										{{-- End Form Admin --}}
										
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
<script>
$('#selector').change(function(){
	var myId = $(this).val();
	$('.loginForm').each(function () { 
		 myId == $(this).attr('id') ? $(this).show() : $(this).hide();
	});
})
</script>
@endsection