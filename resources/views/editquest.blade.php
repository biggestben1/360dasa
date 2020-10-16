@extends('layouts.web')

@section('content')
<style>
    body{
        font-wieight:normal;
    }
    }
    body.menu-custom-padding .col-lg-0.logo-container, body.menu-custom-padding .col-lg-12 .logo-container {
        padding-top: 20px;
        padding-bottom: 20px;
    }
    .color-accent-color, .wpcf7 .wpcf7-mail-sent-ok, .wpcf7 .wpcf7-validation-errors, .wpcf7 span.wpcf7-not-valid-tip, .nav-tabs > li.active > a, .panel-title.active > a, .panel-title.active > a span:after, .plan-accent.plan .plan-title > h3, .plan-accent.plan .plan-price .price {
        color:#666!important;
    }

    .ui-page-theme-a a, html .ui-bar-a a, html .ui-body-a a, html body .ui-group-theme-a a {
        border-color: #eee !important;
        font-size:12px!important;
        /*color:#fff!important;*/
    }


    .ui-br-accent, .nav-tabs>li.active>a, .tabs-left>li.active>a {
        border-color: #eee !important;
        padding:10px 5px!important;
        font-size:12px!important;
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

<link href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}"><!-- for font icons -->
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" /><!-- for form builder ui -->

<!-- Jquery JS -->
<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script> <!-- jQuery v1 should also work fine -->
<!--<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>-->
<script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript" ></script> <!-- for sortable -->

<!-- SJFB JS -->
<script type="application/javascript">
    /**
     * Simple Jquery Form Builder (SJFB)
     * Copyright (c) 2015 Brandon Hoover, Hoover Web Development LLC (http://bhoover.com)
     * http://bhoover.com/simple-jquery-form-builder/
     * SJFB may be freely distributed under the included MIT license (license.txt).
     */

    $(function(){

        //If loading a saved form from your database, put the ID here. Example id is "1".
        var formID = '1';
        //Adds new field with animation
        $("#add-field a").click(function(e) {
            e.preventDefault();
            $(addField($(this).data('type'))).appendTo('#form-fields').hide().slideDown('fast');
            $('#form-fields').sortable();
        });

        //Removes fields and choices with animation
        $("#sjfb").on("click", ".delete", function() {
            if (confirm('Are you sure?')) {
                var $this = $(this);
                $this.parent().slideUp( "slow", function() {
                    $this.parent().remove()
                });
            }
        });

        //Makes fields required
        $("#sjfb").on("click", ".toggle-required", function() {
            requiredField($(this));
        });

        //Makes choices selected
        $("#sjfb").on("click", ".toggle-selected", function() {
            selectedChoice($(this));
        });

        //Adds new choice to field with animation
        $("#sjfb").on("click", ".add-choice", function() {
            $(addChoice()).appendTo($(this).prev()).hide().slideDown('fast');
            $('.choices ul').sortable();
        });

        //Saving form
        $("#sjfb").submit(function(event) {
            event.preventDefault();

            //Loop through fields and save field data to array
            var fields = [];

            var formToken = $('#form-token').val();

            $('.field').each(function() {

                var $this = $(this);

                //field type
                var fieldType = $this.data('type');

                //field label
                var fieldLabel = $this.find('.field-label').val();

                //field required
                var fieldReq = $this.hasClass('required') ? 1 : 0;



                //check if this field has choices
                if($this.find('.choices li').length >= 1) {

                    var choices = [];

                    $this.find('.choices li').each(function() {

                        var $thisChoice = $(this);

                        //choice label
                        var choiceLabel = $thisChoice.find('.choice-label').val();

                        //choice selected
                        var choiceSel = $thisChoice.hasClass('selected') ? 1 : 0;

                        choices.push({
                            label: choiceLabel,
                            sel: choiceSel
                        });

                    });
                }

                fields.push({
                    type: fieldType,
                    label: fieldLabel,
                    req: fieldReq,
                    choices: choices
                });

            });

            var frontEndFormHTML = '';

            //Save form to database
            //Demo doesn't actually save. Download project files for save
            var data = JSON.stringify([{"name":"formID","value":formID},{"name":"formFields","value":fields}]);
            //data.push({_token: formToken});
            //alert(ben);
            $.ajax({
                method: "POST",
                url: "/addquested",
                data: data,
                dataType: 'json',
                success: function (msg) {
                    console.log(msg);
                    $('.alert').removeClass('hide');
                    $("html, body").animate({ scrollTop: 0 }, "fast");

                    //Demo only
                    $('#description').val(JSON.stringify(fields));

                    document.getElementById("invoices_form").submit();
                }
            });
        });

        //load saved form
        loadForm(formID);

    });

    //Add field to builder
    function addField(fieldType) {

        var hasRequired, hasChoices;
        var includeRequiredHTML = '';
        var includeChoicesHTML = '';

        switch (fieldType) {
            case 'text':
                hasRequired = true;
                hasChoices = false;
                break;
            case 'tel':
                hasRequired = true;
                hasChoices = false;
                break;
            case 'email':
                hasRequired = true;
                hasChoices = false;
                break;
            case 'file':
                hasRequired = true;
                hasChoices = false;
                break;
            case 'date':
                hasRequired = true;
                hasChoices = false;
                break;
            case 'textarea':
                hasRequired = true;
                hasChoices = false;
                break;
            case 'select':
                hasRequired = true;
                hasChoices = true;
                break;
            case 'radio':
                hasRequired = true;
                hasChoices = true;
                break;
            case 'checkbox':
                hasRequired = false;
                hasChoices = true;
                break;
            case 'agree':
                //required "agree to terms" checkbox
                hasRequired = false;
                hasChoices = false;
                break;
        }

        if (hasRequired) {
            includeRequiredHTML = '' +
                '<label>Required? ' +
                '<input class="toggle-required" type="checkbox">' +
                '</label>'
        }

        if (hasChoices) {
            includeChoicesHTML = '' +
                '<div class="choices">' +
                '<ul></ul>' +
                '<button type="button" class="add-choice"><i class="fa fa-plus" aria-hidden="true"></i> Add Choice</button>' +
                '</div>'
        }

        return '' +
            '<div class="field" data-type="' + fieldType + '">' +
            '<button type="button"  class="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>' +
            '<h3>' + fieldType + '</h3>' +
            '<label>Label:' +
            '<input type="text" class="field-label">' +
            '</label>' +
            includeRequiredHTML +
            includeChoicesHTML +
            '</div>'
    }

    //Make builder field required
    function requiredField($this) {
        if (!$this.parents('.field').hasClass('required')) {
            //Field required
            $this.parents('.field').addClass('required');
            $this.attr('checked','checked');
        } else {
            //Field not required
            $this.parents('.field').removeClass('required');
            $this.removeAttr('checked');
        }
    }

    function selectedChoice($this) {
        if (! $this.parents('li').hasClass('selected')) {

            //Only checkboxes can have more than one item selected at a time
            //If this is not a checkbox group, unselect the choices before selecting
            if ($this.parents('.field').data('type') != 'checkbox') {
                $this.parents('.choices').find('li').removeClass('selected');
                $this.parents('.choices').find('.toggle-selected').not($this).removeAttr('checked');
            }

            //Make selected
            $this.parents('li').addClass('selected');
            $this.attr('checked','checked');

        } else {

            //Unselect
            $this.parents('li').removeClass('selected');
            $this.removeAttr('checked');

        }
    }

    //Builder HTML for select, radio, and checkbox choices
    function addChoice() {
        return '' +
            '<li>' +
            '<label>Choice: ' +
            '<input type="text" class="choice-label">' +
            '</label>' +
            '<label>Selected? ' +
            '<input class="toggle-selected" type="checkbox">' +
            '</label>' +
            '<button type="button" class="delete delete-choice"><i class="fa fa-minus" aria-hidden="true"></i> Remove Choice</button>' +
            '</li>'
    }
    /**
     * Simple Jquery Form Builder (SJFB)
     * Copyright (c) 2015 Brandon Hoover, Hoover Web Development LLC (http://bhoover.com)
     * http://bhoover.com/simple-jquery-form-builder/
     * SJFB may be freely distributed under the included MIT license (license.txt).
     */

    $(function(){

        //If loading a saved form from your database, put the ID here. Example id is "1".
        var formID = '1';
        //Adds new field with animation
        $("#add-field a").click(function(e) {
            e.preventDefault();
            $(addField($(this).data('type'))).appendTo('#form-fields').hide().slideDown('fast');
            $('#form-fields').sortable();
        });

        //Removes fields and choices with animation
        $("#sjfb").on("click", ".delete", function() {
            if (confirm('Are you sure?')) {
                var $this = $(this);
                $this.parent().slideUp( "slow", function() {
                    $this.parent().remove()
                });
            }
        });

        //Makes fields required
        $("#sjfb").on("click", ".toggle-required", function() {
            requiredField($(this));
        });

        //Makes choices selected
        $("#sjfb").on("click", ".toggle-selected", function() {
            selectedChoice($(this));
        });

        //Adds new choice to field with animation
        $("#sjfb").on("click", ".add-choice", function() {
            $(addChoice()).appendTo($(this).prev()).hide().slideDown('fast');
            $('.choices ul').sortable();
        });

        //Saving form
        $("#sjfb").submit(function(event) {
            event.preventDefault();

            //Loop through fields and save field data to array
            var fields = [];

            var formToken = $('#form-token').val();

            $('.field').each(function() {

                var $this = $(this);

                //field type
                var fieldType = $this.data('type');

                //field label
                var fieldLabel = $this.find('.field-label').val();

                //field required
                var fieldReq = $this.hasClass('required') ? 1 : 0;



                //check if this field has choices
                if($this.find('.choices li').length >= 1) {

                    var choices = [];

                    $this.find('.choices li').each(function() {

                        var $thisChoice = $(this);

                        //choice label
                        var choiceLabel = $thisChoice.find('.choice-label').val();

                        //choice selected
                        var choiceSel = $thisChoice.hasClass('selected') ? 1 : 0;

                        choices.push({
                            label: choiceLabel,
                            sel: choiceSel
                        });

                    });
                }

                fields.push({
                    type: fieldType,
                    label: fieldLabel,
                    req: fieldReq,
                    choices: choices
                });

            });

            var frontEndFormHTML = '';

            //Save form to database
            //Demo doesn't actually save. Download project files for save
            var data = JSON.stringify([{"name":"formID","value":formID},{"name":"formFields","value":fields}]);
            //data.push({_token: formToken});
            //alert(ben);
            $.ajax({
                method: "POST",
                url: "/addquested",
                data: data,
                dataType: 'json',
                success: function (msg) {
                    console.log(msg);
                    $('.alert').removeClass('hide');
                    $("html, body").animate({ scrollTop: 0 }, "fast");

                    //Demo only
                    $('#description').val(JSON.stringify(fields));

                    document.getElementById("invoices_form").submit();
                }
            });
        });

        //load saved form
        //loadForm(formID);

    });

    //Add field to builder
    function addField(fieldType) {

        var hasRequired, hasChoices;
        var includeRequiredHTML = '';
        var includeChoicesHTML = '';

        switch (fieldType) {
            case 'text':
                hasRequired = true;
                hasChoices = false;
                break;
            case 'tel':
                hasRequired = true;
                hasChoices = false;
                break;
            case 'email':
                hasRequired = true;
                hasChoices = false;
                break;
            case 'file':
                hasRequired = true;
                hasChoices = false;
                break;
            case 'date':
                hasRequired = true;
                hasChoices = false;
                break;
            case 'textarea':
                hasRequired = true;
                hasChoices = false;
                break;
            case 'select':
                hasRequired = true;
                hasChoices = true;
                break;
            case 'radio':
                hasRequired = true;
                hasChoices = true;
                break;
            case 'checkbox':
                hasRequired = false;
                hasChoices = true;
                break;
            case 'agree':
                //required "agree to terms" checkbox
                hasRequired = false;
                hasChoices = false;
                break;
        }

        if (hasRequired) {
            includeRequiredHTML = '' +
                '<label>Required? ' +
                '<input class="toggle-required" type="checkbox">' +
                '</label>'
        }

        if (hasChoices) {
            includeChoicesHTML = '' +
                '<div class="choices">' +
                '<ul></ul>' +
                '<button type="button" class="add-choice"><i class="fa fa-plus" aria-hidden="true"></i> Add Choice</button>' +
                '</div>'
        }

        return '' +
            '<div class="field" data-type="' + fieldType + '">' +
            '<button type="button"  class="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>' +
            '<h3>' + fieldType + '</h3>' +
            '<label>Label:' +
            '<input type="text" class="field-label">' +
            '</label>' +
            includeRequiredHTML +
            includeChoicesHTML +
            '</div>'
    }

    //Make builder field required
    function requiredField($this) {
        if (!$this.parents('.field').hasClass('required')) {
            //Field required
            $this.parents('.field').addClass('required');
            $this.attr('checked','checked');
        } else {
            //Field not required
            $this.parents('.field').removeClass('required');
            $this.removeAttr('checked');
        }
    }

    function selectedChoice($this) {
        if (! $this.parents('li').hasClass('selected')) {

            //Only checkboxes can have more than one item selected at a time
            //If this is not a checkbox group, unselect the choices before selecting
            if ($this.parents('.field').data('type') != 'checkbox') {
                $this.parents('.choices').find('li').removeClass('selected');
                $this.parents('.choices').find('.toggle-selected').not($this).removeAttr('checked');
            }

            //Make selected
            $this.parents('li').addClass('selected');
            $this.attr('checked','checked');

        } else {

            //Unselect
            $this.parents('li').removeClass('selected');
            $this.removeAttr('checked');

        }
    }

    //Builder HTML for select, radio, and checkbox choices
    function addChoice() {
        return '' +
            '<li>' +
            '<label>Choice: ' +
            '<input type="text" class="choice-label">' +
            '</label>' +
            '<label>Selected? ' +
            '<input class="toggle-selected" type="checkbox">' +
            '</label>' +
            '<button type="button" class="delete delete-choice"><i class="fa fa-minus" aria-hidden="true"></i> Remove Choice</button>' +
            '</li>'
    }

    //Loads a saved form from your database into the builder
    function loadForm(formID) {
        $.getJSON('/loadquest/{{$topics->id}}', function(data) {
            //alert(data);
            if (data) {
                //go through each saved field object and render the builder
                $.each( data, function( k, v ) {
                    //Add the field
                    $(addField(v['type'])).appendTo('#form-fields').hide().slideDown('fast');
                    var $currentField = $('#form-fields .field').last();

                    //Add the label
                    $currentField.find('.field-label').val(v['label']);

                    //Is it required?
                    if (v['req']) {
                        requiredField($currentField.find('.toggle-required'));
                    }

                    //Any choices?
                    if (v['choices']) {
                        $.each( v['choices'], function( k, v ) {
                            //add the choices
                            $currentField.find('.choices ul').append(addChoice());

                            //Add the label
                            $currentField.find('.choice-label').last().val(v['label']);

                            //Is it selected?
                            if (v['sel']) {
                                selectedChoice($currentField.find('.toggle-selected').last());
                            }
                        });
                    }

                });

                $('#form-fields').sortable();
                $('.choices ul').sortable();
            }
        });
    }

</script>






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
                                <div style="width: 640px;" class="wp-video">
                                    <!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
                                    <img src="{{asset('images/mainbg.jpg')}}">
                                </div></div>
                            <!--<div class="block-bg-overlay style-color-836294-bg" style="opacity: 0.92;"></div>-->
                        </div>
                    </div>


                    <div class="row quad-top-padding  limit-width row-parent row-header" style="height:80px;
<div class="row-inner" style=" margin-bottom: -1px; ">
                </div></div></div></div></div>

<article id="post-54944" class="page-body style-color-xsdn-bg post-54944 page type-page status-publish has-post-thumbnail hentry page_category-classic page_category-top-menu">
    <div class="post-wrapper">
        <div class="post-body"><div class="post-content">

                <div class="row top-padding bottom-padding single-h-padding limit-width row-parent" data-imgready="true">
<br>

                {{$topics->topics}}
                    <!--SURVEY  FORM-->
                    <div id="sjfb-body" style=" padding:30px 0 0 ; text-align:left;">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab1">Page 1</a>
                            </li>

                            <a href="#popupLogin" data-rel="popup" data-position-to="window" title="Add New Page" class="" data-transition="pop"><i class="fa fa-plus" aria-hidden="true" style="font-size:20px; padding:7px; "></i></a>
                        </ul>


                    </div>


                    <section id="tab1" class="tab-content active">

                        <div data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">
                            <div style="padding:10px 20px;">
                                <p>Create New Page</p>
                                <button type="button" id='create_me' class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">Create</button>
                            </div>
                        </div>
                    </section>

                    <div id="sjfb-wrap">


                        <div class="add-wrap">
                            <ul id="add-field">
                                <li><a id="add-text" data-type="text" href="#"><i class="fa fa-font" aria-hidden="true"></i> Text</a></li>
                                <li><a id="add-tel" data-type="tel" href="#"><i class="fa fa-phone" aria-hidden="true"></i> Phone</a></li>
                                <li><a id="add-email" data-type="email" href="#"><i class="fa fa-envelope" aria-hidden="true"></i> email</a></li>
                                <li><a id="add-date" data-type="date" href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Date</a></li>
                                <li><a id="add-checkbox" data-type="checkbox" href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Checkboxes</a></li>
                                <li><a id="add-radio" data-type="radio" href="#"><i class="fa fa-circle-o" aria-hidden="true"></i> Multiple Choice</a></li>
                                <li><a id="add-select" data-type="select" href="#"><i class="fa fa-sort-desc" aria-hidden="true"></i> Dropdown</a></li>
                                <li><a id="add-file" data-type="file" href="#"><i class="fa fa-upload" aria-hidden="true"></i> Upload</a></li>
                                <li><a id="add-textarea" data-type="textarea" href="#"><i class="fa fa-paragraph" aria-hidden="true"></i> Multi-Line Text</a></li>
                                <li><a id="add-agree" data-type="agree" href="#"><i class="fa fa-check" aria-hidden="true"></i> Agree Box</a></li>


                            </ul>
                            <div style="clear:both"></div>
                        </div>

                        <div class="add-form">
                            <form action="{{ route('editquestestions') }}" name="invoices_form" id="invoices_form" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="alert hide">
                                    <h2>Success! Form saved.</h2>
                                    <p>Here is what your saved form will look like in your database:</p>
                                    <textarea name="description" id="description" class="description" hidden></textarea>
                                    <div id="description"> </div>
                                    <input type="hidden" name="topic_id" id="topic_id" value="{{$topics->id}}"   />
                                </div>

                                <input type="hidden" onclick="invoicesFormSubmit()" value="Send Invoices" />
                            </form>
                            <div style="clear:both"></div>


                            <form id="sjfb" novalidate>
                                <div id="data" style="min-height:300px; overflow:auto;">
                                    <div id="form-fields"></div>
                                    <input type="hidden" id="form-token" value="{{ csrf_token() }}">
                                </div>
                                <button type="submit" class="submit">Save Form</button>

                            </form>

                        </div>





                        <div style="clear:both"></div>

                    </div>

                    <div style="clear:both"></div>

                    <script>
                        $(document).ready(function() {
                            $('body').on('click','#create_me',function(){
                                var index = $('.nav-tabs li').length+1;
                                $('.nav-tabs').append('<li><a href="#tab'+index+'">Page '+index+'</a></li>');
                                $('.ui-page').append('<section id="tab'+index+'" class="tab-content hide">Tab '+index+' content</section>');

                                $( "#popupLogin" ).popup( "close" );
                                $('a[href="#tab'+index+'"]').click();
                            })
                        });
                    </script>

                    <script>
                        $(document).ready(function() {

                            $('.nav-tabs').on('click','li > a',function(event){
                                event.preventDefault();//stop browser to take action for clicked anchor

                                //get displaying tab content jQuery selector
                                var active_tab_selector = $('.nav-tabs > li.active > a').attr('href');

                                //find actived navigation and remove 'active' css
                                var actived_nav = $('.nav-tabs > li.active');
                                actived_nav.removeClass('active');

                                //add 'active' css into clicked navigation
                                $(this).parents('li').addClass('active');

                                //hide displaying tab content
                                $(active_tab_selector).removeClass('active');
                                $(active_tab_selector).addClass('hide');

                                //show target tab content
                                var target_tab_selector = $(this).attr('href');

                                $(target_tab_selector).removeClass('hide');
                                $(target_tab_selector).addClass('active');
                            });
                        });

                    </script>

                </div>
                <div style="clear:both"></div>

            </div></div></div>

</article>

</div></div></div></div></div>


@endsection