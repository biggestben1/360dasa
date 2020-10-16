@extends('layouts.web')

@section('content')

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

                          <div class="card">
                            <div class="card-content">



                              <form method="POST" action="/question/{{ $question->id }}/update">
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" required>
                                <h2 class="flow-text">Edit Question Title</h2>
                                <div class="row">
                                  <div class="input-field col s12">
                                    <input type="text" name="title" id="title" value="{{ $question->title }}" required>
                                    <label for="title">Question</label>
                                    {{ $question->question_type }}
                                    <div class="input-field col s12" >
                                      <select class="browser-default" name="question_type" id="question_type" style="padding:5px; border:none; height:3rem;border-bottom: 1px solid #9e9e9e;" required>

                                        <option value="checkbox"<?php if($question->question_type =='checkbox'){ ?>selected="selected" <?php } ?> title="Checkbox">Multiple Choice</option>
                                        <option value="radio" <?php if($question->question_type =='radio'){ ?>selected="selected" <?php } ?> title="Radio Button">Single Choice</option>
                                        <option value="textarea"  <?php if($question->question_type =='textarea'){ ?>selected="selected" <?php } ?>  title="Textarea">Multi Line Text</option>
                                        <option value="text"  <?php if($question->question_type =='text'){ ?>selected="selected" <?php } ?>  title="Text">Single Line Text</option>


                                      </select>
                                    </div>
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
                                  </div>

                                  <div class="input-field col s12">
                                    <button class="custom-link btn btn-text-skin btn-accent  btn-hover-nobg btn-icon-left" style="width:250px;margin-right:20px;padding:30px!important">Update</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div></div></div></div>
                      </article>
                    </div></div></div></div>


                    @stop
