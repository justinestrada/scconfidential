import { Cookie } from '../utils/Cookie';

export const Announcement = {
  onLoad: function() {
    if ($('#announcement').length) {
      if ( Cookie.read('HIDE_HEADER_ANNOUNCEMENT') !== 'true' ) {
        Announcement.onShow();
      }
    }
  },
  onShow: function() {
    $('#announcement').removeClass('d-none');
    $('body').addClass('announcement-shown');
    Announcement.onClose();
  },
  onClose: function() {
    $('#announcement .btn-dismiss').on('click', function() {
      $('#announcement').slideUp(500);
      $('body').removeClass('announcement-shown');
      Cookie.create('HIDE_HEADER_ANNOUNCEMENT', true, 2);
    });
  },
};
