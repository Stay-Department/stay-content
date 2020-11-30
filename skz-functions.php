<?php
/**
 * Plugin Name: Stay Department
 * Plugin URI: https://staydepartment.com
 * Description: A menu for accessing content items.
 * Version: 1.0
 * Author: Rhylen Nguyen
 * Author URI: https://rhylennguyen.com
 */
 function skz_content_enqueue_styles() {
   wp_register_style( 'widget_cta_css', plugins_url( 'skz-content.css', __FILE__ ) );
   wp_enqueue_style( 'widget_cta_css' );

   wp_register_script('imagesloaded_js', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array('jquery') );
   //wp_register_script('isotope_js', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js', array('jquery'));
   wp_register_script('widget_js', plugin_dir_url(__FILE__) . 'skz-content.js');


   wp_enqueue_script('imagesloaded_js');
   //wp_enqueue_script('isotope_js');
   wp_enqueue_script('widget_js');

 }

  add_action( 'wp_enqueue_scripts', 'skz_content_enqueue_styles' );

  class canvas_nav extends WP_Widget {

   function __construct() {
     parent::__construct('canvas_nav',  __('Canvas Nav', ' canvas_nav_domain'), array( 'description' => __( 'Canvas Navigation', 'canvas_nav_domain' ), ) );
   }

   public function form( $instance ) {
     if ( isset( $instance[ 'title' ] ) )
       $title = $instance[ 'title' ];
     else
       $title = __( 'Default Title', 'profile_widget_domain' );
     ?>

     <p>
       <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
     </p>

     <?php
   }
   public function update( $new_instance, $old_instance ) {
     $instance = array();
     $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
     return $instance;
   }
   public function widget( $args, $instance ) {
     $title = apply_filters( 'widget_title', $instance['title'] );

     echo  __('<div class="canvas_nav">');
     if (is_user_logged_in()) {
       $user = wp_get_current_user();
       ?>
       <div class="dropbtn">
       <img onclick="myFunction()" class="dropbtn" src="
       <?
       echo um_get_avatar_uri( um_profile('profile_photo'), 32 );
       echo __('"/></div><div id="myDropdown" class="dropdown-content"><div class="hell"><div style="padding: 3em 2em; letter-spacing:1.2px; position: relative; padding-bottom:1.5em; display:inline-block; line-height: 10px;font-size: 14px; bottom: 6px; color: #303030"><p style="margin-bottom:1em;">');
       echo um_user('display_name');
       echo __('</p><p style="font-weight: normal; font-size: 12px;">');
       echo '@'. $user->user_login;
       ?>

           </p>
         </div>
         <hr style="width: 80%; margin: auto; color:#FDACAC; border-top: 1px solid #fdacac;">
         <div style="font-size:14px; margin-top: 1em; line-height:19.07px;">
																		   <a href="/profile/">Profile</a>
           <a href="/account">Account Settings</a>
           <a href="/log-out">Logout</a>
         </div>
        </div>
       </div>

       <?
       return;
     }

     echo $args['before_widget'];

     //if title is present

     if ( ! empty( $title ) )

       echo $args['before_title'] . $title . $args['after_title'];

     //output

     echo __( '<a href="/login"><div class="button" id="login">Login</div></a><a href="/sign-up"><div class="button" id="register">Sign Up</div></a>' );
     echo  __('</div>');
     echo $args['after_widget'];

   }
  }

  function profile_register_widget() {

   register_widget( 'profile_widget' );

 }

  add_action( 'widgets_init', 'profile_register_widget' );

  class profile_widget extends WP_Widget {

   function __construct() {
     parent::__construct('profile_widget',  __('Profile', ' profile_widget_domain'), array( 'description' => __( 'Profile Widget', 'profile_widget_domain' ), ) );
   }

   public function form( $instance ) {
     if ( isset( $instance[ 'title' ] ) )
       $title = $instance[ 'title' ];
     else
       $title = __( 'Default Title', 'profile_widget_domain' );
     ?>

     <p>
       <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
     </p>

     <?php
   }
   public function update( $new_instance, $old_instance ) {
     $instance = array();
     $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
     return $instance;
   }
   public function widget( $args, $instance ) {
     $title = apply_filters( 'widget_title', $instance['title'] );

     echo  __('<div class="profile">');
     if (is_user_logged_in()) {
       $user = wp_get_current_user();
       ?>
       <div class="dropbtn">
       <img onclick="myFunction()" class="dropbtn" src="
       <?
       echo um_get_avatar_uri( um_profile('profile_photo'), 32 );
       echo __('"/></div><div id="myDropdown" class="dropdown-content"><div class="hell"><div style="padding: 3em 2em; letter-spacing:1.2px; position: relative; padding-bottom:1.5em; display:inline-block; line-height: 10px;font-size: 14px; bottom: 6px; color: #303030"><p style="margin-bottom:1em;">');
       echo um_user('display_name');
       echo __('</p><p style="font-weight: normal; font-size: 12px;">');
       echo '@'. $user->user_login;
       ?>

           </p>
         </div>
         <hr style="width: 80%; margin: auto; color:#FDACAC; border-top: 1px solid #fdacac;">
         <div style="font-size:14px; margin-top: 1em; line-height:19.07px;">
																		   <a href="/profile/">Profile</a>
           <a href="/account">Account Settings</a>
           <a href="/log-out">Logout</a>
         </div>
        </div>
       </div>

       <?
       return;
     }

     echo $args['before_widget'];

     //if title is present

     if ( ! empty( $title ) )

       echo $args['before_title'] . $title . $args['after_title'];

     //output

     echo __( '<a href="/login"><div class="button" id="login">Login</div></a><a href="/sign-up"><div class="button" id="register">Sign Up</div></a>' );
     echo  __('</div>');
     echo $args['after_widget'];

   }
  }

  function profile_register_widget() {

   register_widget( 'profile_widget' );

 }

  add_action( 'widgets_init', 'profile_register_widget' );

  add_action( 'template_redirect', 'um_restrict_login_page_logged_in' );
  function um_restrict_login_page_logged_in() {
    if ( um_is_core_page('login') && is_user_logged_in() ) {
        wp_redirect( um_get_core_page( 'user' ) );
        exit;
    }
}
