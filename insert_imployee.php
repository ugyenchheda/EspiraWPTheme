<?php /* Template Name: Insert Employee*/ ?>

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
    $department = get_post_meta($kindergarden, 'role', true);      
      if($department) {
        $a=array();
         foreach ($department as $dep) {

          $depid =  $dep['avdeling_id'];
          $depname=$dep['role_title'];

          // print_r($dep);
        

            $sql= "SELECT *  FROM kindergarden_employee WHERE Departmentid = '".$depid."'";
        // echo $sql;
        $results = $wpdb->get_results($sql);
        if($results){
          
           // $sql= "SELECT *  FROM kindergarden_department WHERE mother = '".$results->ID."'";
          // $res = $wpdb->get_results($sql);
          //echo "<pre>";
          // print_r($res);
         

          foreach($results as $r){
            $inarr = array();
            // if($r->Title =='Styrer'){
            //   echo $r->Title;
            //     echo "<br />"; 
            //         }
              if($r->Title!='Sluttet' && $r->Title!='Variabel l&oslash;nn' && stripos($r->Title,"Ringevikar")===false){
                $inarr['name']=$r->Firstname.' '.$r->Lastname;
                  $inarr['title']=$r->Title;
                  $inarr['personel_email']=$r->Email;
                  $inarr['humanid']=$r->humanid;
                  $inarr['role']=$depname;  
                              
                    if($r->Title =='Styrer'){
                      $inarr['employee_rolle']=$r->Title;
                    }               
              
              } else {
                echo $r->Title;
                echo "<br />";                            

              }
                      
              $a[]=$inarr; 
              
            
            print_r($a);
            echo $kindergarden;
              
            }
            
          }
         
       
        }
        //update_post_meta($kindergarden,'personell',$a);
      }
       




    
 }

?>

