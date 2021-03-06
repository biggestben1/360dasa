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
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">{{ __('Dashboard') }}</div>

                                        <div class="card-body">
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif

                                            <a href="/questionnaires/create" class="btn btn-dark "> Create New Questionnaire</a>
                                        </div>
                                    </div>


                                    <div class="card">
                                        <div class="card-header">My Questionnaires</div>

                                        <div class="card-body">
                                            <ul class="list-group">
                                                @foreach($questionnaires as $questionnaire)
                                                    <li class="list-group-item">
                                                        <a href="{{ $questionnaire->path() }}">{{ $questionnaire->title }}</a>
                                                        <div class="mt-2">
                                                            <small class="font-weight-bold">Share URL</small>
                                                            <p>
                                                                <a href="{{ $questionnaire->publicPath() }}">{{ $questionnaire->publicPath() }}</a>
                                                            </p>
                                                        </div>

                                                        <div class="card-footer">
                                                            <a href="/questionnaires/edit/{{ $questionnaire->id }}/"> <button type="submit" class="btn-sm btn-outline-info">Edit</button></a>

                                                            <form action="/questionnaires/{{ $questionnaire->id }}" method="post">
                                                                @method('DELETE')
                                                                @csrf

                                                                <button type="submit" class="btn-sm btn-outline-danger">Delete Questionnaire</button>
                                                            </form>
                                                        </div>

                                                    </li>
                                                @endforeach
                                            </ul>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <br/><br/><br/><br/>
                </div></div></div></div>


@endsection
