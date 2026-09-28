<?php




function wpform_admin_menu() {
    add_menu_page(
        'WPForm',
        'WPForm',
        'manage_options',
        'wpform',
        'wpform_admin_page'
    );
}

add_action( 'admin_menu', 'wpform_admin_menu' );

function wpform_admin_page() {
if ( isset( $_POST['name'] ) ) {

    if ( ! isset( $_POST['wpform_nonce'] ) ||
         ! wp_verify_nonce( $_POST['wpform_nonce'], 'wpform_save' ) ) {
        return;
    }

    $name = sanitize_text_field( $_POST['name'] );

    echo esc_html( $name );
}

if ( isset( $_POST['email'] ) ) {
    if ( ! isset( $_POST['wpform_nonce'] ) ||
         ! wp_verify_nonce( $_POST['wpform_nonce'], 'wpform_save' ) ) {
        return;
    }

    $email = sanitize_email( $_POST['email'] );
    echo esc_html( $email );
}
    ?>
    <h1>WPForm</h1>

<form method="post">

    <?php wp_nonce_field( 'wpform_save', 'wpform_nonce' ); ?>

    <label>Name</label>
    <input type="text" name="name">

    <br><br>

    <label>Email</label>
    <input type="email" name="email">

    <br><br>

    <button type="submit">Save</button>

</form>
    <?php
}
