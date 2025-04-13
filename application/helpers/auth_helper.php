<?php
function is_logged_in()
{
    $CI = &get_instance();
    if ($CI->session->userdata('id_user') == NULL) {
        return false;
    } else {
        return true;
    }
}
