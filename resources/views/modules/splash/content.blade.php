<style>
.site-name {
  font-size: 2.75rem;
}
@media (min-width: 992px) {
  .site-name {
    font-size: 3.5rem;
  }
}
footer {
  display: none;
}
</style>
<section id="splash" class="container-fluid d-flex justify-content-center align-items-center" style="background-image: url('{{ (get_the_post_thumbnail_url( get_the_ID(), 'full' )) ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : App\asset_path('images/bg-splash.jpg') }}');">
  <div class="row py-5">
    <div class="container inner-splash-container">
      <div class="row mb-3">
        <div class="col text-center text-black">
          <h3 class="text-uppercase m-0" >Coming Soon</h3>
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <div class="col-auto">
          <img src="{{ App\asset_path('images/logo.png') }}" alt="{{ bloginfo('name') }}" class="d-block img-fluid w-100 mx-auto" style="max-width: 300px;" >
          {{-- <h1 class="site-name text-uppercase">MK100 Glass</h1> --}}
        </div>
      </div>
      <div class="row justify-content-center mb-5">
        <div class="col-auto">
          <div id="countdown" class="text-center" style="display: none;" >
            <ul class="mb-3" >
              <li>
                <small>Days</small>
                <span id="days" ></span>
              </li>
              <li>
                <small>Hours</small>
                <span id="hours"></span>
              </li>
              <li>
                <small>Minutes</small>
                <span id="minutes"></span>
              </li>
              <li>
                <small>Seconds</small>
                <span id="seconds"></span>
              </li>
            </ul>
            <h3 class="text-center m-0" >Until The #1 highest <br>quality hand pipe, water pipe, <br>and rig shop launches!</h3>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-auto text-center">
          <p class="text-black" >Be the first to experience MK100 Glass.</p>
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#signupModal" >Join The Waitlist</button>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- <footer id="splash-footer" class="container-fluid">
  <div class="row">
    <div class="col text-center">
      <p class="text-black">Copyright &copy; {{ bloginfo('name') }}</p>
    </div>
  </div>
</footer> --}}
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
        <h3 class="text-black mb-3" >Join and receive a discount at launch!</h3>
				{!! do_shortcode('[mc4wp_form id="' . get_field('mc4wp_form_id', 'option') . '"]') !!}
			</div>
		</div>
	</div>
</div>
