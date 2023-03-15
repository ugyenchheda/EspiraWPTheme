<?php /* Template Name: import employee images from ftp */ ?>

<?php 
get_header();
?>
<h1>Import employees image from sftp</h1>
<?php
global $wpdb;


$clear_all_image=false;


if($clear_all_image){

  $kindergardens = get_posts(array(
    'post_type'   => 'kindergarden',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'fields' => 'ids'
    )
  );

  foreach ($kindergardens as $kindergarden){
      $personells = get_post_meta($kindergarden, 'personell', true);
      $a=array();
      $i=0;

      foreach($personells as $personell){
        $a[$i]=$personell;
        if($a[$i]['person_image_id']){
          // print_r($personell['person_image_id']);
          wp_delete_attachment( $personell['person_image_id'], true );
          unset($a[$i]['person_image_id']);
          unset($a[$i]['person_image']);
          // echo $a[$i]['person_image_id'];
          //  wp_delete_attachment( $a[$i]['person_image_id'], true );
          
          // update_post_meta($kindergarden,'personell',$a);
          echo "<br/>---------------------<br/>";
          $i++;
        }
        // print_r($a);
        // echo "<br/>---------------------<br/>";
        update_post_meta($kindergarden,'personell',$a);
      }
      // update_post_meta($kindergarden,'personell',$a);
  }

}else{

  set_include_path(get_template_directory().'/library/sftp/phpseclib/');

  require_once('Net/SFTP.php');
  require_once('Crypt/RSA.php');


  $sftp = new Net_SFTP(FTP_HOST);
  if (!$sftp->login(FTP_USER, FTP_PASS)) {
      exit('Login Failed');
  }


  if (!($files = $sftp->nlist('upload/', true)))
  {
      die("Cannot read directory contents");
  }

  $humanids=array();
  foreach ($files as $file){
      if($file!='.' && $file !='..')
      $humanids[]= preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);

  }

  $kindergardens = get_posts(array(
    'post_type'   => 'kindergarden',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'fields' => 'ids'
    )
  );
  $directory_temp=get_template_directory().'/tempfiles/';

  foreach ($kindergardens as $kindergarden){
    $personells = get_post_meta($kindergarden, 'personell', true);
    $a=array();
    $i=0;
    $update=false;

      foreach($personells as $personell){
          
          $a[$i]=$personell;
          $attachment_id='';
          $attachment_url='';
         
        if(in_array($personell['humanid'],$humanids)){
          //update image 
          // print_r($personell);
          $update=true;
          
          $humanid=$personell['humanid'];
          if(in_array($humanid.'.jpg',$files))
                    $filename=$humanid.'.jpg';
          if(in_array($humanid.'.JPG',$files))
              $filename=$humanid.'.JPG';
                  
          $fileTo = $directory_temp . $filename;
          $sftp->get('/upload/'.$filename, $fileTo);
          $sftp->delete('/upload/'.$filename);
          $attachment_id=espira_attach_image_to_library($fileTo);
          $attachment_url=wp_get_attachment_image_src($attachment_id,'full')[0];
          // echo "Attachment_id:".$attachment_id;
          unlink($fileTo);
         
        }
        $a[$i]=array(
          'name'=>$personell['name'],
          'title'=>$personell['title'],
          'personel_email'=>$personell['personel_email'],
          'role'=>$personell['role'],
          'humanid'=>$personell['humanid'],
          'person_image_id'=>$attachment_id,
          'person_image'=>$attachment_url
        );
        $i++;
        
      }
      if($update){
        print_r($a);
        update_post_meta($kindergarden,'personell',$a);
        $update=false;
      }
     
    
    }
}



function espira_attach_image_to_library($file){
    $filename = basename($file);

    $upload_file = wp_upload_bits($filename, null, file_get_contents($file));
    if (!$upload_file['error']) {
        $wp_filetype = wp_check_filetype($filename, null );
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
            'post_content' => '',
            'post_status' => 'inherit'
        );
        $attachment_id = wp_insert_attachment( $attachment, $upload_file['file'] );
        // print_r($attachment_id);exit;
        if (!is_wp_error($attachment_id)) {
            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            $attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
            wp_update_attachment_metadata( $attachment_id,  $attachment_data );
            // print_r($attachment_data);exit;
        }
        return $attachment_id;
    }
}



?>

