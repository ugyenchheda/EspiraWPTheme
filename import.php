<?php /* Template Name: import csv */ ?>

<?php get_header();
?>

<div class="wrap">
	<div id="primary" class="content-area" style="
    padding: 257px;
">
		<main id="main" class="site-main" role="main">
			<h1>Import Espira From Here</h1>
<?php
	ini_set('memory_limit', -1);
	ini_set('max_execution_time',-1);
	// $allposts= get_posts( array('post_type'=>'kindergarden','numberposts'=>-1) );
	// foreach ($allposts as $eachpost) {
	// wp_delete_post( $eachpost->ID, true );
	// }
	if(isset($_POST['submitMember']))
	{
		if(isset($_FILES['csvfile']))
		{		

			$file = fopen($_FILES['csvfile']['tmp_name'],"r");
			$keys = fgetcsv($file,0,",","\"");
			// echo "<pre>";		
			// 	print_r($keys);
			// echo "</pre>";		

			// 	exit;
			$duplicate = 0;
			$rows= 0;
			$errors = 0;
			while(! feof($file))
			{

				
			

				$row = fgetcsv($file,0,",","\"");
				if($row)
				{

					$my_post = array(
						'post_title'    =>  iconv( "Windows-1252", "UTF-8", isset($row[0])?$row[0]:''),
						'post_content'  => ' ',
						'post_status'   => 'publish',
						'post_type' => 'kindergarden',
						'post_author'   => 1,
						
					  );
					   
					  // Insert the post into the database
					 $id = wp_insert_post( $my_post );

					update_post_meta($id, 'visit_address', iconv( "Windows-1252", "UTF-8", isset($row[1])?$row[1]:''));					
					$zip_code_postal_place = iconv( "Windows-1252", "UTF-8", isset($row[2])?$row[2]:'');
					$code_postal  = explode(' ', $zip_code_postal_place, 2);				
					update_post_meta($id, 'zip_code', $code_postal[0]);
					update_post_meta($id, 'postal_place', $code_postal[1]);
					update_post_meta($id, 'phone', iconv( "Windows-1252", "UTF-8", isset($row[3])?$row[3]:''));		
					$personal = [];		
					$personal[] =  [
						"name" => iconv( "Windows-1252", "UTF-8", isset($row[5])?$row[5]:''),
						"title" => iconv( "Windows-1252", "UTF-8", isset($row[6])?$row[6]:''),
						"personel_telefon" => iconv( "Windows-1252", "UTF-8", isset($row[4])?$row[4]:''),
						"personel_email" => '' 
					];
					update_post_meta($id, 'personell', $personal);
				
					
				}

				
						
						
				

			}
		}
	}


?>

			<form action="" method="POST" enctype="multipart/form-data">
				<input type="file" name="csvfile" accept=".csv">
				<button type="submit" name="submitMember">Import members</button>

			</form>





		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
