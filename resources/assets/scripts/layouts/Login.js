export const Login = {
  onLoad: function() {
    if ( $('#login').length ) {
      Login.onFormSubmit();
    }
  },
  onFormSubmit: function() {
    $('#login').on('submit', function(e) {
      e.preventDefault();
      $(this).find('[type="submit"]').prop('disabled', true);
      // TODO: Validate form
      Login.formSubmit( $(this) );
    });
  },
  formSubmit: function( $form ) {
    // console.log($form.serialize())
    $.ajax({
      url: $form.attr('action'),
      data: $form.serialize(),
      type: 'POST',
      config: { headers: {'Content-Type': 'multipart/form-data' }},
      success: function( response ) {
        console.log('test', JSON.parse(response));
        const res = JSON.parse(response);
        if ( res.success ) {
          /* eslint-disable no-undef */
          // location.href = THEME_VARS.site_url;
          location.reload();
        } else {
          console.error(res.msg);
          $('#login #error-handler').html('<p class="text-danger mb-0">' + res.msg + '</p>').show();
          $('#login [type="submit"]').prop('disabled', false);
        }
      },
    });
  },
};
