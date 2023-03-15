<?php /* Template Name: Importing Departments */ ?>

<?php get_header();
?>

<?php get_header(); 
?>
<?php
global $wpdb;
$api_url = "https://espira.no.gipsonline.com/api/v1/departments/departments/";
  $response = wp_remote_get( $api_url ,
    array( 'timeout' => 10,
        'headers' => array( 'ApiKey' => '5da576b3dbc544ab1e33eb3fb43e5da4',          
        ) 
        ));
    $articles = json_decode($response['body']);  
    
// echo '<pre>'
//    print_r($articles);
// exit();
    if(isset($articles))
    {
      $query = "CREATE TABLE IF NOT EXISTS kindergarden_department (ID int, Name text, extID varchar(225), mother varchar(225))";
      $wpdb->query($query);
      foreach($articles->data as $article){
                $data =   $wpdb->insert("kindergarden_department",array(
                  'ID'=>mb_convert_encoding(isset($article->id)?$article->id:'',"HTML-ENTITIES","UTF-8"),
                  'Name'=>mb_convert_encoding(isset($article->title)?$article->title:'',"HTML-ENTITIES","UTF-8"),
                  'extID'=>mb_convert_encoding(isset($article->idExt)?$article->idExt:'',"HTML-ENTITIES","UTF-8"),
                  'mother'=>mb_convert_encoding(isset($article->parentOrgUnit->id)?$article->parentOrgUnit->id:'',"HTML-ENTITIES","UTF-8")                             
                              
                          ));
    }
  }
?>

