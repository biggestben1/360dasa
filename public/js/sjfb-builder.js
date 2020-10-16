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

//Loads a saved form from your database 
        }
    });
}