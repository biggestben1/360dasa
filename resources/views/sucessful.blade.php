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


    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">






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
            <div class="post-body"><div class="post-content">

                    </br>

                    <style>
                        .table, .table th, .table tr, .table td, table td{
                            border:1px solid #eee;
                            font-weight:normal!important;
                            font-size:12px;
                        }

                        .table a{
                            color:#0A246A!important;
                        }
                        .table a:hover{
                            text-decoration:underline;
                        }


                    </style>



                    <div class="row top-padding bottom-padding single-h-padding limit-width row-parent" data-imgready="true">
                        <h2>Survey Report</h2>
                        <hr/ style="color:#eee">
                        <h4>Topic: {{$teams->topic->topics}}</h4>
                        <table class="table table-hover">

                            <thead>
                            <tr style="background:#f5f5f5; padding:20px; line-height:50px; text-transform:uppercase">
                                <th width="30%">Questions</th>
                                <th width="30%">Answers</th>

                            </tr>
                            </thead>
                            <tbody>

                                        <?php  $var=$teams->sulution;?>

                                        <?php  $osi = json_decode($var);
                                        $i=0;
                                        foreach (json_decode($var) as $key => $area)
                                        {
                                        $i =$i+1;
                                        $vegetables = explode("-", $key);
                                        $getv= $vegetables[0];

                                        if($getv=='checkbox'){
                                            $ben=$area;
                                            ?>

                                            <td>

                                        <?php
                                        foreach ($ben as  $area2)
                                        {
                                            ?><?php echo $area2;?><br/>
                                            <?php
                                        }
                                        ?>
                                        </td><?php
                                        }

elseif($key=='_token'){ echo'';}
elseif($key=='topic_id'){ echo'';}
                                        elseif ( $i & 1 ) {?><tr>
                                        <td>
                                        <?php  print_r($area);
                                        //echo $key;?>
                                        </td>


                                         <?php
                                         } else {
                                        ?>

                                            <?php //echo $key;?>
                                            <td><?php print_r($area);?></td>
                                        </tr>
                                        <?php
                                                }
                                        //$i=0;
                                        echo ' ';
                                        //}
                                        // this is your area from json response
                                        //$i++;
                                       // if($i==2) break;
                                        }
                                        ?>







                            </tbody>
                        </table>


                        <br/><br/>
                        <hr/ style="color:#eee">
                    </div>


                    <div class="row top-padding bottom-padding single-h-padding limit-width row-parent" data-imgready="true">
                        <h4>Latest Surveys</h4>
                        <table class="table table-hover">

                            <thead>
                            <tr style="background:#f5f5f5; padding:20px; line-height:50px; text-transform:uppercase">
                                <th>Surveys</th>
                                <th>No of Partcipants</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="">Rhapsody of Realities Reader</a> </td>
                                <td>64,640</td>
                            </tr>
                            <tr>
                                <td><a href="">How much do you love Jesus?</a></td>
                                <td>1,547,748</td>

                            </tr>

                            </tbody>
                        </table>



                    </div>

                    </br></br>
                    <div style="clear:both"></div>

                </div></div></div>

    </article>

    </div></div></div></div></div>



@endsection

