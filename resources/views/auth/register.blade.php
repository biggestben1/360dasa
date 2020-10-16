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
	color:#ddd!important;
}
.style-dark *::-moz-placeholder { /* Firefox 19+ */
	color: #ddd!important;
}
.style-dark *:-ms-input-placeholder { /* IE 10+ */
	color: #ddd!important;
}
.style-dark *:-moz-placeholder { /* Firefox 18- */
	color: #ddd!important;
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


select {
	background:none!important;
	border:none!important;


}

input, textarea, select, .seldiv, .select2-choice, .select2-selection--single {
	display:block!important;

}

 select,input:not([type]), input[type=text]:not(.browser-default),
 input[type=password]:not(.browser-default), input[type=email]:not(.browser-default),
 input[type=url]:not(.browser-default), input[type=time]:not(.browser-default),
 input[type=date]:not(.browser-default), input[type=datetime]:not(.browser-default),
 input[type=datetime-local]:not(.browser-default), input[type=tel]:not(.browser-default),
 input[type=number]:not(.browser-default), input[type=search]:not(.browser-default),
 textarea.materialize-textarea {
    background-color:none!important;
    border: none;
    border-bottom: none!important;
    border-radius: 0;
		outline-style: solid!important;
    outline-color: #ddd!important;
    outline-width: thin!important;
    height: 3rem!important;
		color:#ccc!important;
    font-size: 1rem;
		margin-bottom:10px !important;
		padding: 10px 5%!important;
		width: 90%!important;
		max-width: 90%!important;
		min-width: 90%!important;
    -webkit-box-shadow: none;
    box-shadow: none;
    -webkit-box-sizing: content-box;
    box-sizing: content-box;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
}


  @media (max-width: 767px) {


      h2{
				margin-top: 0!important;
			}
				.right-s{
					display:none!important;
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

									<form action="{{ route('register') }}" method="post" class="wpcf7-form" novalidate="novalidate">
										{{ csrf_field() }}
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<h2 style="color:#43cb83">Create New Account</h2>


										<span class="wpcf7-form-control-wrap your-email{{ $errors->has('title') ? ' has-error' : '' }}">
											<input type="text" name="title"  size="50" class="" aria-required="true" aria-invalid="false" placeholder="Title" value="{{ old('title') }}" required autofocus style="color:#eee!important;">
										</span>
										<span class="help-block" style="color:red">
											<strong>{{ $errors->first('title') }}</strong>
										</span>

										<span class="wpcf7-form-control{{ $errors->has('firstname') ? ' has-error' : '' }}">
											<input type="text" name="firstname"  size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="First Name" value="{{ old('firstname') }}" required autofocus style="color:#eee!important;">
										</span>
										<span class="help-block" style="color:red">
											<strong>{{ $errors->first('firstname') }}</strong>
										</span>

										<span class="wpcf7-form{{ $errors->has('first_name') ? ' has-error' : '' }}">
											<input type="text" name="last_name" size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Last Name" value="{{ old('last_name') }}" required autofocus style="color:#eee!important;">
										</span>
										<span class="help-block" style="color:red">
											<strong>{{ $errors->first('last_name') }}</strong>
										</span>



										<span class="wpcf7-form-control-wrap ">
											<select  class="select" name="country" id="country" onchange="showUser2(this.value)" >
												<option>Country</option>
												@foreach ($users as $user)
												<option value="{{$user->id}}"@if (old('country') == '{{$user->id}}') selected="selected" @endif>{{$user->country}}</option>
												@endforeach
											</select>
										</span>
										<span class="help-block" style="color:red">
											<strong>{{ $errors->first('country') }}</strong>
										</span>




										<span class="wpcf7-form{{ $errors->has('email') ? ' has-error' : '' }}">
											<input type="email" name="email" id="email" size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Email " value="{{ old('email') }}" required >
										</span>
										@if ($errors->has('email'))
										<span class="help-block" style="color:red">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
										@endif
										<span class="wpcf7-form{{ $errors->has('password') ? ' has-error' : '' }}">
											<input type="password" name="password" id="password" size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="password " value="" required >
										</span>@if ($errors->has('password'))
										<span class="help-block" style="color:red">
											<strong>{{ $errors->first('password') }}</strong>
										</span>@endif

										<span class="wpcf7-form">
											<input type="password" name="password_confirmation" id="password-confirm" size="50"  placeholder="Confirm Password  " value="" required >
										</span>
											<div id=""></div>                                                            <br/>
											<input type="submit" Value="Sign Up" class="custom-link btn btn-text-skin btn-accent btn-hover-nobg btn-icon-left" style="width:280px;margin-right:20px;padding:30px" ><br/>
											<span>Already have an Account? <a href="login"style="text-align:left;text-transform: capitalize; color:#43cb83">Login</a></span><br/>

											<p  style="color:#fff!important; font-size:14px!important;font-weight:normal!important;">
												All fields are required. By clicking "Sign Up" you confirm that you have read and agree to 360Survey's <a href="terms.html" style="text-align:left;color:#43cb83">Terms of Use</a> and also agree to recieve tips and News via email.
											</p>
                   <div class="wpcf7-response-output wpcf7-display-none"></div>

									</form>



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


						<script>
						function showUser2(str) {
							//alert('ben');
							if (str == "") {

								document.getElementById("phone_no").innerHTML = "";
								return;
							} else {
								if (window.XMLHttpRequest) {
									// code for IE7+, Firefox, Chrome, Opera, Safari
									xmlhttp = new XMLHttpRequest();
								} else {
									// code for IE6, IE5
									xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
								}
								xmlhttp.onreadystatechange = function() {
									if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
										document.getElementById("postalcode").value = xmlhttp.responseText;
									}
								}
								xmlhttp.open("GET","/getzipcode/?id="+str,true);
								xmlhttp.send();
							}
						}
						</script>

						@endsection
