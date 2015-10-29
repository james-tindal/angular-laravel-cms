(function($,W,D)
{
  var setupFormValidation = function() {
    //form validation rules
    $("#contact-us").validate({
      rules: {
        name: "required",
        email: "email"
      },
      messages: {
        name: "Please enter your name",
        email: "Please enter a valid email address"
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  }

  //when the dom has loaded setup form validation rules
  $(D).ready(function($) {
    setupFormValidation();
  });

})(jQuery, window, document);
