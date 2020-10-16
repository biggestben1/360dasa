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

        .form-control{ border:1px #eee solid;min-width:50%;max-width:100%}
        .control-label{width:200px!important}
        select{width:auto;}


        fieldset{margin-bottom:10px;border:1px solid #eee!important}
    </style>
    <!--survey forms-->



    <!-- CSS -->





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
                                    <div style="width: 640px; background:#3F51B5;" class="wp-video">
                                        <!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->

                                    </div></div>
                                <!--<div class="block-bg-overlay style-color-836294-bg" style="opacity: 0.92;"></div>-->
                            </div>
                        </div>


                        <div class="row quad-top-padding  limit-width row-parent row-header" style="height:80px;
<div class="row-inner" style=" margin-bottom: -1px;">
                    </div></div></div></div></div>

    <article id="post-54944" class="page-body style-color-xsdn-bg post-54944 page type-page status-publish has-post-thumbnail hentry page_category-classic page_category-top-menu">
        <div class="post-wrapper">

            <div class="post-body"><div class="post-content" style="padding:30px;">


                    <div data-imgready="true" >

                        <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50ab87cb42ce6c15"></script>
                        <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
                        <h1 style=" color: #00AA00;  font-size:40px; font-weight: lighter">{{$topics->topic}}</h1>
    <?php  $var=$topics->description;?>
    <?php  $id=$topics->id;?>
    @if( Session::has( 'success' ))
        {{ Session::get( 'success' ) }}
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

    <form action="{{ route('surveyadd') }}" method="post">
        <input type="hidden" name="id" value="<?php echo $value = Crypt::encrypt($id);?>">
        <div class="form-group"><label class="control-label">Name:</label>
            <input type="text" name="name" required class="form-control" placeholder="Enter name" value="{{old('name')}}">
        </div>
        <div class="form-group"><label class="control-label"> Phone:</label>
            <input type="text" name="phonenumber"  class="form-control" required placeholder="Enter phone Number " value="{{old('phonenumber')}}">
        </div>
        <div class="form-group"><label class="control-label">Country:</label>

                <select class="form-control" name="country" required id="country" onchange="showUser2(this.value)" >
                    <option>Select</option>
                    @foreach ($users as $user)

                        <option value="{{$user->id}}"@if (old('country') == '{{$user->id}}') selected="selected" @endif>{{$user->country}}</option>
                    @endforeach

                </select>
        </div>


        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label control-label">E-Mail Address:</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    <?php  $osi = json_decode($var);
    $i=0;

    $count =0;
    $json_a = json_decode($var, true);
    $i=0;?>
    <ol>
    <?php
            //echo count($json_a);
    foreach ($json_a as $person_name => $person_a) {

        for($i=0; $i<count($person_a['question']); $i++) {
        $count = $count+1;
       ?>
        <div class="form-group">

          <li> <strong style=" color: #00AA00;  font-size:25px; font-weight: lighter"><?php echo  $person_a['question'][$i];?></strong><br>
            <input type="hidden" name="question[]" value="<?php echo  $person_a['question'][$i];?>">
            <fieldset class="m" >
                A<label class="checkbox-inline i-checks">
                    <input type="hidden" name="obja[]" value="<?php echo  $person_a['obja'][$i];?>">
                    <input type="hidden" name="objb[]" value="<?php echo  $person_a['objb'][$i];?>">
                    <input type="hidden" name="objc[]" value="<?php echo  $person_a['objc'][$i];?>">
                    <input type="hidden" name="objd[]" value="<?php echo  $person_a['objd'][$i];?>">
                    <input type="hidden" name="aobj[]" value="<?php echo  $person_a['aobj'][$i];?>">
                    <input type="hidden" name="bobj[]" value="<?php echo  $person_a['bobj'][$i];?>">
                    <input type="hidden" name="cobj[]" value="<?php echo  $person_a['cobj'][$i];?>">
                    <input type="hidden" name="dobj[]" value="<?php echo  $person_a['dobj'][$i];?>">
                    <input type="radio" id="inlineCheckbox2" value="a" name="appsDetails[][q<?php echo $count;?>]"><i></i></label><?php echo $person_a['obja'][$i];?><br>
                B<label class="checkbox-inline i-checks">
                    <input type="radio" id="inlineCheckbox2" value="b" name="appsDetails[][q<?php echo $count;?>]"><i></i></label><?php echo $person_a['objb'][$i];?><br>
                C<label class="checkbox-inline i-checks">
                    <input type="radio" id="inlineCheckbox2" value="c" name="appsDetails[][q<?php echo $count;?>]"><i></i></label><?php echo $person_a['objc'][$i];?> <br>
                D<label class="checkbox-inline i-checks">
                    <input type="radio" id="inlineCheckbox2" value="d" name="appsDetails[][q<?php echo $count;?>]"><i></i></label><?php echo $person_a['objd'][$i];?><br>
            </fieldset>
        </li>
        <?php
            }
       // $i =$i+1;
    }

    //$i=0;
    echo ' ';
    //}
    // this is your area from json response
    //$i++;
    // if($i==2) break;

    ?>
    </ol>
        {{ csrf_field() }}
        <button type="submit" name="submitted" class="btn btn-sm btn-info m">Submit Assessment</button>


    </form>

            </div></div>


@endsection

