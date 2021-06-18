<div class="modal fade" id="quickViewModal" tabindex="-1" role="dialog" aria-labelledby="quickViewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius: 0.5rem;" >
      <div class="modal-body p-3">
        <button type="button" class="btn p-3 close hover-spin" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="row quick-view-loading-row">
          <div class="col text-center p-5">
            <img src="{{ App\asset_path('images/icon/loader.svg') }}" alt="Loading..." class="spin-infinite" style="height: 28px;" />
          </div>
        </div>
        <div class="row quick-view-row" style="display: none;" >
          <div class="col-md-4 pl-md-0">
            <img src="" alt="" class="quick-view-img img-fluid w-100 my-3"/>
          </div>
          <div class="col-md-8 d-flex align-items-center">
            <div class="p-3 p-md-0">
              <a href="#" class="quick-view-title d-block h3 text-uppercase text-black"></a>
              {{-- <p>
                <span class="woocommerce-Price-amount amount sale-price">
                  <span class="woocommerce-Price-currencySymbol">$</span>
                  <span class="quick-view-price"></span>
                </span>
              </p> --}}
              <p class="quick-view-price"></p>
              <p class="quick-view-excerpt"></p>
              <a href="#" class="d-inline-block quick-view-link btn btn-outline-primary mr-3" title="View More" >View More</a>
              <form action="{{ get_site_url() }}/shop" method="POST" class="cart d-inline-block" enctype="multipart/form-data" >
                <button type="submit" name="add-to-cart" class="single_add_to_cart_button quick-view-cart btn btn-primary btn-rounded" >Add To Cart</button>
              </form>
              <span class="quick-view-out-of-stock badge badge-danger">Sold Out</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
