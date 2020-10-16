@extends('layouts.web')

@section('content')
</div>

<div class="main-wrapper">
    <div class="main-container">
        <div class="page-wrapper">
            <div class="sections-container" style="height:auto;>



<div id="page-header" data-imgready="true" class="header-style-dark">

            <div class="header-wrapper header-uncode-block">
                <div data-parent="true" class="style-color-836294-bg row-container with-parallax boomapps_vcrow" data-section="0">
                    <div class="row-background background-element">
                        <div class="background-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                            <div class="background-inner self-video uncode-video-container" style="background-repeat: no-repeat; background-position: center center; background-size: cover; opacity: 1;">
                                <div style="width: 640px;" class="wp-video">
                                    <!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
                                    <img src="{{asset('images/mainbg.jpg')}}">
                                </div></div>
                            <!--<div class="block-bg-overlay style-color-836294-bg" style="opacity: 0.92;"></div>-->
                        </div>
                    </div>


                    <div class="row quad-top-padding  limit-width row-parent row-header" style="height:80px;
<div class="row-inner" style=" margin-bottom: -1px; ">
                </div></div></div></div></div>

<article id="post-54944" class="page-body style-color-xsdn-bg post-54944 page type-page status-publish has-post-thumbnail hentry page_category-classic page_category-top-menu">
    <div class="post-wrapper">
        <div class="post-body"><div class="post-content">


                <div class="row top-padding bottom-padding single-h-padding limit-width row-parent" data-imgready="true">



                      <!--  <input value="" type="file" name="image" id="image">
                        <input type="submit" Value="Update Pics" class=" btn btn-text-skin borderless btn-color-68bd00 btn-circle" style=" background:green; float:left" ><b></b>-->
                    <div class=" col-md-12 col-lg-7 ">



                        <h1 style="color:#428bca;">ACCOUNT INFORMATION</h1>
<h1 style="color:green">  @if( Session::has( 'success' ))
      {{ Session::get( 'success' ) }}
  @elseif( Session::has( 'warning' ))
      {{ Session::get( 'warning' ) }} <!-- here to 'withWarning()' -->
      @endif
</h1>
                        <h2>  Personal Information</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <br/>

                        <form class="wpcf7-form" novalidate="novalidate" method="POST" action="{{ route('updateprofile') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <span class="wpcf7-form-control-wrap your-email">
<input type="text" name="title" value="{{$user->title}}" size="50" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Title">
</span>

                        <br/>
                        <span class="wpcf7-form-control-wrap your-password">
<input type="text" name="firstname" value="{{$user->firstname}}" size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="First Name">
</span>

                        <br/>
                        <span class="wpcf7-form-control-wrap">
<input type="text" name="last_name" value="{{$user->last_name}}" size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Last Name">
</span>

                        <br/>
                        <select  name="gender">
                            <option>Select</option>

                            <option value="Male" @if ($user->gender == 'Male') selected="selected" @endif>Male</option>
                            <option value="Female" @if ($user->gender == 'Female') selected="selected" @endif>Female</option>


                        </select>


                        <br/>
                        <select  name="country" id="country" onchange="showUser2(this.value)" >
                            <option>Select</option>
                            @foreach ($country as $country)

                                <option value="{{$country->id}}"@if ($user->country == $country->id) selected="selected" @endif>{{$country->country}}</option>
                            @endforeach

                        </select>
                        <br/>
                        <span class="wpcf7-form-control-wrap">
<input type="text" name="phonenumber" value="{{$user->phone_number}}" size="50" class="wpcf7-form-control wpcf7-password wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Phone Number">
</span>






                        <input type="submit" Value="Update Profile" class=" btn btn-text-skin borderless btn-color-68bd00 btn-circle" style=" background:green; float:left" >


                    </div>




                </div>

            </div>

@endsection
