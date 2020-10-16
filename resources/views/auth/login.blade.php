@extends('layouts.web')

@section('content')

<style>
#masthead, footer{
	display:none!important;
}
.style-dark .ui-bg-alpha, .style-dark.style-override .ui-bg-alpha, .style-light .style-dark .ui-bg-alpha, .style-dark input, .style-dark.style-override input, .style-light .style-dark input, .style-dark textarea, .style-dark.style-override textarea, .style-light .style-dark textarea, .style-dark select, .style-dark.style-override select, .style-light .style-dark select, .style-dark .seldiv, .style-dark.style-override .seldiv, .style-light .style-dark .seldiv, .style-dark .select2-choice, .style-dark.style-override .select2-choice, .style-light .style-dark .select2-choice, .style-dark .select2-selection--single, .style-dark.style-override .select2-selection--single, .style-light .style-dark .select2-selection--single, .style-dark .plan, .style-dark.style-override .plan, .style-light .style-dark
.plan {
	background-color:#f5f5f5;
	color:#999;
}
body, p, span{ font-size: 18px!important; color: #fff!important;}
input{
	color:#fff!important;
	font-size: 16px!important;

}

h2{
	margin-top: 10px 0!important;
}

input[type="text"]:not(.browser-default),input[type="email"]:not(.browser-default),input[type="password"]:not(.browser-default){

	margin-bottom:20px !important;
	padding: 10px 2.5%!important;
	width: 90%!important;
	background:#fff!important;
}

.style-dark *::-webkit-input-placeholder { /* Chrome/Opera/Safari */
	color:#666!important;
}
.style-dark *::-moz-placeholder { /* Firefox 19+ */
	color: #666!important;
}
.style-dark *:-ms-input-placeholder { /* IE 10+ */
	color: #666!important;
}
.style-dark *:-moz-placeholder { /* Firefox 18- */
	color: #666!important;
}

[type="checkbox"]:not(:checked), [type="checkbox"]:checked {
     position: relative!important;
     opacity: 1!important;
    pointer-events: none;
}
[type="checkbox"]:before {
    display:none;
}

[type="text"]:before {
    background:#fff!important;
}

@media (max-width: 767px) {


		h2{
			margin-top: 0!important;
		}
			.right-s{
				display:none!important;
			}
			input[type="checkbox"]:not(.browser-default){
			width:20px!important;
			height:20px!important;

			}
			input[type="text"]:not(.browser-default),input[type="email"]:not(.browser-default),input[type="password"]:not(.browser-default){
				margin: 0 !important;
				margin-bottom:10px !important;
				padding: 10px 5%!important;
				width: 90%!important;
				background:#fff!important;
			}
			.logob{
				max-width:50%!important;

				}
}

</style>


<div class="main-wrapper" >
	<div class="main-container">
		<div class="page-wrapper">
			<div class="sections-container wp-video" style="height:100vh!important">




								<div class="row quad-top-padding quad-bottom-padding single-h-padding limit-width row-parent row-header">
										<div class=" col-lg-12">


											<a href="/"><img src="/images/survey-logo3.png" class="logob" style="max-width:30%;text-align:center!important;padding-left:10px; "></a>


										 </div>
                  </div>
										 	<div class="clear"></div>


								<div class="row quad-top-padding quad-bottom-padding single-h-padding limit-width ">
										<div class=" col-lg-6"  style="background:none;padding:30px;">
											<div class="uncol style-dark animate_when_almost_visible zoom-in start_animation" data-delay="600" data-speed="600"><div class="uncoltable">
												<div class="uncell  boomapps_vccolumn no-block-padding">

													<div class="uncont" style="padding-top:0px;">
														<div class="clear"></div>



															<form action="{{ route('login') }}" method="post" class="wpcf7-form" novalidate="novalidate">
																{{ csrf_field() }}
																<h2 style="color:#43cb83">Log Into Your Account</h2>

																<span class="wpcf7-form-control-wrap your-email{{ $errors->has('email') ? ' has-error' : '' }}" >
																	<input type="email" name="email" id="email" value="{{ old('email') }}" size="50" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" required autofocus placeholder="Your Email" style="color:#999!important">
																</span>

																<br>
																@if ($errors->has('email'))
																<span class="help-block" style="color:red">
																	<strong>{{ $errors->first('email') }}</strong>
																</span>
																@endif


																<span class="wpcf7-form-control-wrap your-password{{ $errors->has('password') ? ' has-error' : '' }}">
																	<input type="Password" name="password" value="" size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your Password" style="color:#999!important">
																</span>
																<br>
																@if ($errors->has('password'))
																<span class="help-block" style="color:red">
																	<strong>{{ $errors->first('password') }}</strong>
																</span>
																@endif

																<div class="form-group">
																	<div class="col-md-6 col-md-offset-4">
																		<div class="checkbox">
																		<label>
																				<input class="sr-only" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
																			</label><span>Remember Me<span>
																		</div>
																	</div>
																</div>
																<br/>
																<input type="submit" Value="Log In" class="custom-link btn btn-text-skin btn-accent btn-hover-nobg btn-icon-left" style="width:280px;margin-right:20px;padding:30px" > <br/><br/>
																<span><a  href="{{ route('password.request') }}" style="text-align:left;text-transform: capitalize; color:#43cb83">
																	Forgot Your Password?
																</a></span>
                              <div class="clear"></div>
																<span> Do not have an account?
																	<a  href="register" style="text-align:left;text-transform: capitalize; color:#43cb83">
																		Register
																	</a></span>




																<div class="wpcf7-response-output wpcf7-display-none"></div></form>
															<br/><br/>
															</div>


														</div>



													</div></div>	</div>



												<div class=" col-lg-6 right-s" style="padding:30px;">
													<h1 style="color:#fff; font-size:40px;">Creating Surveys has never been easier!</h1>

                        <p style="color:#fff!important; font-size:18px!important;">Track your results on the go, on 360dasa... a world of possibilities!</p>
                          <div style="width:100%; height:500px; overflow:hidden">
													<img src="/images/survey-phone.png" style="width:100%!important;text-align:center; ">
												</div></div>


										</div>
<br/><br/>
											</div></div></div></div>




														@endsection
