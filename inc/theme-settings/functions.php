<?php

function sast_only_administrators($cmb) {

    $user = wp_get_current_user();

    if ( in_array( 'administrator', $user->roles ) ) {
        $is_admin = true;
    }        

    return $is_admin;

}