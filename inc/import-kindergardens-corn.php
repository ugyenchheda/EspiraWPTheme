<?php

    if(!function_exists('kindergarden_acceptSymbols')){
        function kindergarden_acceptSymbols($string){
            $string=mb_convert_encoding($string,"HTML-ENTITIES","UTF-8");
        //  $string =utf8_encode($string);
        // $string = iconv('iso-8859-15', 'utf-8', $string);
            return $string;
        }
    }
    if(!function_exists('kindergarden_importKindergardens')){
        function kindergarden_importKindergardens(){
            // URL to fetch
            $url = "https://dataporten-api.vigilo.no:4004/api/381757af-3a8c-4ace-8f0f-bd9bc29b5484/ims/oneroster/v1p1/orgs";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FAILONERROR, true);
            curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

            $headers = [
                'Content-Type:application/json',
                '381757af-3a8c-4ace-8f0f-bd9bc29b5484:qpig7ycknqa8o3489d7nvaiuso834hk842',
                'Accept:*/*',
                'Accept-Encoding:gzip, deflate',
                'Access-Control-Allow-Headers:Origin, Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers',
            ];

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $server_output = curl_exec($ch);
        
            curl_close ($ch);
            $orgs=(json_decode($server_output));

            

            foreach($orgs as $org){
                for($i=0;$i<count($org);$i++){
                    // echo ($org[$i]->identifier);
                    $args = array(
                        'post_type' => 'kindergarden',
                        'meta_query' => array(
                            array(
                                'key' => 'identifier',
                                'value' => $org[$i]->identifier,
                            )
                        )
                    );
                    $kindergardens =  get_posts( $args ); 
                    //  print_r($kindergardens[0]->ID);exit;
                    // echo $kindergardens[0]->ID;exit;
                    
                    
                    
                    if(count($kindergardens)){

                        //todo: Update Kindergarden
                        $my_post = array(
                            'ID'=>$kindergardens[0]->ID,
                            'post_title'    =>  kindergarden_acceptSymbols(($org[$i]->name)??''),
                        );
                        // print_r($my_post);
                        $id = wp_update_post( $my_post );
                        //todo: Insert Meta
                        update_post_meta($id, 'identifier', kindergarden_acceptSymbols($org[$i]->identifier));
                        update_post_meta($id, 'city', kindergarden_acceptSymbols( ($org[$i]->metadata->city)??''));	
                        update_post_meta($id, 'id', kindergarden_acceptSymbols(($org[$i]->metadata->vigoId)??''));	
                        update_post_meta($id, 'zip_code', kindergarden_acceptSymbols( $org[$i]->metadata->postalCode));	
                        
                        $visit_area['latitude']=$org[$i]->metadata->latitude;
                        $visit_area['longitude']=$org[$i]->metadata->longitude;
                        update_post_meta($id, 'visit_area',  $visit_area);

                        // update_post_meta($id, 'visit_address', iconv( "Windows-1252", "UTF-8", ($org[$i]->metadata->addressline1)??''));
                        update_post_meta($id, 'phone', kindergarden_acceptSymbols(  ($org[$i]->metadata->phoneNumber)??''));
                        update_post_meta($id, 'email', kindergarden_acceptSymbols(  ($org[$i]->metadata->email)??''));
                        // update_post_meta($id, 'kids_number', iconv( "Windows-1252", "UTF-8", ($org[$i]->metadata->children)??''));
                        
                        
                        
                        $personal = [];		
                        $managername=kindergarden_acceptSymbols( $org[$i]->metadata->managerFirstName??'');
                        $managername.=" ".kindergarden_acceptSymbols( $org[$i]->metadata->managerLastName??'');
                        // echo $org[$i]->metadata->managerLastName;
                        // echo $managername;
                            $personal[0]["name" ]= $managername;
                            $personal[0]["title" ]= "Styrer";
                            // print_r($personal);
                            update_post_meta($id, 'personell', $personal);
                    }else{
                        //todo: Insert Kindergarden
                        $my_post = array(
                            'post_title'    =>  iconv( "Windows-1252", "UTF-8", ($org[$i]->name)??''),
                            'post_content'  => ' ',
                            'post_status'   => 'publish',
                            'post_type' => 'kindergarden',
                            'post_author'   => 1,
                            
                        );
                        // print_r($my_post);
                        $id = wp_insert_post( $my_post );
                        //todo: Insert Meta
                        update_post_meta($id, 'identifier', kindergarden_acceptSymbols($org[$i]->identifier));
                        update_post_meta($id, 'city', kindergarden_acceptSymbols( ($org[$i]->metadata->city)??''));	
                        update_post_meta($id, 'id', kindergarden_acceptSymbols(($org[$i]->metadata->vigoId)??''));	
                        update_post_meta($id, 'zip_code', kindergarden_acceptSymbols( $org[$i]->metadata->postalCode));	
                        
                        $visit_area['latitude']=$org[$i]->metadata->latitude;
                        $visit_area['longitude']=$org[$i]->metadata->longitude;
                        update_post_meta($id, 'visit_area',  $visit_area);

                        // update_post_meta($id, 'visit_address', iconv( "Windows-1252", "UTF-8", ($org[$i]->metadata->addressline1)??''));
                        update_post_meta($id, 'phone', kindergarden_acceptSymbols(  ($org[$i]->metadata->phoneNumber)??''));
                        update_post_meta($id, 'email', kindergarden_acceptSymbols(  ($org[$i]->metadata->email)??''));
                        // update_post_meta($id, 'kids_number', iconv( "Windows-1252", "UTF-8", ($org[$i]->metadata->children)??''));
                        
                        
                        
                        $personal = [];		
                        $managername=kindergarden_acceptSymbols( $org[$i]->metadata->managerFirstName??'');
                        $managername.=" ".kindergarden_acceptSymbols( $org[$i]->metadata->managerLastName??'');
                        // echo $org[$i]->metadata->managerLastName;
                        // echo $managername;
                            $personal[0]["name" ]= $managername;
                            $personal[0]["title" ]= "Styrer";
                            // print_r($personal);
                            update_post_meta($id, 'personell', $personal);
                        
                        
                    }
                    // echo "<br/>";
                    // echo "----------------------------------------------------<br/>";
                }

                // echo "-<br/>-";
            }// foreach end of orgs
            // wp_mail( 'kuber.karki@globdig.com', 'Corn: Automatic email', 'Corn called .Automatic scheduled email from WordPress.');

        }
    }

    // if ( ! wp_next_scheduled( 'kindergarden_import_from_api_hook' ) ) {
    //     wp_schedule_event( time(), 'hourly', 'kindergarden_import_from_api_hook' );
    //   }
      
    //   add_action( 'kindergarden_import_from_api_hook', 'kindergarden_importKindergardens' );
    
?>