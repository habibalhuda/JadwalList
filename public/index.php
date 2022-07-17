<?php

require_once "get_request.php";
require_once "post_request.php";

if (isset($_POST['login'])) {
    $arr = array(
        "email" => $_POST['email'],
        "password" => $_POST['password']
    );

    $login = json_decode(post_request("https://account.lumintulogic.com/api/login.php", json_encode($arr)));
     //var_dump($login);
   

    $access_token = $login -> data -> accessToken;
    $expiry = $login -> data -> expiry;

    if ($login->{'success'}) {
        $userData = json_decode(http_request("https://account.lumintulogic.com/api/user.php", $access_token));
        session_start();
        $_SESSION['user_data'] = $userData;
        $_SESSION['expiry']=$expiry;
        $_SESSION['user_id'] = $userId;
        setcookie('X-LUMINTU-REFRESHTOKEN', $access_token, time() + (86400 * 30));

        
        // var_dump($_COOKIE['X-LUMINTU-REFRESHTOKEN']);
        // die;

        switch ($userData->{'user'}->{'role_id'}) {
            case 1:
                header("location: admin.php");
                // Admin
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
                break;
        }

        // var_dump($_SESSION['user_data']);
        // var_dump($_COOKIE['X-LUMINTU-REFRESHTOKEN']);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
    <form action="" method="POST">
        <label for="email">Email: </label>
        <input type="text" name="email" id="email">
        <br>
        <label for="password">Password: </label>
        <input type="text" name="password" id="password">
        <br>
        <button type="submit" id="login" name="login">Login</button>
    </form>

    <script>
        // $("#login").click(function(e) {
        //     e.preventDefault();

        //     let emailVal = $("#email").val();
        //     let passwordVal = $("#password").val();

        //     let data = {
        //         "email": emailVal,
        //         "password": passwordVal
        //     }

        //     $.ajax({
        //         url: "http://103.129.221.147/gradit/api/login.php",
        //         data: JSON.stringify(data),
        //         type: "post",
        //         success: function(data) {
        //             console.log(data);
        //         }
        //     })
        // })
    </script>

</body>

</html>