$(function () {

  // Switch between tabs
  $('.become-a-member nav li').click(function () {
    $('.become-a-member nav li.active').toggleClass('active');
    $(this).toggleClass('active');
    $('.become-a-member>section:first-of-type>article')
      .attr('hidden', '')
      // Show the article with title = (textnode in tab)
      .filter('[title="' + $('span', this).text() + '"]')
      .removeAttr('hidden');
  });

  // Show text input when salutation 'other' selected
  var salutationHandler = function () {
    if ($('option:selected', this).val() == '') {
      $('#other-salutation, label[for="other-salutation"]').css('display', 'block');
    } else {
      $('#other-salutation, label[for="other-salutation"]').css('display', 'none');
    };
  };
  
  // Open sign-up modal
  $('.membership-subscriptions .become-a-member-button').click(function () {
    $('.overlay, .modal-form').css('display', 'block');
    window.scrollTo(0, 0);
  });



  // Close sign-up modal
  $('.overlay').click(function () {
    $(this).add('.modal-form').css('display', 'none');
  });
  
  $(salutationHandler);
  $('#salutation').focus(salutationHandler)
                  .change(salutationHandler)
                  .blur(salutationHandler);
  
})();
