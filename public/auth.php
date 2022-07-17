<?php
function validate_input()
{
    return isset($_GET["token"]) && $_GET["token"] && isset($_GET["expiry"]) && $_GET["expiry"];
}

if (!validate_input()) {
    echo "
    <script>
        alert('Parameter tidak valid');
        location.replace('index.php');
    </script>";
    die;
}

$token = $_GET["token"];
$expiry = $_GET["expiry"];

function http_request($url, $token)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    $auth = "Authorization: Bearer " . $token;

    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $auth));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $out = curl_exec($ch);

    curl_close($ch);

    return $out;
}

$userData = json_decode(http_request("https://account.lumintulogic.com/api/user.php", $token));

if (!$userData) {
    echo "
    <script>
        alert('Gagal mendapatkan data user');
        location.replace('index.php');
    </script>";
    die;
}

session_start();
$_SESSION['user_data'] = $userData;
$_SESSION['expiry'] = $expiry;
setcookie('X-LUMINTU-REFRESHTOKEN', $token, strtotime($expiry));

if (!isset($_SESSION['user_data'])) {
    echo "
    <script>
        alert('Gagal set Session');
        location.replace('index.php');
    </script>";
    die;
}

// if (!isset($_COOKIE['X-LUMINTU-REFRESHTOKEN'])) {
//     echo "
//     <script>
//         alert('Gagal set Cookie');
//         location.replace('index.php');
//     </script>";
//     die;
// }

switch ($_SESSION["user_data"]->{'user'}->{'role_id'}) {
    case 1:
        // Admin
        header("location: admin.php");
        break;
    case 2:
        // Mentor
        header("location: mentor.php");
        break;
    case 3:
        // Student
        header("location: student.php");
        break;
    default:
        header("location: index.php");
        break;

        
}
