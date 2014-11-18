<?php
/*
Plugin Name: WP Case-insensitive Password Protected Pages
Description: For case-insensitive Password Protected Pages
Author: Nuno Batista
Version: 1.0.0
Author URI: http://www.ntknetworks.com/
Tags: password, case, strtolower, insensitive, pages
*/

define( 'CIP_version' , '1.0.0' );

function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "To view this protected post, enter the password below:" ) . '
    <label for="' . $label . '">' . __( "Password:" ) . ' </label>
    <input name="post_password" onChange="javascript:this.value=this.value.toLowerCase();" id="' . $label . '" type="password" size="20" maxlength="20" />
    <input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" />
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'my_password_form' );