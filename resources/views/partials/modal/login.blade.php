<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h5 class="modal-title text-uppercase" id="loginModalLabel">User Login</h5>
        <button type="button" class="close hover-spin" data-dismiss="modal" aria-label="Close">
          <img src="{{ App\asset_path('images/icon/close-black.svg') }}" alt="Close" style="height: 24px; margin-top: -4px;" >
        </button>
      </div> --}}
      <div class="modal-body p-lg-5">
        <h2 class="section-title mb-3">
          User <span>Login</span>
        </h2>
        <div class="mb-3">
          @include('partials.login.form')
        </div>
        {{-- <p class="text-center text-uppercase mb-3">Or</p>
        <a href="#register" class="btn btn-outline-black btn-rounded btn-block" data-dismiss="modal" aria-label="Close Login Open Register" data-toggle="modal" data-target="#registerModal" >Register Now</a> --}}
      </div>
    </div>
  </div>
</div>
