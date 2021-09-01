<?php 


add_action('transition_post_status', 'sn_new_post_wc', 10, 3); 
 /**
  * Method sn_new_post_wc
  *
  * @param $new_status
  * @param $old_status
  * @param $post
  * @return void
  */
 function sn_new_post_wc($new_status, $old_status, $post) {
 if( $old_status != 'publish' && $new_status == 'publish'  && !empty($post->ID)  && in_array( $post->post_type, array( 'product'))) {
        $postId = $post->ID;
        $postTitle = $post->post_title;
        $createPostById = new postProduct();
        if($createPostById->CreatePostById($postId, $postTitle)) {
            error_log("publish : true");
        } else {
            error_log("publish : false");
        }
    }
}

add_action( 'transition_post_status', 'sn_deleted_post_wc', 10, 3);
/**
 * Method sn_deleted_post_wc
 *
 * @param $new_status 
 * @param $old_status 
 * @param $post
 *
 * @return void
 */
function sn_deleted_post_wc($new_status, $old_status, $post) {
    error_log("deleting" . $post->ID);
    if ($post->post_type == 'product' && $new_status == "trash") {
        error_log("deleting" . $post->post_title);
        $deletePostById = new postProduct();
        if($deletePostById->deletePostById($post->ID)) {
            error_log("delete : true");
        } else {
            error_log("delete : false");
        }
    }
      
}


add_action( 'post_updated', 'sn_updated_post_wc', 10, 3);
/**
 * Method sn_updated_post_wc
 *
 * @param $post_ID
 * @param $post_after
 * @param $post_before
 *
 * @return void
 */
function sn_updated_post_wc($post_ID, $post_after, $post_before) {
    if (isset($post_ID)) {
        $post = get_post($post_ID);
        error_log("update" . $post->ID);
        if ($post->post_type == 'product' && $post_before->ID != $post_after->ID || $post_before->post_title != $post_after->post_title) {
            error_log("update" . $post->post_title);
            $updatePostWC = new postProduct();
            if($updatePostWC->updatePostWC($post_before, $post_after)) {
                error_log("update : true");
            } else {
                error_log("update : false");
            }
        } else {
            error_log("update : no need");
        }
    } else {
        return;
    }
      
}
