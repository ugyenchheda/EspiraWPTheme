<?php

// Template Name: Kindergarten Api Import Template

?>

<?php get_header(); ?>

<div class="page-content">
    <p>
   <?php $response = wp_remote_get( ' https://api.pinmeto.com/v1/espira/locations?access_token=5885c491f509c162b919001fc2a0f2aa334f0e4e'); 
     $espira_data = (json_decode($response['body']));

     foreach ( $espira_data->data as $value) {
      $postId = compare_identifier($value->storeId);
      $hrs = '';
      if($value->openHours->mon->span[0]->open){
        $hrs =  'MANDAG - FREDAG KL. '.substr_replace($value->openHours->mon->span[0]->open, ':', 2, 0).' - '.  substr_replace($value->openHours->mon->span[0]->close, ':', 2, 0);
      }
       echo $postId.'<br>';
       $my_post = array(
        'ID'           =>  $postId,        
        'post_content' => $value->longDescription,
    );
 
    wp_update_post( $my_post );


       update_post_meta( $postId, 'phone', $value->contact->phone );   
       update_post_meta( $postId, 'email', $value->contact->email );   
       update_post_meta( $postId, 'facebook', $value->network->facebook->link );   
       update_post_meta( $postId, 'visit_address', $value->address->street );   
       update_post_meta( $postId, 'zip_code', $value->address->zip );     
       update_post_meta( $postId, 'visit_area_latitude', $value->location->lat );     
       update_post_meta( $postId, 'visit_area_longitude', $value->location->lon );     
       update_post_meta( $postId, 'postal_place', $value->address->city );     
       update_post_meta( $postId, 'opening_days', $hrs );     
      

     }

    function compare_identifier($spid){
      global $wpdb;
      $table_name = $wpdb->prefix . "postmeta";
      $sql = "SELECT * FROM $table_name WHERE `meta_key` = 'identifier' AND `meta_value` = $spid ";
      $result = $wpdb->get_row( $sql );
      return $result->post_id;
    }
   ?>
</div>

