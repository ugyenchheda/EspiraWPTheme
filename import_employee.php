<?php

// Template Name: Import employees

?>

<?php get_header(); ?>

<div class="page-content">

   <?php

    // $url = "https://espira.no.gipsonline.com/api/v1/employees/employees/?orgUnitIdExt=998_1";

    $ch = curl_init('https://espira.no.gipsonline.com/api/v1/employees/employees/?orgUnitIdExt=998_7');
    // curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $headers = [
        'ApiKey:5da576b3dbc544ab1e33eb3fb43e5da4',
        'Content-Type: application/json; charset=utf-8',   
    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);



    $server_output = curl_exec($ch);

    if(curl_exec($ch) === false)
    {
    echo 'Curl error: ' . curl_error($ch);
}

$result =json_decode($server_output);
// echo '<pre>';
// print_r($result);
// die('testing');

    global $wpdb;
    $query = "CREATE TABLE IF NOT EXISTS kindergarden_employee (humanid varchar(255), Firstname text, Lastname text, Email varchar(255), Departmentid int, Title varchar(255))";
    $wpdb->query($query);

    if ($result) {
        foreach ($result->data as $employee) {                               
            // print_r($employee);

            $data =	$wpdb->insert("kindergarden_employee",array( 
                'humanid'=>mb_convert_encoding(isset($employee->id)?$employee->id:'',"HTML-ENTITIES","UTF-8"),
                'Firstname'=>mb_convert_encoding(isset($employee->firstName)?$employee->firstName:'',"HTML-ENTITIES","UTF-8"),
                'Lastname'=>mb_convert_encoding(isset($employee->lastName)?$employee->lastName:'',"HTML-ENTITIES","UTF-8"),
                'Email'=>mb_convert_encoding(isset($employee->email)?$employee->email:'',"HTML-ENTITIES","UTF-8"),
                'Departmentid'=>mb_convert_encoding(isset($employee->homeOrgUnit->id)?$employee->homeOrgUnit->id:'',"HTML-ENTITIES","UTF-8"),
                'Title'=>mb_convert_encoding(isset($employee->workDescription->title)?$employee->workDescription->title:'',"HTML-ENTITIES","UTF-8"),
                                
                
        ));

        }
    }
   ?>
</div>



<?php get_footer(); ?>