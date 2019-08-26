<?php
/*
Plugin Name: Book Now for Welwyn Osteopaths
Description: Contains the 'Book Now', Phone and Email buttons plus the address of the Welwyn Osteopaths
*/

// Register and load the widget
function book_now_load_widget() {
 register_widget( 'book_now_widget' );
}
add_action( 'widgets_init', 'book_now_load_widget' );



// Creating the widget 
class book_now_widget extends WP_Widget {
 
 function __construct() {
  parent::__construct(

  // Base ID of your widget
  'book_now_widget', // wpb_widget 

  // Widget name will appear in UI
  __('Book Now Widget', 'book_now_widget_domain'), 

  // Widget description
  array( 'description' => __( 'Book Now Panel for Welwyn Osteopaths', 'book_now_widget_domain' ), ) 
  );
 }
 
 // Creating widget front-end

 public function widget( $args, $instance ) {

  $book_btn_txt = apply_filters( 'widget_title', $instance['book-btn-txt'] );
  $phone_btn_txt = apply_filters( 'widget_title', $instance['phone-btn-txt'] );
  $email_btn_txt = apply_filters( 'widget_title', $instance['email-btn-txt'] );
  $address = apply_filters( 'widget_title', $instance['address'] );
  
  $phone_number = apply_filters( 'widget_title', $instance['phone-number']);
  $email_address = apply_filters( 'widget_title', $instance['email-address'] );

  // before and after widget arguments are defined by themes
  echo $args['before_widget'];
  if ( ! empty( $book_btn_txt ) && ! empty( $phone_btn_txt ) && ! empty( $email_btn_txt ) && ! empty( $address ) ) {
  echo '<ul class="book-btns"><li>';
  echo '<a href="https://the-osteopathic-centre-welwyn-garden-city.cliniko.com/bookings#service" target="_blank" class="show-for-small-only large button">' . $book_btn_txt . '</a>';
  echo '<a href="https://the-osteopathic-centre-welwyn-garden-city.cliniko.com/bookings#service" target="_blank" class="show-for-medium-up wp-colorbox-iframe cboxElement expanded large button">' . $book_btn_txt . '</a>';
  echo '</li><li><a href="tel:' . $phone_number; 
  echo '" class="expanded medium secondary button">' . $phone_btn_txt;
  echo '</a></li><li><a href="mailto:' . $email_address;
  echo '" class="expanded small secondary ghost button">' . $email_btn_txt;
  echo '</a></li><li><p>' . $address;
  echo '</p></li></ul>';
 }
  // This is where you run the code and display the output
  echo __( '', 'book_now_widget_domain' );
  echo $args['after_widget'];
 }
 
 // Widget Backend 
 public function form( $instance ) {
  //---
  if ( isset( $instance[ 'book-btn-txt' ] ) ) {
   $book_btn_txt = $instance[ 'book-btn-txt' ];
  }
  else {
   $book_btn_txt = __( 'New Book', 'book_now_widget_domain' );
  }
  //---
  if ( isset( $instance[ 'phone-btn-txt' ] ) ) {
   $phone_btn_txt = $instance[ 'phone-btn-txt' ];
  }
  else {
   $phone_btn_txt = __( 'New Phone', 'book_now_widget_domain' );
  }
  //---
  //---
  if ( isset( $instance[ 'email-btn-txt' ] ) ) {
   $email_btn_txt = $instance[ 'email-btn-txt' ];
  }
  else {
   $email_btn_txt = __( 'New Email', 'book_now_widget_domain' );
  }
  //---
  if ( isset( $instance[ 'email-address' ] ) ) {
   $email_address = $instance[ 'email-address' ];
  }
  else {
   $email_address = __( 'New Email Address', 'book_now_widget_domain' );
  }
  //---
  if ( isset( $instance[ 'phone-number' ] ) ) {
   $phone_number = $instance[ 'phone-number' ];
  }
  else {
   $phone_number = __( 'New Phone Number', 'book_now_widget_domain' );
  }
  //---
  if ( isset( $instance[ 'address' ] ) ) {
   $address = $instance[ 'address' ];
  }
  else {
   $address = __( 'New Address', 'book_now_widget_domain' );
  }

  // Widget admin form
  ?>
  <p>
  <!-- --------->
  <label for="<?php echo $this->get_field_id( 'book-btn-txt' ); ?>"><?php _e( 'Book Button Text:' ); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id( 'book-btn-txt' ); ?>" name="<?php echo $this->get_field_name( 'book-btn-txt' ); ?>" type="text" value="<?php echo esc_attr( $book_btn_txt ); ?>" />

  <!-- --------->
  <label for="<?php echo $this->get_field_id( 'phone-btn-txt' ); ?>"><?php _e( 'Phone Button Text:' ); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id( 'phone-btn-txt' ); ?>" name="<?php echo $this->get_field_name( 'phone-btn-txt' ); ?>" type="text" value="<?php echo esc_attr( $phone_btn_txt ); ?>" />

  <!-- --------->
  <label for="<?php echo $this->get_field_id( 'phone-number' ); ?>"><?php _e( 'Phone Number:' ); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id( 'phone-number' ); ?>" name="<?php echo $this->get_field_name( 'phone-number' ); ?>" type="text" value="<?php echo esc_attr( $phone_number ); ?>" />

  <!-- --------->
  <label for="<?php echo $this->get_field_id( 'email-btn-txt' ); ?>"><?php _e( 'Email Button Text:' ); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id( 'email-btn-txt' ); ?>" name="<?php echo $this->get_field_name( 'email-btn-txt' ); ?>" type="text" value="<?php echo esc_attr( $email_btn_txt ); ?>" />

  <!-- --------->
  <label for="<?php echo $this->get_field_id( 'email-address' ); ?>"><?php _e( 'Email Address:' ); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id( 'email-address' ); ?>" name="<?php echo $this->get_field_name( 'email-address' ); ?>" type="text" value="<?php echo esc_attr( $email_address ); ?>" />

  <!-- --------->
  <label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address Text:' ); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />

  </p>
  <?php 
 }

 // Updating widget replacing old instances with new
 public function update( $new_instance, $old_instance ) {
  $instance = array();
  $instance['book-btn-txt'] = ( ! empty( $new_instance['book-btn-txt'] ) ) ? strip_tags( $new_instance['book-btn-txt'] ) : '';
  $instance['phone-btn-txt'] = ( ! empty( $new_instance['phone-btn-txt'] ) ) ? strip_tags( $new_instance['phone-btn-txt'] ) : '';
  $instance['email-btn-txt'] = ( ! empty( $new_instance['email-btn-txt'] ) ) ? strip_tags( $new_instance['email-btn-txt'] ) : '';
  $instance['email-address'] = ( ! empty( $new_instance['email-address'] ) ) ? strip_tags( $new_instance['email-address'] ) : '';
  $instance['phone-number'] = ( ! empty( $new_instance['phone-number'] ) ) ? strip_tags( $new_instance['phone-number'] ) : '';
  $instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
  return $instance;
 }
} // Class book_now_widget ends here

?>