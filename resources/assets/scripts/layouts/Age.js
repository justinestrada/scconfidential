
import { Cookie } from '../utils/Cookie';

export const Age = {
  onLoad: function() {
    // console.log('test 1');
    if ( !Cookie.read('VALID_AGE') && !$('.template-splash').length ) {
      // console.log('test 2');
      $('#ageModal').modal('show');
      Age.onEnter();
    }
  },
  onEnter: function() {
    // $('#ageModal [data-dismiss="modal"]').on('click', function() {
    // });
    $('#ageModal').on('hidden.bs.modal', function () {
      Cookie.create('VALID_AGE', true, 14);
    })
  },
};
