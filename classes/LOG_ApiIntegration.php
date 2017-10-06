<?php
/**
 * Class to create the integration mechanics with the rest api (GET AND UPDATE) as required.
 */
namespace log_custom_favourites;

class LOG_ApiIntegration{
    function __construct(){
        // integrate with the rest api
            add_action( 'rest_api_init', array( $this , 'log_favourite_add_highlight_field' ) );
    }

    /**
     * Add the field 'favourite' to the get request and make him able to be retrieve or updated with the custom callbacks
     */
    function log_favourite_add_highlight_field() {
        register_rest_field(
            'post',
            'favourite',
            array(
                'get_callback'  => array( $this , 'log_favourite_get_value' ), // the get callback
                'update_callback'   => array( $this , 'log_favourite_update_value' ), // the update callback
            )
        );
    }

    /**
     * Callback to get the value
     * @param $object - The post object
     * @param $field_name - The field name
     * @param $request - The request array
     * @return int 0|1- The value indicating if is favourite (1) or not (0)
     */
    function log_favourite_get_value( $object, $field_name, $request ){
        return (int)$favourite_value = get_post_meta( $object['id'] , LOG_FAVOURITES_METAKEY , true );
    }

    /**
     * Callback to update the value
     * @param $object - The post object
     * @param $field_name - The field name
     * @param $request - The request array
     * @return mixed - True on success, false on failure
     */
    function log_favourite_update_value( $value, $object, $field_name ){
        return update_post_meta( $object->ID, LOG_FAVOURITES_METAKEY, (int)$value);
    }
}

?>