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
                            color:#333!important;
                        }
                        .table a:hover{
                            text-decoration:underline;
                        }

                    </style>

                    <div class="row top-padding bottom-padding single-h-padding limit-width row-parent" data-imgready="true">
                        <h2>Survey Report</h2>
                        <hr style="color:#eee">
                        <h4>{{$topics->topic}}</h4>
                        <?php  $var=$topics->description;
                        $total =$topics->total;
                        ?>
                        <table class="table table-hover">

                            <thead>
                            <tr style="background:#; padding:15px; line-height:50px; text-transform:uppercase">
                                <th width="30%">Questions</th>
                                <th width="70%">Users Choice (%)</th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php
                            if(!$total==0){
                            $osi = json_decode($var);
                            $i=0;

                            $count =0;
                            $json_a = json_decode($var, true);
                            $i=0;?>
                            <?php
                            //echo count($json_a);
                            foreach ($json_a as $person_name => $person_a) {

                                for($i=0; $i<count($person_a['question']); $i++) {
                                    $count = $count+1;
                                    ?>
                            <tr style="background:#f5f5f5; padding:15px; text-align:left; line-height:50px; font: bold;">
                                <td colspan="2" style="">(<?php echo $count;?>)  <?php echo  $person_a['question'][$i];?></td>



                            </tr>

                            <tr>
                                <td> (A) <?php echo $person_a['obja'][$i];
                                    $aobj=$person_a['aobj'][$i];
                                    $score = $aobj/$total*100;?> </td>
                                <td><div class="w3-light-grey"><div class="w3-container w3-blue" style="width:<?php echo $score;?>%"><?php echo round($score);?>%</div></div></td>

                            </tr>

                            <tr>
                                <td>(B) <?php echo $person_a['objb'][$i];
                                    //echo "<br>";
                                     $bobj=$person_a['bobj'][$i];
                                   // echo "<br>";
                                   // echo $total;
                                    $scoreb = $bobj/$total*100;?> </td>
                                <td><div class="w3-light-grey"><div class="w3-container w3-lime" style="width:<?php echo $scoreb;?>%"><?php echo round($scoreb);?>%</div></div></td>

                            </tr>

                            <tr>
                                <td>(C) <?php echo $person_a['objc'][$i];
                                    $cobj=$person_a['cobj'][$i];
                                    $scorec = $cobj/$total*100;?> </td>
                                <td><div class="w3-light-grey"><div class="w3-container w3-red" style="width:<?php echo $scorec;?>%"><?php echo round($scorec);?>%</div></div></td>

                            </tr>

                            <tr>
                                <td>(D) <?php echo $person_a['objd'][$i];
                                //echo "<br>";
                                     $dobj=$person_a['dobj'][$i];
                                    //echo "<br>";
                                    //echo $total;
                                    $scored = $dobj/$total*100;?> </td>
                                <td><div class="w3-light-grey"><div class="w3-container w3-green" style="width:<?php echo $scored;?>%"><?php echo round($scored);?>%</div></div></td>

                            </tr>
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


                            <tr style="background:#f5f5f5; padding:20px; text-align:left; line-height:50px;">
                                <th>Total No Of Partcipants</th>
                                <th><?php echo $total;?></th>
                            </tr>
                            <?php }else{
                                echo "<h1>No user have taken the survay</h1>";
                            }?>
                            </tbody>
                        </table>


                        <br/><br/>
                        <hr/ style="color:#eee">
                    </div>




                    </br></br>
                    <div style="clear:both"></div>

                </div></div></div>

    </article>

    </div></div></div></div></div>
@endsection

