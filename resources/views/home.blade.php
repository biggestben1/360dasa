@extends('layouts.web')

@section('content')
<?php $id=Auth::user()->id;?>
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


                        <div class="row quad-top-padding  limit-width row-parent row-header" style="height:auto;">
<div class="row-inner" style=" margin-bottom: -1px;">
                    </div></div></div></div></div>

    <article id="post-54944" class="page-body style-color-xsdn-bg post-54944 page type-page status-publish has-post-thumbnail hentry page_category-classic page_category-top-menu">
        <div class="post-wrapper">
            <div class="post-body"><div class="post-content">

                    <div class="row top-padding bottom-padding single-h-padding limit-width row-parent" data-imgready="true" style="padding-top:20px;">

                        <div class="top-padding bottom-padding col-lg-6" style="background:#f5f5f5; text-align:center; border:3px solid #fff;">
                            <a href="/survey/new"><span style="font-size:14px; color:#666"> Number's of Survey Created</span></a></br>
                            <a href="/survey/new"> <span style="font-size:40px; color:#666">{{ \App\Survey::where(['user_id' => $id])->get()->count() }}</span></a>
                        </div>



                        <div class="top-padding bottom-padding col-lg-6" style="background:#f5f5f5; text-align:center;border:3px solid #fff;">
                            <a href="{{ route('viewnewdb') }}"><span style="font-size:14px; color:#666"> Database</span></a></br>
                            <a href="{{ route('viewnewdb') }}"><span style="font-size:40px; color:#666">{{ \App\Contactedb::where(['user_id' => $id])->get()->count() }}</span></a>
                        </div>

                        <div style="clear:both"></div>
                      </hr style="color:#eee;">

                  </div>



                      <div class="btnwr1" data-imgready="true" style="width:100%; margin:25px auto 20px; text-align:center">

                          <a href="/survey/new" class="custom-link btn btn-text-skin btn-accent btn-hover-nobg btn-icon-left" style="width:280px;margin-right:20px;padding:30px">Create Survey</span></a>
                          <a href="{{ route('viewnewdb') }}" class="custom-link btn btn-text-skin btn-color-210407 btn-hover-nobg btn-icon-left" style="width:280px; padding:30px; background:#257771!important;">Add Database</span></a>

                          </hr>
                      </div>



                        <div style="clear:both"></div>

                                                  </div>


                    <div class="row top-padding bottom-padding single-h-padding limit-width row-parent" data-imgready="true">

                        <table class="table table-hover">

                                <th class="collection-header">
                                    <h2 class="flow-text">Recent Surveys  </h2>

                                  </th>
                                  <th>
                                        <h2 style="float:right; text-align:right;">Action</h2>

                                </th>

                          <tbody>
                            @foreach ($posts as $survey)

                            <tr>
                                <td class="collection-item"> <span style="font-size:16px;"> {{ link_to_route('detail.survey', $survey->title, ['id'=>$survey->id])}}</span></td>
                                <td class="collection-item">
                                      <a href="survey/view/{{ $survey->id }}" title="Take Survey" class="secondary-content"><i class="material-icons">send</i></a>
                                      <a href="survey/{{ $survey->id }}" title="Edit Survey" class="secondary-content"><i class="material-icons">edit</i></a>
                                      <a href="survey/answers/{{ $survey->id }}" title="View Survey Answers" class="secondary-content"><i class="material-icons">textsms</i></a>
                                      <a href="/sendtoall/{{ $survey->id }}" title="View Survey Answers" class="secondary-content">send to all</a>

                                </td>
                            </tr>
                            @endforeach

                            <?php echo $posts->render(); ?>
                          </tbody>
                        </table>

                </div></div></div>

    </article>
<br/><br/><br/><br/>
    </div></div></div></div>


@endsection
