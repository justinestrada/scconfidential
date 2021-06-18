
export const QuickView = {
  onLoad: function() {
    QuickView.onShow();
    QuickView.onAddToCart();
    // QuickView.onModalShown();
  },
  onShow: function() {
    $('button[data-target="#quickViewModal"]').on('click', function() {
      const post_id = $(this).attr('post-id');
      QuickView.onShowProductDetails(post_id);
    });
  },
  onAddToCart: function() {
    $(document.body).on('added_to_cart', function() {
      if ($('#quickViewModal').hasClass('show')) {
        jQuery('#quickViewModal').modal('hide');
      }
    });
  },
  onShowProductDetails: function(post_id) {
    QuickView.hideProductDetails();
    QuickView.fetchProductByID(post_id).then( function (product) {
      // console.log('res', product);
      QuickView.showProductDetails(product);
    }).catch(function(err) {
      console.error(err);
    });
  },
  hideProductDetails: function() {
    $('.quick-view-loading-row').show();
    $('.quick-view-row').hide();
  },
  fetchProductByID: function(post_id) {
    return new Promise( (resolve, reject) => {
      // eslint-disable-next-line no-undef
      $.ajax({
        method: 'GET',
        // eslint-disable-next-line no-undef
        url: theme.rest_url + '/product/' + post_id,
      }).done(function(res) {
        resolve(res);
      }).fail(function(err) {
        reject(err);
      });
    });
  },
  showProductDetails: function(product) {
    $('.quick-view-img').attr('src', product.theme_meta.thumbnail).attr('alt', product.title.rendered);
    // TODO: Make this an image carousel
    $('.quick-view-title').attr('href', product.link).html(product.title.rendered);
    $('.quick-view-excerpt').html(product.excerpt.rendered);
    $('.quick-view-price').html(product.theme_meta.price_html);
    if (product.theme_meta.default_variation_id) {
      $('.quick-view-cart').val(product.theme_meta.default_variation_id);
    } else {
      $('.quick-view-cart').val(product.id);
    }
    console.log(product, product.theme_meta.is_in_stock);
    if (product.theme_meta.is_in_stock && product.theme_meta.default_variation_stock_qty) {
      $('.quick-view-cart').show();
      $('.quick-view-out-of-stock').hide();
    } else {
      $('.quick-view-cart').hide();
      $('.quick-view-out-of-stock').show();
    }
    $('.quick-view-link').attr('href', product.link);
    $('.quick-view-loading-row').hide();
    $('.quick-view-row').show();
  },
};
