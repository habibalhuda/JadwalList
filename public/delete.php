<?php 



$headers = [

    "User-Agent: ",
    "Authorization: token YOUR_ACCESS_TOKEN"
];

$ch = curl_init();
curl_setopt_array($ch,[
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_RETURNTRANSFER => true
]);





curl_setopt($ch, CURLOPT_URL, "https://q4optgct.directus.app/items/events/{$_POST['event_id']}");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

curl_close($ch);

$data = json_decode($response, true);

if ($status_code !== 204) {

echo "Unexpected status code: $status_code";
var_dump($data);
exit;
}else {

    header("location:admin.php");
}

?>