@extends('layouts.web')

@section('content')

    <script src="{{asset('public/js/jquery-1.6.3.min.js')}}"></script>



    <script src="{{asset('public/js/jquery.multiFieldExtender-2.0.js')}}"></script>

    <script type="text/javascript">

        //<![CDATA[
        var jQuery_1_6_3 = $.noConflict(true);
        jQuery_1_6_3(document).ready(function() {

            jQuery_1_6_3("#itemDetails").EnableMultiField();


        });

        //]]>

    </script>

    <style type="text/css">

        /*<![CDATA[*/

        .customItem

        {

            border:1px solid #eee;

            padding:10px;

        }

        .removeFields

        {

            color:red;

        }

        .addMoreFields

        {

            color:green;

        }





        a {

            color: black;

        }

        a:hover {

            color: maroon;

        }

        .divTag {

            float: right;

            width: 100%;

        }



        .Birds

        {

            margin:5px;

        }



        .imgBird

        {

            border:1px solid #eee;

            padding:2px;

            width:100%;

        }



        .addImage

        {

            background: url(add.png) no-repeat 0px 1px;

            padding-left: 17px;

            margin-bottom: 10px;

            line-height:20px;

            clear:both:



        }

        .removeImage

        {

            background: url(delete.png) no-repeat 0px 1px;

            padding-left: 17px;

            margin-bottom: 10px;

            line-height:20px;

        }

        input, textarea, select, .seldiv, .select2-choice, .select2-selection--single{

            width:100%;
            border:1px solid #eee;



        }


        #itemDetails{
            border: 1px solid #eee;
            margin:20px;
            width:100%;

        }
        /*]]>*/

    </style>







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
    <?php
  //  $days = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");

    // Printing array size
   // echo count($days[0]);
    echo "<br>";
   // echo sizeof($days);
            ?>
    <form role="form" action="{{ route('addojectivetest') }}" method="post">





            <input name="title" type="text" class="form-control"  placeholder="New Survey Title" Required  />




                <div class="form-group wrapper bg-light dk m">

                    <p>
                    <div class="form-group"> Question
                        <input type="text" name="question[]" class="form-control" placeholder="Enter Question Here" value=""> </div>
                    <fieldset id="itemDetails">
                    <div class="form-group">Option
                        <input type="hidden" name="obja[]"  value="0">
                        <input type="hidden" name="objgroup[]"  value="1">
                        <input type="text" name="obj[]" class="form-control" Required  placeholder="Enter Option" value="">
                    </div>

                    </fieldset>

                    <!-- <div class="form-group">Select  Answer
                         <label class="checkbox-inline i-checks">
                             <input type="radio" name="obj[]" id="inlineCheckbox1" value="a"><i></i> A </label>

                         <label class="checkbox-inline i-checks">
                             <input type="radio" name="obj[]" id="inlineCheckbox2" value="b"><i></i> B </label>

                         <label class="checkbox-inline i-checks"> <input type="radio" name="obj[]" id="inlineCheckbox3" value="c"><i></i> C </label>

                         <label class="checkbox-inline i-checks"> <input type="radio" name="obj[]" id="inlineCheckbox4" value="d">
                             <i></i> D </label>

                     </div>-->



                    </p>



</div>
<div id="load_data_table"></div>

                    <div id="remove_row">
                        <td><button type="button" name="btn_more" id="delete_button<?php echo '1';?>" value="delete" onclick="delete_row('<?php echo '1';?>');"class="btn btn-success form-control">more</button></td>
                    </div>
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </section>
            <button type="submit" name="submitted" class="btn btn-sm btn-info">Create New Survey</button>
    </form>
    <script>


        function delete_row(id)
        {
            jQuery(document).ready(function($){
                jQuery.ajax
                ({
                    type:'get',
                    url:'/getmore',
                    data:{
                        delete_row:'delete_row',
                        row_id:id,
                    },
                    success:function(data)
                    {
                        //alert(data);
                        if(data != '')
                        {

                            $('#load_data_table').append(data);
                        }

                    }



                });
            });
        } </script>
@endsection
