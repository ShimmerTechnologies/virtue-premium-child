<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 15 );

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'virtue-child-style', get_stylesheet_directory_uri() . '/style.css' );

}

function wp_add_google_fonts(){
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900', false);

}
add_action('wp_enqueue_scripts', 'wp_add_google_fonts');

add_action( 'kt_woocommerce_page_title_right', 'woo_cat_header', 30 );
function woo_cat_header(){
			 global $virtue_premium; $shop_filter = $virtue_premium['shop_filter']; 
			 $cat_filter = $virtue_premium['cat_filter']; 
			 if(!empty($virtue_premium['filter_all_text'])) {$alltext = $virtue_premium['filter_all_text'];} else {$alltext = __('All', 'virtue');}
			 if(!empty($virtue_premium['shop_filter_text'])) {$shopfiltertext = $virtue_premium['shop_filter_text'];} else {$shopfiltertext = __('Filter Products', 'virtue');}
}

  
/* Custom Add To Cart Messages */

	add_filter( 'wc_add_to_cart_message', 'woocommerce_custom_add_to_cart_message', 10, 2 );

	function woocommerce_custom_add_to_cart_message($message, $product_id) {

	global $woocommerce;
	
	if ( is_array( $product_id ) ) {

	    $titles = array();

	    foreach ( $product_id as $id ) {
	        $titles[] = get_the_title( $id );
	    }

	    $added_text = sprintf( __( 'Added &quot;%s&quot; to your cart.', 'woocommerce' ), join( __( '&quot; and &quot;', 'woocommerce' ), array_filter( array_merge( array( join( '&quot;, &quot;', array_slice( $titles, 0, -1 ) ) ), array_slice( $titles, -1 ) ) ) ) );

	} else {
	    $added_text = sprintf( __( '&quot;%s&quot; was successfully added to your cart.', 'woocommerce' ), get_the_title( $product_id ) );
	}

	// Output success messages

	if (get_option('woocommerce_cart_redirect_after_add')=='yes') :

	$return_to = get_permalink(wc_get_page_id('shop'));// Give the url, you want to redirect

	$message =  sprintf('<a href="%s" class="button wc-forward">%s</a> %s', esc_url( $return_to ), esc_html__( 'Continue Shopping', 'woocommerce' ), '<p>'. esc_html( $added_text ) . '</p>' );
	 
	else :

	$message = sprintf('<a href="%s" class="button wc-forward">%s</a> %s', esc_url( wc_get_page_permalink( 'cart' ) ), esc_html__( 'View Cart', 'woocommerce' ), '<p>'.esc_html( $added_text ) .'</p><a class="button wc-forward mright10" href="' . $woocommerce->cart->get_checkout_url() . '" title="' . __( 'Checkout' ) . '">' . __( 'Checkout' ) . '</a>' );
	 
	endif;

	return $message;


	}

add_filter('kadence_display_sidebar', 'kad_custom_fullwidth_page');
function kad_custom_fullwidth_page($sidebar) {
  if (is_page_template('page-fullwidth-contact.php') || is_page_template('page-contact-template.php') ) {
    return false;
  }
  return $sidebar;
} 