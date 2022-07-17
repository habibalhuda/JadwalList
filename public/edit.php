<?php


if(isset($_POST['event_id'])) {

    $event_name= $_POST ['event_name'];
    $event_end_time= $_POST ['event_end_time'];
    $event_type_name= $_POST ['event_type_name'];
    $event_start_time= $_POST ['event_start_time'];
    $event_description= $_POST ['event_description'];
    $event_id= $_POST ['event_id'];




    header("location:admin.php");
}



$curlData = [
    'event_name'=>$event_name,
    'event_type_name' => $event_type_name,
     'event_end_time'=>$event_end_time,
     'event_start_time'=>$event_start_time,
    'event_description'=>$event_description,
 
];

$api_schedule = "https://q4optgct.directus.app/items/events/" . $_POST['event_id'];
$payload = json_encode($curlData);
$ch = curl_init($api_schedule);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLINFO_HEADER_OUT, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, [
//     'Content-Type: application/json',
//     'Accept: application/json'
// ]);
//curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set HTTP Header for POST request
curl_setopt(
    $ch, CURLOPT_HTTPHEADER, array(
        'Content-type: application/json',
        'Content-Length: ' .strlen($payload)
    )
    );

    $result = curl_exec($ch);
    $res = json_decode($result);


    // if(isset($res)) {
    //     header("location :admin.php");
    // }
    var_dump($res);

    curl_close($ch);


    ?>



