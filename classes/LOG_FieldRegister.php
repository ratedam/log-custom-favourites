<?php
/**
 * Register the field in the required post type (post for this example) and it's displaying/saving methods.
 */

namespace log_custom_favourites;

class LOG_FieldRegister{


    /**
     * LOG_FieldRegister constructor. - On load-post and load-post-new initialize the metaboxes setup
     */
	function __construct(){
		add_action( 'load-post.php', array( $this , 'log_favourites_metaboxes_setup' ) );
		add_action( 'load-post-new.php', array( $this , 'log_favourites_metaboxes_setup' ) );
	}

    /**
     * Make the metabox setup (display and saving functions)
     */
	function log_favourites_metaboxes_setup() {
	  // add metaboxes
	  add_action( 'add_meta_boxes', array( $this, 'log_favourites_add_post_metaboxes' ) );

	  // save the data on the save_post hook
	  add_action( 'save_post', array( $this , 'log_favourites_save_post_metabox' ), 10, 2 );
	}

    /**
     * Add the metabox to the element
     */
	function log_favourites_add_post_metaboxes() {
        add_meta_box(
            'log-favourites-element',
            'Save as favourite',
            array( $this ,'log_favourites_display_metabox' ),  // function to handle the display
            array('post'),
            'side',
            'high'
        );
	}

    /**
     * Display the post metabox
     * @param $post - The post current post object
     */
	function log_favourites_display_metabox( $post ) {
	    // get the current checked value
		$favourite_checked = get_post_meta( $post->ID, LOG_FAVOURITES_METAKEY, true );

		// if is equal to "on" we know it's checked
		if( ! empty( $favourite_checked )  && $favourite_checked == 1 ){
			$favourite_checked = "checked";
		}else{
		    // nope, isn't checked
			$favourite_checked = "";
		}

		// include the output file
        include(LOG_FAVOURITES_PARTIALS . 'log-custom-favourites-admin-output.php');

	}

    /**
     * @param $post_id - The current post ID
     * @param $post - The post object
     * @return bool - On failure return false, success returns true
     */
    function log_favourites_save_post_metabox( $post_id, $post ){
        $result = false;

	  // get the post type
		$post_type = get_post_type_object( $post->post_type );
		
	  // check if the user can edit the post type
		  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
			return $result; //nope, he can't, return

	  // get the new meta value
        if( isset( $_POST['log-favourites-element'] ) && $_POST['log-favourites-element'] == "on" ){
            $new_meta_value = 1;
        }else{
            $new_meta_value = 0;
        }


	
	  // get the current meta value
	  $current_meta_value = get_post_meta( $post_id, LOG_FAVOURITES_METAKEY, true );

	  if ( $new_meta_value && '' == $current_meta_value ){
          // if there wasn't a previous meta value add a new
          $result = add_post_meta( $post_id, LOG_FAVOURITES_METAKEY, $new_meta_value, true );
      }elseif ( $new_meta_value && $new_meta_value != $current_meta_value ){
          // if the new post meta is different from the old update it
          $result = update_post_meta( $post_id, LOG_FAVOURITES_METAKEY, $new_meta_value );
      }elseif ( '' == $new_meta_value && $current_meta_value ){
          // if meta value is empty delete the registry
          $result = delete_post_meta( $post_id, LOG_FAVOURITES_METAKEY, $current_meta_value );
      }

      return $result;
	}
}

?>