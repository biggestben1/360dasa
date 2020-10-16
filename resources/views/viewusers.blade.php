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



    <h1 style=" color: #00AA00;  font-size:40px; font-weight: lighter"><?php
        $objectives_id=$teams[0]->objectives_id;
        $users = DB::select("select * from objectives where id ='$objectives_id'");
        foreach ($users as $user){
            $total= $user->total;
           echo  $topic= $user->topic;
        }
        ?></h1>
    <?php  //$var=$topics->description;?>

                        @foreach($teams as $item)


        <div class="form-group"><label class="control-label">Name:</label>
            {{$item->name}}
        </div>
        <div class="form-group"><label class="control-label"> Phone:</label>
            {{$item->phonenumber}}
        </div>
        <div class="form-group"><label class="control-label">Country:</label>
<?php
            $country =$teams[0]->country;
            $posts = DB::select("select * from regions where id ='$country'");
            foreach ($posts as $post){
            echo $post->country ;
            //echo  $topic= $user->topic;
            }
?>
        </div>


        <div class="form-group">
            <label control-label">E-Mail Address:</label>
            {{$item->email}}


            </div>
        </div>
                    @endforeach
    <?php  $description=$teams[0]->description;
                    $osi = json_decode($description);
    $i=0;

    $count =0;
    $json_a = json_decode($description, true);
    $i=0;?>
    <ol>
    <?php
            //echo count($json_a);
    foreach ($json_a as $person_name => $person_a) {

        for($i=0; $i<count($person_a['question']); $i++) {
        $count = $count+1;
         $q = "q$count";
       ?>
        <div class="form-group">

          <li> <strong style=" color: #00AA00;  font-size:25px; font-weight: lighter"><?php echo  $person_a['question'][$i];?></strong><br>
              You Answer Was <?php   echo $person_a['ans'][$i][$q];?>
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


            </div></div>

@endsection

