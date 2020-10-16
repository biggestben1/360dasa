@extends('layouts.web')

@section('content')
<?php  $id = Auth::user()->id;
$user_id = $survey->user_id;
 if($id != $user_id){
  ?>
  <script>
  // your "Imaginary javascript"
   window.location.href = '{{url("/home")}}';

  </script>
  <?php
 }
?>

{{ $survey->user_id }}
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
                        font-size:14px;
                      }
                      p,a{font-size:18px;}

                      .table a{
                        color:#333!important;
                      }
                      .table a:hover{
                        text-decoration:underline;
                      }

                      .btn{ padding:5px!important; box-shadow:none!important;}

                      a.btn{font-size: 12px; padding:8px 10px!important; text-transform: capitalize!important;}
                      .divcount{ font-weight:bold;}
                      .collapsible-header span{ margin-right: 10px; font-size: 20px}
                      </style>


                    <div class="row top-padding bottom-padding single-h-padding limit-width row-parent" data-imgready="true" style="padding-top:20px;">
                      <div class="col-lg-12">
                      <div class="card">
                        <div class="card-content">

                          <h1> {{ $survey->title }}</h1>
                          <p>
                            <?php echo $survey->description;?>
                          </p>
                          <br/>
                           <a href='view/{{$survey->id}}' class="btn btn-accent">Take Survey</a>
                           <a href="{{$survey->id}}/edit" class="btn btn-accent">Edit Survey</a>
                           <a href="/survey/answers/{{$survey->id}}" class="btn btn-accent">View Answers</a>
                           <a href="#doDelete" style="float:right;" class="modal-trigger btn btn-accent">Delete Survey</a>
                          <!-- Modal Structure -->
                          <!--  Fix the Delete aspect -->
                          <div id="doDelete" class="modal bottom-sheet">
                            <div class="modal-content">
                              <div class="container">
                                <div class="row">
                                  <h4>Are you sure?</h4>
                                  <p>Do you wish to delete this survey called "{{ $survey->title }}"?</p>
                                  <div class="modal-footer">
                                    <a href="/survey/{{ $survey->id }}/delete" class=" modal-action waves-effect waves-light btn-flat red-text">Delete</a>
                                    <a class=" modal-action modal-close waves-effect waves-light green white-text btn">Cancel</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="divider" style="margin:20px 0px;padding:0px;height:0;"></div>
                          <h2 class="flow-text left-align">Questions</h2>
                          <ul class="collapsible" data-collapsible="expandable">
                            @forelse ($survey->questions as $question)
                            <li style="box-shadow:none;">
                              <div class="collapsible-header"><span class="divcount" style="margin:0;">Q </span><span>:</span> <span> {{ $question->title }} </span> <a href="/question/{{ $question->id }}/edit" style="float:right!important;" >Edit</a> &ensp;&ensp;<a href="/deleteq/{{ $question->id }}" style=" color:red; float:right!important;" >Delete</a></div>
                              <div class="collapsible-body">
                                <div style="margin:5px; padding:10px;">
                                  {!! Form::open() !!}
                                  @if($question->question_type === 'text')
                                  {{ Form::text('title')}}
                                  @elseif($question->question_type === 'textarea')
                                  <div class="row">
                                    <div class="input-field col s12">
                                      <textarea id="textarea1" class="materialize-textarea"></textarea>
                                      <label for="textarea1">Provide answer</label>
                                    </div>
                                  </div>
                                  @elseif($question->question_type === 'radio')
                                  @foreach($question->option_name as $key=>$value)
                                  <p style="margin:0px; padding:0px;">
                                    <input type="radio" id="{{ $key }}"  />
                                    <label for="{{ $key }}">{{ $value }}</label>
                                  </p>
                                  @endforeach
                                  @elseif($question->question_type === 'checkbox')
                                  @foreach($question->option_name as $key=>$value)
                                  <p style="margin:0px; padding:0px;">
                                    <input type="checkbox" id="{{ $key }}" />
                                    <label for="{{$key}}">{{ $value }}</label>
                                  </p>
                                  @endforeach
                                  @endif
                                  {!! Form::close() !!}
                                </div>
                              </div>
                            </li>
                            @empty
                            <div style="padding:20px!important; box-shadow:none!important;color:red">Nothing to show. Add questions below.</div>
                            @endforelse
                          </ul>

                          <div class="row top-padding bottom-padding single-h-padding limit-width row-parent">
                              <p class="flow-text">Add A New Question</p>
                          <form method="POST" action="{{ $survey->id }}/questions" id="boolean">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">

                              <div class="input-field col s12">
                                <input name="title" id="title" type="text" required>
                                <label for="title">Enter A New Question Here</label>
                              </div>



                              <div class="input-field col s12" >
                                <select class="browser-default" name="question_type" id="question_type" style="padding:5px; border:none; height:3rem;border-bottom: 1px solid #9e9e9e;" required>
                                  <option value="" disabled selected>Choose Prefered Option</option>
                                  <option value="checkbox" title="Checkbox">Multiple Choice</option>
                                  <option value="radio" title="Radio Button">Single Choice</option>
                                  <option value="textarea" title="Textarea">Multi Line Text</option>
                                  <option value="text" title="Text">Single Line Text</option>


                                </select>
                              </div>

                              <!-- this part will be chewed by script in init.js -->
                              <span class="form-g"></span>

                              <div class="input-field col s12">
                                <button class="custom-link btn btn-text-skin btn-accent  btn-hover-nobg btn-icon-left"style="width:250px;margin-right:20px;padding:30px!important">Submit</button>
                              </div>
                            </div>
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
