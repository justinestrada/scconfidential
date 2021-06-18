
@php
global $wp;
@endphp
<form id="login" action="{{ admin_url( 'admin-ajax.php' ) }}" method="POST" class="mb-3" >
  <div id="error-handler" class="alert alert-danger" style="display: none;" >
    <p class="m-0">Something went wrong.</p>
  </div>
  <div class="input-group mb-3">
    <label for="login_email" class="input-group-prepend" >
      <span class="input-group-text" >
        <img src="{{ App\asset_path('images/icon/avatar.svg') }}" alt="User" style="height: 24px;" >
      </span>
    </label>
    <input id="login_email" type="text" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email" value="{{ ( isset($_POST['email']) ) ? $_POST['email']: '' }}" required />
  </div>
  <div class="input-group mb-3">
    <label for="login_password" class="input-group-prepend" >
      <span class="input-group-text" >
        <img src="{{ App\asset_path('images/icon/key.svg') }}" alt="Key" style="height: 24px;" >
      </span>
    </label>
    <input id="login_password" type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password" value="{{ ( isset($_POST['password']) ) ? $_POST['password']: '' }}" required />
  </div>
  <div class="pb-3">
    <label for="remember" class="custom-control custom-checkbox">
      <input id="remember" type="checkbox" name="remember" class="custom-control-input" value="1" >
      <span class="custom-control-indicator" ></span>
      <span class="custom-control-description">Remember me</label>
    </label>
  </div>
  @if (defined('RECAPTCHA_SITE_KEY'))
    <div class="g-recaptcha mb-3" data-sitekey="{{ RECAPTCHA_SITE_KEY }}"></div>
  @else
    <div class="alert alert-warning">
      <p class="text-warning m-0">RECAPTCHA_SITE_KEY is missing, please define this in wp-config.php</p>
    </div>
  @endif
  <input type="hidden" name="action" value="mk100glass_login" />
  <button class="btn btn-primary btn-rounded btn-block" type="submit" >Sign in</button>
</form>
<div class="text-center">
  <a href="{{ get_site_url() }}/my-account/lost-password/" title="Lost Password" class="text-black" >Forgot your password?</a>
</div>
