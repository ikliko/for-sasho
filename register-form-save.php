<?php
if (isset($_POST) && count($_POST)) {
    $user = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $connection = mysqli_connect('localhost', 'root', "", 'loginapp');

    if ($connection) {
        echo "We are connected";
        echo "<br>";
    } else {
        die("Database connection failed");
        echo "<br>";
    }


    $query = "INSERT INTO users(username ,password) ";
    $query.="VALUES ('$user','$password')";

    $result = mysqli_query($connection, $query);
    if (!$result)
    {
        die("Query Failed".mysqli_error($connection));
    }

    echo 'User saved';

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