<?php
session_start();

if(!array_key_exists('tries', $_SESSION) || !array_key_exists('next_try', $_SESSION)) {
    $_SESSION["tries"] = 0;
    $new_time = date("Y-m-d H:i:s", strtotime('+1 minutes'));
    $_SESSION["next_try"] = $new_time;
}

$dateTimestamp1 = strtotime(date('Y-m-d H:i:s'));
$dateTimestamp2 = strtotime($_SESSION["next_try"]);

if($dateTimestamp1 > $dateTimestamp2) {
    $_SESSION["tries"] = 0;
    $new_time = date("Y-m-d H:i:s", strtotime('+1 minutes'));
    $_SESSION["next_try"] = $new_time;
}

if($_SESSION["tries"]++ > 3) {
    var_dump('TRY AGAIN LATER', $_SESSION["next_try"]);
    exit;
}

if(isset($_POST) && count($_POST)) {
    $user = $_POST['username'];
    $password = $_POST['password'];

    $connection = mysqli_connect('localhost', 'root', "", 'loginapp');

    if($connection) {
        echo "We are connected";
        echo "<br>";
    } else {
        die("Database connection failed");
        echo "<br>";
    }


    $query = "SELECT * FROM users WHERE username='$user'";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        die("USER DOES NOT EXIST " . mysqli_error($connection));
    }

    $userResult = $result->fetch_assoc();


    if(password_verify($password, $userResult['password'])) {
        $_SESSION['user'] = $user;
        echo 'USER LOGGED IN';
        return;
    }

    echo 'Wrong password';
    return;
//echo $query;
//if ($user&&$password)
//{
//    echo $user;
//    echo "<br>";
//    echo $password;
//}
//else  {
//    echo "Username  is  not  set";
//}
//echo $user;
//echo "<br>";
//echo $password;
}

echo 'nothing here';