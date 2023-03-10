<?php
/**
 * Wishlist footer
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 3.0.0
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
?>
    <div class="yith_wcwl_wishlist_footer">
        <?php if ( $count && $show_cb ) : ?>
            <!-- Bulk actions form -->
            <div class="yith_wcwl_wishlist_bulk_action">
                <label for="bulk_actions"><?php echo apply_filters( 'yith_wcwl_wishlist_bulk_actions_label', __( 'Apply this action to all the selected items:', 'yith-woocommerce-wishlist' ) ) ?></label>
                <select name="bulk_actions" id="bulk_actions">
                    <option value="add_to_cart"><?php _e( 'Add to cart', 'yith-woocommerce-wishlist' ) ?></option>

                    <?php if ( $is_user_owner ): ?>
                        <option value="delete"><?php _e( 'Remove from wishlist', 'yith-woocommerce-wishlist' ) ?></option>

                        <?php if( $available_multi_wishlist && count( $users_wishlists ) > 1 ): ?>
                            <?php
                            foreach( $users_wishlists as $wl ):
	                            /**
	                             * @var $wl \YITH_WCWL_Wishlist
	                             */
                                if( $wl->get_token() == $wishlist_token ){
                                    continue;
                                }
                            ?>
                                <option value="<?php echo esc_attr( $wl->get_token() ) ?>"><?php printf( __( 'Move to %s', 'yith-woocommerce-wishlist' ), $wl->get_formatted_name() ) ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </select>
                <input type="submit" name="apply_bulk_actions" value="<?php _e( 'Apply', 'yith-woocommerce-wishlist' ) ?>"/>
            </div>
        <?php endif; ?>


	    <?php if( $count && $show_update ) : ?>
            <!-- Update wishlist button -->
            <div class="yith_wcwl_wishlist_update">
                <input type="submit" name="update_wishlist" value="<?php _e( 'Update', 'yith-woocommerce-wishlist' ) ?>"/>
            </div>
	    <?php endif; ?>


        <?php if ( $count && $share_enabled ): ?>
            <!-- Sharing section -->
            <?php yith_wcwl_get_template( 'share.php', array_merge( $share_atts, array( 'wishlist' => $wishlist ) ) ); ?>
        <?php endif; ?>

        <?php if( $count && ( $show_ask_estimate_button || $enable_add_all_to_cart ) ): ?>
            <div class="yith_wcwl_footer_additional_action">
                <?php if( $count && $show_ask_estimate_button ): ?>
                    <!-- Ask an estimate button -->
                    <a href="<?php echo ( $additional_info || ! is_user_logged_in() ) ? '#ask_an_estimate_popup' : $ask_estimate_url ?>" class="<?php echo esc_attr( $ask_an_estimate_classes ) ?> ask-an-estimate-button" <?php echo ( $additional_info ) ? 'data-rel="prettyPhoto[ask_an_estimate]"' : '' ?> >
                        <?php echo apply_filters( 'yith_wcwl_ask_an_estimate_icon', $ask_an_estimate_icon )?>
                        <?php echo apply_filters( 'yith_wcwl_ask_an_estimate_text', __( 'Ask for an estimate', 'yith-woocommerce-wishlist' ) ) ?>
                    </a>
                <?php endif; ?>

                <?php if( $count && $enable_add_all_to_cart ): ?>
                    <!-- Add all to cart button -->
                    <input type="submit" name="add_all_to_cart" value="<?php _e( 'Add all to cart', 'yith-woocommerce-wishlist' ) ?>" />
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php wp_nonce_field( 'yith_wcwl_edit_wishlist_action', 'yith_wcwl_edit_wishlist' ); ?>
    <input type="hidden" value="<?php echo $wishlist_token ?>" name="wishlist_id" id="wishlist_id">

    <?php do_action( 'yith_wcwl_after_wishlist', $wishlist ); ?>

</form>

<?php do_action( 'yith_wcwl_after_wishlist_form', $wishlist ); ?>

<?php
if( apply_filters( 'yith_wcwl_ask_an_estimate_conditions', $show_ask_estimate_button && ( ! is_user_logged_in() || $additional_info ) ) ){
	yith_wcwl_get_template( 'wishlist-popup-ask-an-estimate.php', $var );
}
?>

<?php
if( apply_filters( 'yith_wcwl_move_to_another_wishlist_popup_conditions', $move_to_another_wishlist && 'popup' == $move_to_another_wishlist_type && $is_user_owner && $available_multi_wishlist && count( $users_wishlists ) > 1, $wishlist ) ){
	yith_wcwl_get_template( 'wishlist-popup-move.php', $var );
}
?>
