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


                     <div class="row top-padding bottom-padding single-h-padding limit-width row-parent" data-imgready="true" style="padding-top:20px;">
                      <style>
                      .table, .table th, .table tr, .table td, table td{
                        border:1px solid #eee;
                        font-weight:normal!important;
                        font-size:12px;
                      }

                      .table a{
                        color:#333!important;
                      }
                      .table a:hover{
                        text-decoration:underline;
                      }

                      </style>



                      <div class="card">
                        <div class="card-content">
                          @if( Session::has( 'success' ))
                            <div class="my-notify-success">
                            <h1>  {{ Session::get( 'success' ) }}</h1>

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


                        <!-- Go to www.addthis.com/dashboard to customize your tools <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50ab87cb42ce6c15"></script> -->
                          <!-- Go to www.addthis.com/dashboard to customize your tools  <div class="addthis_inline_share_toolbox"></div>-->
@if( !Session::has( 'success' ))
                          <h1 class="card-title"> Start Taking Survey</h1>
                          <p>
                            <span class="flow-text">{{ $survey->title }}</span> <br/>
                          </p>
                          <p>
                            <?php echo $survey->description;?>
                            <br/>Created by: <a href="">{{ $survey->user->firstname}} {{$survey->user->last_name}}</a>
                          </p>

                        <div class="divider" style="margin:20px 0px;padding:0px;height:0;"></div>
                          {!! Form::open(array('action'=>array('AnswerController@store', $survey->id))) !!}
                          @forelse ($survey->questions as $key=>$question)
                          <p class="flow-text">Question {{ $key+1 }} - {{ $question->title }}</p>
                          @if($question->question_type === 'text')
                          <div class="input-field col s12">
                            <input id="answer" type="text" name="{{ $question->id }}[answer]" required>
                            <label for="answer">Answer</label>
                          </div>
                          @elseif($question->question_type === 'textarea')
                          <div class="input-field col s12">
                            <textarea id="textarea1" class="materialize-textarea" name="{{ $question->id }}[answer]" required></textarea>
                            <label for="textarea1">Textarea</label>
                          </div>
                          @elseif($question->question_type === 'radio')
                          @foreach($question->option_name as $key=>$value)
                          <p style="margin:0px; padding:0px;">
                            <input name="{{ $question->id }}[answer]" type="radio" id="{{ $question->id }}_{{$key}}" value="{{ $value }}" required />

                            <label for="{{ $question->id }}_{{ $key }}">{{ $value }}</label>
                          </p>
                          @endforeach
                          @elseif($question->question_type === 'checkbox')
                          @foreach($question->option_name as $key=>$value)
                          <p style="margin:0px; padding:0px;">
                            <input type="checkbox" id="{{ $question->id }}_{{$key}}" name="{{ $question->id }}[answer]" value="{{ $value }}"  />
                            <label for="{{ $question->id }}_{{$key}}">{{ $value }}</label>
                          </p>
                          @endforeach
                          @endif
                        <div class="divider" style="margin:20px 0px;padding:0px;height:0;"></div>
                          @empty
                          <span class='flow-text center-align'>Nothing to show</span>
                          @endforelse
                          {{ Form::submit('Submit Survey', array('class'=>'custom-link btn btn-text-skin btn-accent btn-hover-nobg btn-icon-left','style'=>'width:250px;margin-right:20px;padding:30px!important')) }}
                          {!! Form::close() !!}
                          @endif
                        </div>
                      </div>
                    </div></div></div></div>
                  </article>
                </div></div></div></div>

                @stop
