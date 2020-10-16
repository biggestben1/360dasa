@extends('layouts.web')

@section('content')

<style>
#masthead{
	display:none!important;
}
.style-dark .ui-bg-alpha, .style-dark.style-override .ui-bg-alpha, .style-light .style-dark .ui-bg-alpha, .style-dark input, .style-dark.style-override input, .style-light .style-dark input, .style-dark textarea, .style-dark.style-override textarea, .style-light .style-dark textarea, .style-dark select, .style-dark.style-override select, .style-light .style-dark select, .style-dark .seldiv, .style-dark.style-override .seldiv, .style-light .style-dark .seldiv, .style-dark .select2-choice, .style-dark.style-override .select2-choice, .style-light .style-dark .select2-choice, .style-dark .select2-selection--single, .style-dark.style-override .select2-selection--single, .style-light .style-dark .select2-selection--single, .style-dark .plan, .style-dark.style-override .plan, .style-light .style-dark
 .plan {
    background-color:#f5f5f5;
	color:#666!important;
}
input{

    color: #666!important;
}


select {
     width: none!important;
     max-width: none!important;
     min-width: none!important;
     -webkit-appearance: !important;
     appearance: !important;

}

input, textarea, select, .seldiv, .select2-choice, .select2-selection--single {
    width: 100%;
	color:#666!important;
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
</style>

    <script src="http://demo.expertphp.in/js/jquery.js"></script>
    </div>

    <div class="main-wrapper">
        <div class="main-container">
            <div class="page-wrapper">
                <div class="sections-container">



                    <div id="page-header" data-imgready="true" class="header-style-dark">

                        <div class="header-wrapper header-uncode-block">
                            <div data-parent="true" class="style-color-836294-bg row-container with-parallax boomapps_vcrow" data-section="0">
                                <div class="row-background background-element">
                                    <div class="background-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                        <div class="background-inner self-video uncode-video-container" style="background-repeat: no-repeat; background-position: center center; background-size: cover; opacity: 1;">
                                            <div style="width: 640px; background:#3F51B5;" class="wp-video">
                                                <!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->

                                            </div></div>
                                        <!--<div class="block-bg-overlay style-color-836294-bg" style="opacity: 0.92;"></div>-->
                                    </div>
                                </div>


                                <div class="row  single-h-padding limit-width row-parent row-header" data-height-ratio="80" data-row-header="true" data-imgready="true">
                                    <div class="row-inner" style=" margin-bottom: -1px;">

                                        <div class="pos-left pos-center align_left column_parent col-lg-4">
                                            <div class="uncol style-dark animate_when_almost_visible zoom-in start_animation" data-delay="600" data-speed="600"><div class="uncoltable">
                                                    <div class="uncell  boomapps_vccolumn no-block-padding">

													<div class="uncont" style="padding-top: 0px;">
                                                            <div class="clear"></div>

                                                    <div class="clear"></div>
														 <div style=" width:auto; margin:0 auto; padding:20px; text-align:center; ">
														     <img src="http://www.the360surveys.com/public/images/survey-logo3.png" style="max-width:30%!important;text-align:center; ">
                                                         </div>
                                                       <div style="background:#fff; width:auto; max-width:500px; margin:0 auto; padding:30px; text-align:center; color:#999">

                                                            <form action="{{ route('register') }}" method="post" class="wpcf7-form" novalidate="novalidate">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <h2 style="color:#43cb83">Create New Account</h2>

                                                                <br/>
                                                                <span class="wpcf7-form-control-wrap your-email{{ $errors->has('title') ? ' has-error' : '' }}">
<input type="text" name="title"  size="50" class="" aria-required="true" aria-invalid="false" placeholder="Title" value="{{ old('title') }}" required autofocus style="color:#eee!important;">
</span>
                         <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                                                <br/>
                                                                <span class="wpcf7-form-control{{ $errors->has('firstname') ? ' has-error' : '' }}">
<input type="text" name="firstname"  size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="First Name" value="{{ old('firstname') }}" required autofocus style="color:#eee!important;">
</span>

       <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>                                                         <br/>
                                                                <span class="wpcf7-form{{ $errors->has('first_name') ? ' has-error' : '' }}">
<input type="text" name="last_name" size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Last Name" value="{{ old('last_name') }}" required autofocus style="color:#eee!important;">
</span>

       <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>

                                                                <br/>

                                                              <span class="wpcf7-form-control-wrap">
                                      <select  name="gender">
      <option>Gender</option>

   <option value="Male" @if (old('gender') == 'Male') selected="selected" @endif>Male</option>
     <option value="Female" @if (old('gender') == 'Female') selected="selected" @endif>Female</option>


                                                                        </select>

                                                                </span>


       <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>

                                                                <br/>

                                                                 <span class="wpcf7-form-control-wrap ">
																 <select  name="country" id="country" onchange="showUser2(this.value)" >
                                                                            <option>Country</option>
                                                                            @foreach ($users as $user)

                                                                                <option value="{{$user->id}}"@if (old('country') == '{{$user->id}}') selected="selected" @endif>{{$user->country}}</option>
                                                                            @endforeach

                                                                        </select>

                                                                </span>

       <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                                                <br/>
                                                                <span class="wpcf7-form{{ $errors->has('postalcode') ? ' has-error' : '' }}">
<input type="text" name="postalcode" id="postalcode" size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Postal Code " value="{{ old('postalcode') }}" required >
</span>
<span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('postalcode') }}</strong>
                                    </span><br/>


                                                                <span class="wpcf7-form{{ $errors->has('phone_number') ? ' has-error' : '' }}">
<input type="tel" name="phone_number" id="phone_number" size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Phone Number " value="{{ old('phone_number') }}" required >
</span>

<span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span><br/>
                                                                <span class="wpcf7-form{{ $errors->has('email') ? ' has-error' : '' }}">
<input type="email" name="email" id="email" size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Email " value="{{ old('email') }}" required >
</span>
                                                                @if ($errors->has('email'))
                                                             <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span><br/>
                                                                @endif<br/>
                                                                <span class="wpcf7-form{{ $errors->has('password') ? ' has-error' : '' }}">
<input type="password" name="password" id="password" size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="password " value="" required >
</span><br/>@if ($errors->has('password'))
                                                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                                @endif

                                                                <span class="wpcf7-form">
<input type="password" name="password_confirmation" id="password-confirm" size="50"  placeholder="Confirm Password  " value="" required >
                                                                <div id=""></div>                                                            <br/>
                                                                <input type="submit" Value="Sign Up" class=" btn btn-text-skin borderless btn-color-68bd00 btn-circle" style=" background:green;color:#fff!important " ><br/>
                                                                <span style="text-align:left; opacity:0.8; color:#666; padding:0 10px;">Already have an Account? <a href="login"style="text-align:left;text-transform: capitalize; color:#43cb83">Login</a></span><br/>

                                                                <span style="text-align:left; opacity:0.8; color:#666;clear:both">
                                                                    All fields are required. By clicking "Sign Up" you confirm that you have read and agree to 360Survey's <a href="terms.html" style="text-align:left;color:#43cb83">Terms of Use</a> and also agree to recieve tips and News via email.
                                                                </span>


                                                        </div>
                                                        <div class="wpcf7-response-output wpcf7-display-none"></div></form>
														</div>



                                                    </div></div></div></div>
                                    </div>





                        </div></div></div></div></div>

        <article id="post-54944" class="page-body style-color-xsdn-bg post-54944 page type-page status-publish has-post-thumbnail hentry page_category-classic page_category-top-menu">
            <div class="post-wrapper">
                <div class="post-body"><div class="post-content">

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
