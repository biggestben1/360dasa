$(document).ready(function() {
  $('.collapsible').collapsible({
    accordion: false
  });

  $('.modal-trigger').leanModal();

  $(document).on('click', '.delete-option', function() {
    $(this).parent(".input-field").remove();
  });

  $(document).on('click', '.delete-option2', function() {
    $(this).parent(".input-field").remove();
  });


  // will replace .form-g class when referenced
  var material = '<div class="input-field col input-g s12">' +
    '<input name="option_name[]" id="option_name[]" type="text">' +
    '<span class="delete-option btn btn-ouline" style="padding:1px 3px 0 3px!important;text-transform:capitlize!important;  float:right; color:red"><i class="material-icons">delete</i></span>' +
    '<label for="option_name">Enter Your Answer Choice </label>' +
    '<span class="add-option  btn btn-accent btn-outline" style="padding:1px 3px 0 3px!important;text-transform:capitlize!important; "><i class="material-icons">add</i></span>' +
    '</div>';

    var material2 = '<div class="input-field col input-g s12">' +
    '<input  type="text" readonly="readonly">' +
    '<span class="delete-option2 btn btn-ouline" style="padding:1px 3px 0 3px!important;text-transform:capitlize!important; float:right; color:red"><i class="material-icons">delete</i></span>' +
    '<label for="option_name">Textbox - Answer will be entered by user</label>' +
    '<span class="add-option2  btn btn-accent btn-ouline" style="padding:1px 3px 0 3px!important;text-transform:capitlize!important; "><i class="material-icons">add</i></span>' +
      '</div>';

  // for adding new option
  $(document).on('click', '.add-option', function() {
    $(".form-g").append(material);

  });
  $(document).on('click', '.add-option2', function() {
    $(".form-g").append(material2);

  });
  // allow for more options if radio or checkbox is enabled
  $(document).on('change', '#question_type', function() {
    var selected_option = $('#question_type :selected').val();
    if (selected_option === "radio" || selected_option === "checkbox") {
      $(".form-g").html(material);

    } else if (selected_option === "text" || selected_option === "textarea") {
      $(".form-g").html(material2);

    } else {
      $(".input-g").remove();
    }
  });
});
