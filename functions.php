<?php

require_once 'inc/customPosts.php';
require_once 'inc/formHandler.php';
require_once 'inc/user-meta.php';
require_once 'inc/multi-cards.php';

function lt_scripts(){
  wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
	wp_enqueue_script('modules', get_theme_file_uri('/js/modules.js'), NULL, microtime(), true);
  wp_enqueue_script('main', get_theme_file_uri('/js/custom.js'), NULL, microtime(), true);
}
add_action('wp_enqueue_scripts', 'lt_scripts');

// Adding Theme Support

function lt_setup_theme() {
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('html5',
    array('comment-list', 'comment-form', 'search-form')
  );
  // add_theme_support( 'woocommerce' );
  // add_theme_support( 'wc-product-gallery-zoom' );
  // add_theme_support( 'wc-product-gallery-lightbox' );
  // add_theme_support( 'wc-product-gallery-slider' );
  add_post_type_support( 'page', 'excerpt' );  
}
add_action('after_setup_theme', 'lt_setup_theme');











// NICE FUNCTIONALITIES
// this removes the "Archive" word from the archive title in the archive page
add_filter('get_the_archive_title',function($title){
  if(is_category()){$title=single_cat_title('',false);
  }elseif(is_tag()){$title=single_tag_title('',false);
  }elseif(is_author()){$title='<span class="vcard">'.get_the_author().'</span>';
  }elseif(is_tax()){ //for custom post types
    $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
  }elseif(is_post_type_archive()) {
    $title = post_type_archive_title( '', false );
  }return $title;
});

function get_img_id_by_slug( $slug ) {
  $args = array(
    'post_type' => 'attachment',
    'name' => sanitize_title($slug),
    'posts_per_page' => 1,
    'post_status' => 'inherit',
  );
  $_header = get_posts( $args );
  $header = $_header ? array_pop($_header) : null;
  return $header ? $header->ID : '';
}
















function excerpt($charNumber){
  if(!$charNumber){$charNumber=1000000;}
  $excerpt = get_the_excerpt();
  if(strlen($excerpt)<=$charNumber){return $excerpt;}else{
    $excerpt = substr($excerpt, 0, $charNumber);
    $result  = substr($excerpt, 0, strrpos($excerpt, ' '));
    // $result = $result . '(...)';
    // return var_dump($excerpt);
    return $result;
  }
}








function register_menus() {
  register_nav_menu('header',__( 'Menu principal ordenador' ));
  register_nav_menu('footerNav',__( 'Pie de página' ));
  register_nav_menu('navBarMobile',__( 'Menu principal movil' ));
  // add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'register_menus' );









// add_action('departamento_edit_form_fields','addTitleFieldToCat');
// add_action('departamento_add_form_fields','addTitleFieldToCat');
// add_action('departamento_edit_form', 'addTitleFieldToCat');
// add_action('departamento_add_form','addTitleFieldToCat');








function addTitleFieldToCat(){
  $cat_title = get_term_meta($_POST['tag_ID'], '_pagetitle', true);
  ?> 
  <tr class="form-field">
      <th scope="row" valign="top"><label for="cat_page_title"><?php _e('Category Page Title'); ?></label></th>
      <td>
      <input type="text" name="cat_title" id="cat_title" value="<?php echo $cat_title ?>"><br />
          <span class="description"><?php _e('Title for the Category '); ?></span>
      </td>
  </tr>
  <?php

}
// add_action ( 'edit_category_form_fields', 'addTitleFieldToCat');

function saveCategoryFields() {
  if ( isset( $_POST['cat_title'] ) ) {
      update_term_meta($_POST['tag_ID'], '_pagetitle', $_POST['cat_title']);
  }
}
// add_action ( 'edited_category', 'saveCategoryFields');







































// FUCTION FOR USER GENERATION
// https://tommcfarlin.com/create-a-user-in-wordpress/
add_action( 'admin_post_nopriv_lt_sumate', 'lt_sumate');
add_action(        'admin_post_lt_sumate', 'lt_sumate');
function lt_sumate(){
  $link          = $_POST['link'];
  $nombre        = $_POST['nombre'];
  $apellido      = $_POST['apellido'];
  $dni           = $_POST['dni'];
  $email         = $_POST['email'];
  $telefono      = $_POST['telefono'];
  $ciudad        = $_POST['ciudad'];
  $codigo_postal = $_POST['codigo_postal'];
  $domicilio     = $_POST['domicilio'];
  $socio         = $_POST['socio'];
  $voluntario    = $_POST['voluntario'];
  $cantidad      = $_POST['cantidad'];
  $dia_de_pago   = $_POST['dia_de_pago'];
  $cuenta        = $_POST['cuenta'];
  $departamento  = $_POST['departamento'];
  $nota          = $_POST['nota'];
  $subscription_type = $_POST['subscription_type'];
  // var_dump($_POST);
  // echo '<br>';
  // echo '<br>';
  // var_dump($_GET);
  // echo '<br>';
  // echo '<br>';
  // var_dump($apellido);
  // echo '<br>';
  // echo '<br>';
  // var_dump($email);
  // echo '<br>';
  // echo '<br>';


    // ERROR HANDLING
  if( null != username_exists( $mail ) || email_exists( $mail ) != false  ) {
    $action='alreadyExist';
  } else {

    // recaptcha


    $site = '6LeE7b8ZAAAAAJSXcqghZa6spv9aUCuaZm1k8hjh';
    $scrt = '6LeE7b8ZAAAAALYT37X6JwPR0gbVFLpU7I-J-DOk';

    $response = $_POST['g-recaptcha-response'];
    $payload = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$scrt.'&response='.$response);
    // echo $payload;
    $result = json_decode($payload,true);
    if ($result['success']!=1) {
       // code...
       // header( "Location: https://multiviahr.info/?mail=BOT" );
       // $link = add_query_arg( array( 'status' => 'bot' , ), $link );
       // echo 'you are evil or a bott';
       // exit;
        $action='bot';
       // return false;
    } else {



      // Generate the password and create the user for security
      $password = wp_generate_password( 12, false );
      // $user_id = wp_create_user( $mail, $password, $mail );

      // user generated pass for local testing

      $user_nicename = sanitize_title($nombre . '_' . $apellido);
      echo $new_url;

      $userdata = array(
        'user_pass'             => $password,   //(string) The plain-text user password.
        'user_login'            => $email,   //(string) The user's login username.
        'user_nicename'         => $user_nicename,   //(string) The URL-friendly user name.
        // 'user_url'              => '',   //(string) The user URL.
        'user_email'            => $email,   //(string) The user email address.
        'display_name'          => $nombre,   //(string) The user's display name. Default is the user's username.
        'nickname'              => $nombre,   //(string) The user's nickname. Default is the user's username.
        'first_name'            => $nombre,   //(string) The user's first name. For new users, will be used to build the first part of the user's display name if $display_name is not specified.
        'last_name'             => $apellido,   //(string) The user's last name. For new users, will be used to build the second part of the user's display name if $display_name is not specified.
        // 'description'           => '',   //(string) The user's biographical description.
        // 'rich_editing'          => '',   //(string|bool) Whether to enable the rich-editor for the user. False if not empty.
        // 'syntax_highlighting'   => '',   //(string|bool) Whether to enable the rich code editor for the user. False if not empty.
        // 'comment_shortcuts'     => '',   //(string|bool) Whether to enable comment moderation keyboard shortcuts for the user. Default false.
        // 'admin_color'           => '',   //(string) Admin color scheme for the user. Default 'fresh'.
        // 'use_ssl'               => '',   //(bool) Whether the user should always access the admin over https. Default false.
        // 'user_registered'       => '',   //(string) Date the user registered. Format is 'Y-m-d H:i:s'.
        // 'show_admin_bar_front'  => '',   //(string|bool) Whether to display the Admin Bar for the user on the site's front end. Default true.
        'role'                  => 'subscriber',   //(string) User's role.
        // 'locale'                => '',   //(string) User's locale. Default empty.
      );

      $user_id = wp_insert_user( $userdata );


      // $user_id = wp_create_user( $nombre, $password, $email );
      // Set the nickname and display_name
      // wp_update_user(
      //   array(
      //     'ID'              =>    $user_id,
      //     'display_name'    =>    $nombre,
      //     'nickname'        =>    $nombre,
      //   )
      // );

      

      $metas = array( 
        'dni'                => $_POST[ 'dni' ],
        'ciudad'             => $_POST[ 'ciudad' ],
        'codigo_postal'      => $_POST[ 'codigo_postal' ],
        'domicilio'          => $_POST[ 'domicilio' ],
        'cuenta'             => $_POST[ 'cuenta' ],
        'telefono'           => $_POST[ 'telefono' ],
        'socio'              => $_POST[ 'socio' ],
        'voluntario'         => $_POST[ 'voluntario' ],
        'cantidad'           => $_POST[ 'cantidad' ],
        'dia_de_pago'        => $_POST[ 'dia_de_pago' ],
        'departamento'       => $_POST[ 'departamento' ],
        'subscription_type'  => $_POST[ 'subscription_type' ],
        'nota'               => $_POST[ 'nota' ],
      );
      foreach($metas as $key => $value) {
          update_user_meta( $user_id, $key, $value );
      }
      



      
    // $email='molinerozadkiel@gmail.com';

    $subject = "Mail desde Generacion o2";


    require_once 'inc/mail.php';




    $headers = array('Content-Type: text/html; charset=UTF-8');

      if (wp_mail( $email , $subject , $message , $headers )) {
      // if (wp_mail( $_POST['email'] , $subject , $message , $headers )) {
        $mail = 'sent';
      } else {
        $mail = 'error';
      }


      $notification_email = 'junta.directiva@generacion-o2.org';
      $notification_subject = 'Nuevo '. $subscription_type;
      $notification_message = "
        <p><strong>Nombre:</strong> $nombre $apellido</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Tipo de suscripcion:</strong> $subscription_type</p>
      ";
      wp_mail( $notification_email , $notification_subject , $notification_message , $headers );
      // wp_mail( $mail, 'Welcome '.$name.'!', $message, $headers );


      $action='register';
    }

  }

  $link = add_query_arg( array(
    // 'status' => $status,
    'status' => $action,
    'mail'   => $mail,
    // 'resultado' => username_exists( $mail ),
  ), $link );
  wp_redirect($link);
}
















add_action( 'admin_post_nopriv_lt_new_pass', 'lt_new_pass');
add_action(        'admin_post_lt_new_pass', 'lt_new_pass');
function lt_new_pass(){
  $link=$_POST['link'];
  $oldp=$_POST['oldp'];
  $newp=$_POST['newp'];
  $cnfp=$_POST['cnfp'];



  // if(isset($_POST['current_password'])){
  if(isset($_POST['oldp'])){
    $_POST = array_map('stripslashes_deep', $_POST);
    $current_password = sanitize_text_field($_POST['oldp']);
    $new_password = sanitize_text_field($_POST['newp']);
    $confirm_new_password = sanitize_text_field($_POST['cnfp']);
    $user_id = get_current_user_id();
    $errors = array();
    $current_user = get_user_by('id', $user_id);
  }

  $link = add_query_arg( array(
    'action' => $action,
  ), $link );
  // Check for errors
  if($current_user && wp_check_password($current_password, $current_user->data->user_pass, $current_user->ID)){
  //match
  } else {
    $errors[] = 'Password is incorrect';

    $link = add_query_arg( array(
      'pass'  => 'incorrect',
    ), $link );
  }
  if($new_password != $confirm_new_password){
    $errors[] = 'Password does not match';

    $link = add_query_arg( array(
      'match'  => 'no',
    ), $link );
  }
  if(empty($errors)){
      wp_set_password( $new_password, $current_user->ID );
      $link = add_query_arg( array(
        'success'  => true,
      ), $link );
  }
  wp_redirect($link);
}










































//Second solution : two or more files.
//If you're using a child theme you could use:
// get_stylesheet_directory_uri() instead of get_template_directory_uri()
add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
  // wp_enqueue_style( 'admin_css_foo', get_template_directory_uri() . '/css/backoffice.css', false, '1.0.0' );
}
