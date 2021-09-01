<?php
//=========================If order completed=====================================//
/**
 * Method mysite_woocommerce_payment_complete
 *
 * @param $order_id
 *
 * @return void
 */
function mysite_woocommerce_payment_complete( $order_id ) {
    error_log( "Payment has been received for order $order_id" );
    //=============Info===========//
    $order = wc_get_order( $order_id );
    $email = $order->get_billing_email();
    $nbr_game = 15;
    $name = $order->get_billing_first_name();
    
     //=================Creation of user for each game=====================//

    foreach ( $order->get_items() as $item_id => $item ) {
        error_log($item->get_product_id());
        $product = wc_get_product($item->get_product_id());
        $image_id = $product->get_image_id();
        $image_url = wp_get_attachment_image_url( $image_id, 'full' );

        error_log($item->get_variation_id());
        error_log($item->get_product());
        error_log($item->get_name());
        error_log($item->get_quantity());


        $product_id = $item->get_product_id();

        $utils = new utils();
        $password = $utils->setPassword(rand(10, 12));

        $infoUser = array(
            'email' => $email,
            'password' => $password,
            'nbr_game' => $nbr_game * $item->get_quantity(),
            'product_id' => $product_id,
            'product_name' => $item->get_name(),
            'order_id' => $order_id,
            'nameShipingFirstName' => $name,
            'imgUrl' => $image_url
        );
        

        $createUser = new user();
        if($createUser->CreateUser($infoUser)) {
            $utils->sendEmail($infoUser);
        } else {
            error_log("Il y a heu un probleme avec cette commande $order_id <<Creation of user failed>>");
        }
    }
    //==============================================================//
    
//==============================================================//
    
}
add_action( 'woocommerce_payment_complete', 'mysite_woocommerce_payment_complete', 10, 1 );
