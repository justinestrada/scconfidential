<?php

/**
 * mk100glass_validate_recaptcha()
 * Validate Google reCaptcha
 * @return
 */
function mk100glass_validate_recaptcha( $g_captcha_response ) {
    if (!isset($g_captcha_response)) {
        return false;
    }
    if (!defined('RECAPTCHA_SECRET_KEY')) {
        return false;
    }
    $url = 'https://google.com/recaptcha/api/siteverify?secret=' . RECAPTCHA_SECRET_KEY . '&response=' . $g_captcha_response . '&remoteip=' . $_SERVER['REMOTE_ADDR'];
    return json_decode(file_get_contents($url));
}
