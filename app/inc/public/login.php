<?php

/*
 * Get Username By Email
 */
function mk100glass_get_username_by_email( $email ) {
	global $wpdb;
	$table = $wpdb->prefix . "users";
	$sql = "SELECT ID, user_login FROM $table WHERE user_email = '$email'";
	$results = $wpdb->get_results($sql);
	if ( empty($results) ) {
		return false;
	}
	return $results[0]->user_login;
}

/**
 * mk100glass_login()
 * Ajax logs a user in
 * @return array
 */
add_action( 'wp_ajax_mk100glass_login', 'mk100glass_login' );
add_action( 'wp_ajax_nopriv_mk100glass_login', 'mk100glass_login' );
function mk100glass_login() {
	$response = array(
        'success' => false,
        'msg' => 'Something went wrong.',
    );
	if ( ! isset($_POST['action']) || $_POST['action'] !== 'mk100glass_login'  ) {
		$response['msg'] =  'Form action value missing. Contact justin@justinestrada.com';
        exit( json_encode($response) );
	}
	if ( ! isset($_POST['email']) || ! isset($_POST['password']) ) {
		$response['msg'] = 'Email or password not set. Please try again.';
        exit( json_encode($response) );
    }
    if ( ! isset($_POST['g-recaptcha-response']) ) {
		$response['msg'] = 'Google reCaptcha missing. Please try again.';
        exit( json_encode($response) );
    }
    $valid_recaptcha = mk100glass_validate_recaptcha( $_POST['g-recaptcha-response'] );
    if ( !$valid_recaptcha->success ) {
		$response['msg'] = 'Google reCaptcha error msg: "' . implode(', ', $valid_recaptcha->{'error-codes'}) . '". Please try again.';
        exit( json_encode($response) );
    }
	if ( is_user_logged_in() ) {
		wp_logout();
    }
	$user_login = mk100glass_get_username_by_email( sanitize_text_field($_POST['email']) );
	if ( ! $user_login ) {
		$response['msg'] =  "Email not found. Please try again.";
        exit( json_encode($response) );
	}
	$credentials = array(
		'user_login' => $user_login,
        'user_password' => $_POST['password'],
        'remember' => (isset($_post['remember'])) ? true : false,
    );
    $user = wp_signon( $credentials );
	if ( is_a( $user, 'WP_User' ) ) {
		wp_set_current_user( $user->ID, $user->user_login );
		if ( is_user_logged_in() ) {
            $response['success'] = true;
            $response['msg'] = 'Successfully logged in.';
            exit( json_encode($response) );
		}
	}
	$response['msg'] = "Incorrect password. Please try again.";
    exit( json_encode($response) );
}

if ( (isset($_GET['action']) && $_GET['action'] !== 'logout') || (isset($_POST['login_location']) && !empty($_POST['login_location'])) ) {
    add_filter('login_redirect', function () {
        wp_redirect( get_site_url() . '/members' );
        exit();
    }, 10, 3);
}
