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
	padding: 10px!important;
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

</style>

  <script src="http://demo.expertphp.in/js/jquery.js"></script>
<div class="main-wrapper" >
	<div class="main-container">
		<div class="page-wrapper">
			<div class="sections-container wp-video" style="height:100vh!important">




								<div class="row quad-top-padding quad-bottom-padding single-h-padding limit-width row-parent row-header">
										<div class=" col-lg-12">
                            <br/><br/>

											<a href="/"><img src="/images/survey-logo3.png" style="max-width:30%!important;text-align:center; "></a>


										 </div>
                  </div>
										 	<div class="clear"></div>


								<div class="row quad-top-padding quad-bottom-padding single-h-padding limit-width ">
										<div class=" col-lg-6"  style="background:none;padding:30px;">
											<div class="uncol style-dark animate_when_almost_visible zoom-in start_animation" data-delay="600" data-speed="600"><div class="uncoltable">
												<div class="uncell  boomapps_vccolumn no-block-padding">

													<div class="uncont" style="padding-top:0px;">
														<div class="clear"></div>



														<div class="">
																@if (session('status'))
																		<div class="alert alert-success">
																				{{ session('status') }}
																		</div>
																@endif

														<div style="">
														<form class="wpcf7-form" novalidate="novalidate" method="POST" action="{{ route('password.request') }}">
																{{ csrf_field() }}

																<input type="hidden" name="token" value="{{ $token }}">
																<h2>Reset Password</h2>

																<br/>
																<span class="wpcf7-form-control-wrap your-email{{ $errors->has('email') ? ' has-error' : '' }}">E-Mail Address
														<input type="email" name="email"  size="50" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="E-Mail Address" value="{{ $email or old('email') }}" required autofocus>
														</span>

																@if ($errors->has('email'))
																		<span class="help-block">
														<strong>{{ $errors->first('email') }}</strong>
														</span>
																@endif
																<br/>

																<span class="wpcf7-form{{ $errors->has('password') ? ' has-error' : '' }}">Password
														<input type="password" name="password" id="password" size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="password " value="" required >
														</span><br/>@if ($errors->has('password'))
																		<span class="help-block">
														<strong>{{ $errors->first('password') }}</strong>
														</span>
																@endif

																<span class="wpcf7-form">Password Confirm
														<input type="password" name="password_confirmation" id="password-confirm" size="50"  placeholder="Password Confirm " value="" required >
																<div id=""></div>                                                            <br/>
																		@if ($errors->has('password_confirmation'))
																				<span class="help-block">
														<strong>{{ $errors->first('password_confirmation') }}</strong>
														</span>
																		@endif
														<input type="submit" Value="Reset Password"  class="custom-link btn btn-text-skin btn-accent btn-hover-nobg btn-icon-left" style="width:280px;margin-right:20px;padding:30px" >
														</p><br/><br/>



														</div>
														<div class="wpcf7-response-output wpcf7-display-none"></div></form>
														</div>




															<br/><br/>
															</div>


														</div>



													</div></div>	</div>



												<div class=" col-lg-6" style="padding:30px;">
													<h1 style="color:#fff; font-size:40px;">Access to the360surveys anytime, anywhere</h1>

                        <p style="color:#fff!important; font-size:18px!important;">Easily create surveys and track results on the go with the360surveys mobile app, now available in the App Store.</p>
                          <div style="width:100%; height:500px; overflow:hidden">
													<img src="/images/survey-phone.png" style="width:100%!important;text-align:center; ">
												</div></div>


										</div>
<br/><br/>
											</div></div></div></div>




														@endsection
