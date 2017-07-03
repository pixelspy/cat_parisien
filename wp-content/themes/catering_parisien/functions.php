<?php // enregistre les menus

add_action( 'init', 'cp_register_menus' );
function cp_register_menus() {
register_nav_menus(
array(
'top-menu' => 'Menu Principal',
'footer-menu' => 'Menu Footer'
)
);
}

// permet le support des vignettes article
add_theme_support( 'post-thumbnails' );

/** Register taxonomy for images */
function olab_register_taxonomy_for_images() {
    register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init', 'olab_register_taxonomy_for_images' );

/** Add a category filter to images */
function olab_add_image_category_filter() {
    $screen = get_current_screen();
    if ( 'upload' == $screen->id ) {
        $dropdown_options = array( 'show_option_all' => __( 'View all categories', 'olab' ), 'hide_empty' => false, 'hierarchical' => true, 'orderby' => 'name', );
        wp_dropdown_categories( $dropdown_options );
    }
}
add_action( 'restrict_manage_posts', 'olab_add_image_category_filter' );



if (!is_admin()) {
    wp_enqueue_style('style', get_template_directory_uri() . '/main.css');
}






// gestion du formulaire de contact
if( isset($_POST['cp-contact-submit']) && $_POST['cp-contact-submit']==1) {

    $valide = true;
    $_SESSION['cp-contact-error'] = array();

    if ((!isset($_POST['cp-contact-nom']) || $_POST['cp-contact-nom'] == '')) {
        $valide = false;
        $_SESSION['cp-contact-error'][] = 'Le nom est obligatoire';
    }

    if ((!isset($_POST['cp-contact-email']) || $_POST[''] == 'cp-contact-email')) {
        $valide = false;
        $_SESSION['cp-contact-error'][] = 'L\'adresse email est obligatoire';
    }

    if ((!isset($_POST['cp-contact-dest']) || $_POST[''] == 'cp-contact-dest')) {
        $valide = false;
        $_SESSION['cp-contact-error'][] = 'L\'adresse email du destinataire est obligatoire';
    }

    if ((!isset($_POST['cp-contact-obj']) || $_POST['cp-contact-obj'] == '')) {
        $valide = false;
        $_SESSION['cp-contact-error'][] = 'L\'objet du message est obligatoire';
    }

    if ((!isset($_POST['cp-contact-msg']) || $_POST['cp-contact-msg'] == '')) {
        $valide = false;
        $_SESSION['cp-contact-error'][] = 'Le message est obligatoire';
    }


    if ($valide) {

// recupere post contact
        $dest_email = get_post_meta(14, 'contact_mail');

        $content = '<p>Vous avez reçu une demande de contact:
<ul>
    <li>Nom : ' . sanitize_text_field($_POST['cp-contact-nom']) . '</li>
    <li>Email : ' . $_POST['cp-contact-email'] . '</li>
    <li>Objet : ' . sanitize_text_field($_POST['cp-contact-obj']) . '</li>
</ul>
</p>
<p>
    Message : ' . sanitize_text_field($_POST['cp-contact-msg']) . '
</p>
';

// envoi du mail
        $to = $dest_email;
        $subject = $dest_email['cp_email_sujet'];
        $content = sanitize_text_field($_POST['cp-contact-msg']);
        $headers[] = 'MIME-Version: 1.0' . "\r\n";
        $headers[] = 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers[] = "X-Mailer: PHP \r\n";
        $headers[] = 'From: ' . sanitize_text_field($_POST['cp-contact-nom']) . ' < ' . $_POST['cp-contact-email'] . '>' . "\r\n";

        add_filter('wp_mail_content_type', 'set_html_content_type');
// pour le candidat
        $status = wp_mail($to, $subject, $content, $headers);
// pour l'admin
        $status = wp_mail(get_bloginfo('admin_email'), $subject, $content, $headers);
// Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
        remove_filter('wp_mail_content_type', 'set_html_content_type');

        $type = 'updated';
        $message = __('Vos informations ont bien été enregistrées, merci !');

    } else {

        $type = 'error';
        $message = __('Merci de renseigner tous les champs obligatoires signalés en rouge avant la validation finale');

    }

}
