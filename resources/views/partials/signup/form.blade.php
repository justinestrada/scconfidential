@php
global $wp;
@endphp
<form id="register" action="{{ admin_url( 'admin-ajax.php' ) }}" method="POST" class="mb-3" >
  <div class="alert alert-danger" style="display: none;" >
    <p class="m-0">Something went wrong.</p>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" class="form-control" value="{{ ( isset($_POST['full_name']) ) ? $_POST['full_name']: '' }}" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" id="email" class="form-control" value="{{ ( isset($_POST['email']) ) ? $_POST['email']: '' }}" />
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" class="form-control" value="{{ ( isset($_POST['password']) ) ? $_POST['password']: '' }}" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" class="form-control" value="{{ ( isset($_POST['confirm_password']) ) ? $_POST['confirm_password']: '' }}" />
      </div>
    </div>
  </div>
  <input type="hidden" name="action" value="giftoflifecbd_register" />
  <button class="btn btn-secondary btn-rounded btn-block my-2 waves-effect z-depth-0" type="submit" >Create Account</button>
</form>
