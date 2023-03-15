<?php /* Template Name: Insert Departments*/ ?>

<?php get_header();

?>

<div class="wrap container">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <h1>Import Companies From Here</h1>

<?php
$kindergardens = get_posts(array(
    'post_type'   => 'kindergarden',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'fields' => 'ids'
    )
);
global $wpdb;
 foreach ($kindergardens as $kindergarden){
  $humanId = get_post_meta($kindergarden, '4Human', true);


    $sql= "SELECT *  FROM kindergarden_department WHERE extID = '".$humanId."'";
    $results = $wpdb->get_row($sql);
    if($results->ID){
       $sql= "SELECT *  FROM kindergarden_department WHERE mother = '".$results->ID."'";
      $res = $wpdb->get_results($sql);
      //echo "<pre>";
      // print_r($res);
      $a=array();

      foreach($res as $r){
        if(stripos($r->Name,"Administrasjon")===false && stripos($r->Name,"Ringevikar")===false && stripos($r->Name,"Kj&oslash;kken")===false && stripos($r->Name,"Vaktmester")===false ){
        // if($r->Name!='Administrasjon' && $r->Name!='Ringevikar' && $r->Name!='Kj&oslash;kken' && $r->Name!='Vaktmester'){
          $a[]=array(
            'role_title'=>$r->Name,
            'avdeling_id'=>$r->ID,


          );
        }
        // print_r($a);
        // echo $kindergarden;
          // 
        }
        update_post_meta($kindergarden,'role',$a);
      }

    
 }

?>

