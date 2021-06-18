import { Cookie } from '../utils/Cookie';

export const CookiePolicy = {
  onLoad: function() {
    if ( !Cookie.read('HIDE_TOAST_COOKIE_POLICY') && !$('.template-splash').length ) {
      this.onShow();
      this.onClose();
    }
  },
  onShow: function() {
    setTimeout(function() {
      $('#toast-cookie-policy').show().toast('show')
    }, 2500)
  },
  onClose: function() {
    $('#toast-cookie-policy [data-dismiss="toast"]').on('click', function() {
      // hide for 14 days
      Cookie.create('HIDE_TOAST_COOKIE_POLICY', true, 14);
    });
  },
};
