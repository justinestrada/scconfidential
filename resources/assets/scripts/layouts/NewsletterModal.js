
export const NewsletterModal = {
  onLoad: function() {
    // console.log('loadNewsletterModal');
    if ($('#newsletterModal').length) {
      setTimeout(function() {
        // if age not shown
        if (!$('#ageModal').hasClass('show')) {
          // console.log('newsletterModal');
          $('#newsletterModal').modal('show');
        }
      },
      /* eslint no-undef: */
      theme.newsletter_modal_timeout * 1000) // 10s
    }
  },
};
