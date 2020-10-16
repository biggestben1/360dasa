@extends('layouts.web')

@section('content')
<style>
body.menu-custom-padding .col-lg-0.logo-container, body.menu-custom-padding .col-lg-12 .logo-container {
  padding-top: 20px;
  padding-bottom: 20px;
}
.color-accent-color, .wpcf7 .wpcf7-mail-sent-ok, .wpcf7 .wpcf7-validation-errors, .wpcf7 span.wpcf7-not-valid-tip, .nav-tabs > li.active > a, .panel-title.active > a, .panel-title.active > a span:after, .plan-accent.plan .plan-title > h3, .plan-accent.plan .plan-price .price {
  color:#666!important;
}

.ui-page-theme-a a, html .ui-bar-a a, html .ui-body-a a, html body .ui-group-theme-a a {
  border-color: #eee !important;
  /*font-size:12px!important;*/
  color:#fff!important;
}


.ui-br-accent, .nav-tabs>li.active>a, .tabs-left>li.active>a {
  border-color: #eee !important;
  padding:10px 5px!important;
  /*font-size:12px!important;*/
  color:#38c!important;
  background:#f5f5f5;
}





.nav-tabs > li {
  margin-bottom: -1px;
  border:none!important;
}


.tab-content {
  padding: 0px 0px 0px 0px;
}

.nav {
  margin-bottom:0!important;
  text-transform:capitalize;
}

.ui-page-theme-a .ui-btn, html .ui-bar-a .ui-btn, html .ui-body-a .ui-btn, html body .ui-group-theme-a .ui-btn, html head+body .ui-btn.ui-btn-a, .ui-page-theme-a .ui-btn:visited, html .ui-bar-a .ui-btn:visited, html .ui-body-a .ui-btn:visited, html body .ui-group-theme-a .ui-btn:visited, html head+body .ui-btn.ui-btn-a:visited {
  background-color:#3CC!important;
  color:#fff!important;
  text-shadow:none!important;
}

#sjfb-wrap h3 {
  font-size:14px;
  font-wieight:bold;
}



</style>
<!--survey forms-->



<!-- CSS -->

<div class="main-wrapper">
  <div class="main-container">
    <div class="page-wrapper">
      <div class="sections-container" style="height:auto;">



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


                <div class="row quad-top-padding  limit-width row-parent row-header" style="height:80px;">
                  <div class="row-inner" style=" margin-bottom: -1px;">
                </div></div></div></div></div>






                  <article id="post-54944" class="page-body style-color-xsdn-bg post-54944 page type-page status-publish has-post-thumbnail hentry page_category-classic page_category-top-menu">
                    <div class="post-wrapper">
                      <div class="post-body"><div class="post-content">

                      </br>

                      <style>
                      body{font-size: 16px!important}
                      .table, .table th, .table tr, .table td, table td{
                        border:1px solid #eee;
                        font-weight:normal!important;
                        font-size:16px;
                      }
                      p,a{font-size:18px;}

                      .table a{
                        color:#333!important;
                      }
                      input[type='text']{
                       font-size: 16px!important;
                       color:#666!important;

                      }

                      label {
                        font-size:14px!important;
                        color: #666;
                      }
                    .table a:hover{
                        text-decoration:underline;
                      }

                      .btn{ padding:5px!important; box-shadow:none!important;}

                      a.btn{font-size: 12px; padding:8px 10px!important; text-transform: capitalize!important;}
                      .divcount{ font-weight:bold;}
                      .collapsible-header span{ margin-right: 10px; font-size: 20px}

                      .my-notify-info, .my-notify-success, .my-notify-warning, .my-notify-error {
    padding:10px;
    margin:10px 0;

}

.my-notify-success {
    color: #4F8A10;
    background-color: #DFF2BF;
}

                      </style>


                    <div class="row top-padding bottom-padding single-h-padding limit-width row-parent" data-imgready="true" style="padding-top:20px;">
                      <div class="col-lg-12">
                      <div class="card">
                        <div class="card-content">




                                                    <h1>Add contact to database </h1>

                                                    @if( Session::has( 'success' ))
                                                      <div class="my-notify-success">
                                                    {{ Session::get( 'success' ) }}
                                                    </div>
                                                    @elseif( Session::has( 'warning' ))
                                                    {{ Session::get( 'warning' ) }} <!-- here to 'withWarning()' -->
                                                    @endif

                                                    @if ($errors->any())

                                                    <div class="alert alert-danger">
                                                      <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                      </ul>
                                                    </div>
                                                    @endif

                                                    <form action="{{ route('contact') }}" method="post">
                                                      {{ csrf_field() }}





                                                      <div class="form-group" style="padding-bottom:20px"><label class="control-label">Title:</label>
                                                        <input type="text" name="title" required class="form-control" placeholder="Enter Title" value="{{old('name')}}">
                                                      </div>
                                                      <div class="form-group" style="padding-bottom:20px"><label class="control-label">First Name:</label>
                                                        <input type="text" name="first_name" required class="form-control" placeholder="Enter first name" value="{{old('first_name')}}">
                                                      </div>
                                                      <div class="form-group" style="padding-bottom:20px"><label class="control-label">Last Name:</label>
                                                        <input type="text" name="last_name" required class="form-control" placeholder="Enter last name" value="{{old('last_name')}}">
                                                      </div>
                                                      <div class="form-group" style="padding-bottom:20px"><label class="control-label">Phone Number:</label>
                                                        <input type="text" name="phone_number" required class="form-control" placeholder="Enter Phone Number" value="{{old('phone_number')}}">
                                                      </div>
                                                      <div class="form-group" style="padding-bottom:20px"><label class="control-label">Email Address:</label>
                                                        <input type="email" name="email" required class="form-control" placeholder="Enter Email" value="{{old('email')}}">
                                                      </div>
                                                      <div class="form-group" style="padding-bottom:20px"><label class="control-label">Address:</label>
                                                        <input name="address" class="form-control" placeholder="Enter Address"> {{old('address')}}</textarea>
                                                      </div>

                                                      <div class="form-group" style="padding-bottom:20px"><label class="control-label">Country:</label>
                                                        <input type="text" name="country" required class="form-control" placeholder="Enter Country" value="{{old('country')}}">
                                                      </div>

                                                      <input type="hidden" name="dbid" id="dbid" value="{{Request::segment(2)}}"   />
                                                      <button type="submit" name="submitted" class="custom-link btn btn-text-skin btn-accent btn-hover-nobg btn-icon-left" style="width:280px;margin-right:20px;padding:30px!important">Submit Contact</button>


                                                    </form>


                        </div>
                        </div>
                      </div></div></div>
                    </div></div>
              </div>
            </article>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
            <script>
            var count = 1000;
              {
                $('.divcount').slice(0, count).each(function(i){
                $(this).append(i+1);
                });
            }

            </script>
          </div></div></div></div>

                      @stop
