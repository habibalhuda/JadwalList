<?php

$start = $_GET['start'];
$end = $_GET['end'];

$data = file_get_contents("https://q4optgct.directus.app/items/events");
$data = json_decode($data);
$schedule = $data->data;

$scheduless = [];
foreach($schedule as $schedules){
    array_push($scheduless, (object)[  
        'title' => $schedules->event_name,
        'start' => date_format(date_create($schedules->event_start_time), 'Y-m-d H:i:s'),
        'end' => date_format(date_create($schedules->event_end_time), 'Y-m-d H:i:s'),
        'description' => $schedules->event_description,
        'icon' => $schedules->event_type_id == 1 ? 'far fa-regular fa-clipboard' : ($schedules->event_type_id == 2 ? 'far fa-regular fa-clock' : 'far fa-reguler fa-user'),
        'color' => $schedules->event_type_id == 1 ? '#1E90FF' : ($schedules->event_type_id == 2 ? '#FF0000' : '#2E8B57'), //class deadline consult


      
         
    ]);
}


echo json_encode($scheduless); //tampilkan data json

