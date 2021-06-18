import { Cookie } from '../utils/Cookie';
import { QuickView } from '../layouts/QuickView';

export const ArchiveProduct = {
  onLoad: function() {
    if ($('#shop').length) {
      this.onToggleFilter();
      this.onSort();
      if ( Cookie.read('HIDE_FILTERS') !== 'true' ) {
        this.checkToggleFilter();
        $('#filters').show();
      }
      this.onSwatchMouseOver();
      QuickView.onLoad();
    }
  },
  onToggleFilter: function() {
    $('[name="filters"]').on('change', function() {
      if ($(this).is(':checked')) {
        $('#filters').show();
        Cookie.erase('HIDE_FILTERS');
      } else {
        $('#filters').hide();
        Cookie.create('HIDE_FILTERS', true, 2);
      }
    });
  },
  checkToggleFilter: function() {
    $('#toggle-filters').prop('checked', true);
  },
  onSort: function() {
    $('#sort-by .dropdown-item').on('click', function() {
      const value = $(this).attr('data-value');
      $('[name="orderby"]').val(value);
      $('.woocommerce-ordering').submit();
    });
  },
  onSwatchMouseOver: function() {
    $('.attribute .swatch').on('mouseover', function() {
      const variation_image_url = $(this).attr('variation-image-url');
      const product_img = $(this).parent().parent().parent().parent().prev(); // TODO: Fix this, has to be better way
      product_img.css('background-image', 'url(' + variation_image_url + ')');
    });
  },
};
