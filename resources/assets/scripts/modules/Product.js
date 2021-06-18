import { Smooth } from '../utils/Smooth';
import { Cookie } from '../utils/Cookie';

export const Product = {
  onLoad: function() {
    if ( $('.single-product').length) {
      Smooth.onInit( $('.smooth-scroll') );
      Product.initImageGallery();
      Product.onInitAttributeLabel();
      Product.onChangeQuantity();
      Product.initReviewErrorNodes();
      Product.onSubmitReview();
      ExitModal.onLoad();
    }
  },
  initImageGallery: function() {
    $('#lightgallery').lightGallery();
  },
  onInitAttributeLabel: function() {
    // init set selected Attribute Label
    $('.variations select').each(function() {
      const select_val = $(this).val();
      $('label[value="' + select_val + '"]').addClass('selected');
    });
    // on Attribute Label Click
    $('.attribute-label').on('click', function() {
      $('.attribute-label').removeClass('selected');
      $(this).addClass('selected');
      const attribute_name = $(this).attr('for');
      const value = $(this).attr('value');
      const select = $('select[name="' + attribute_name + '"]');
      select.val(value).trigger( 'change' );
      Product.onSetStickyPrice();
    });
  },
  onSetStickyPrice: function() {
    let price_html = $('.single_variation_wrap .woocommerce-variation-price').html();
    if (price_html === '') {
      price_html = $('.title-price-html').html();
    }
    $('#sticky-add-to-cart .price').html(price_html);
  },
  onChangeQuantity: function() {
    $('.btn-plus, .btn-minus').on( 'click', function() {
      // Get current quantity values
      const qty = $('input[name="quantity"]');
      const val = parseFloat(qty.val());
      const max = parseFloat(qty.attr( 'max' ));
      const min = parseFloat(qty.attr( 'min' ));
      const step = parseFloat(qty.attr( 'step' ));
      // Change the value if plus or minus
      if ( $( this ).hasClass('btn-plus') ) {
        if ( max && ( max <= val ) ) {
          qty.val( max );
        } else {
          qty.val( val + step );
        }
      } else {
        if ( min && ( min >= val ) ) {
          qty.val( min );
        } else if ( val > 1 ) {
          qty.val( val - step );
        }
      }
    });
  },
  initReviewErrorNodes: function() {
    $('.comment-form-rating').append('<p class="comment-form-error text-danger" style="display: none;">Please select a rating.</p>');
    $('.comment-form-comment').append('<p class="comment-form-error text-danger" style="display: none;">Please leave a comment.</p>');
    $('.comment-form-author').append('<p class="comment-form-error text-danger" style="display: none;">Please enter your name.</p>');
    $('.comment-form-email').append('<p class="comment-form-error text-danger" style="display: none;">Please enter your email.</p>');
  },
  onSubmitReview: function() {
    $('#commentform #submit').on('click', function() {
      if ( $('#commentform #rating').val() === '' ) {
        $('#commentform .comment-form-rating .comment-form-error').show();
      } else {
        $('#commentform .comment-form-rating .comment-form-error').hide();
      }
    });
    $('#commentform').submit( function(e) {
      if ( $('#commentform #comment').val() === '' ) {
        e.preventDefault();
        $('#commentform .comment-form-comment .comment-form-error').show();
      } else {
        $('#commentform .comment-form-comment .comment-form-error').hide();
      }
      if ( $('#commentform #author').val() === '' ) {
        e.preventDefault();
        $('#commentform .comment-form-author .comment-form-error').show();
      } else {
        $('#commentform .comment-form-author .comment-form-error').hide();
      }
      if ( $('#commentform #email').val() === '' || $('#commentform #email').val().indexOf('@') == -1 ) {
        e.preventDefault();
        $('#commentform .comment-form-email .comment-form-error').show();
      } else {
        $('#commentform .comment-form-email .comment-form-error').hide();
      }
    });
  },
};

const ExitModal = {
  onLoad: function() {
    if ($('#exitModal').length) {
      ExitModal.load();
    }
  },
  load: function () {
    if ( ! Cookie.read('Hide_Exit_Modal') ) {
      const window_width = $(window).width();
      console.log(window_width);
      // if tablet/desktop
      if (window_width >= 768) {
        setTimeout(function(){
          $(document).on('mouseleave', ExitModal.leaveFromTop);
        }, 3000); // 3 sec
      } else {
        setTimeout(function(){
          ExitModal.showModal();
        }, 25000); // 25 sec
      }
    }
    $('#exitModal').on('hidden.bs.modal', function () {
      Cookie.create('Hide_Exit_Modal', true, 7);
    })
  },
  // if the visitor is leaving the webpage show a exit popup
  leaveFromTop: function(e) {
    // less than 60px is close enough to the top
    if ( e.clientY < 0 && ! $('#exitModal').hasClass('show') )  {
      setTimeout(function(){
        ExitModal.showModal();
      }, 250);
    }
  },
  showModal: function() {
    jQuery('#exitModal').modal('show');
  },
};
