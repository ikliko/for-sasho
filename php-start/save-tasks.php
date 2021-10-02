<?php
/**
 * Created by PhpStorm.
 * User: kliko
 * Date: 10/2/2021
 * Time: 12:59 PM
 */

$connection = mysqli_connect('localhost', 'root', "", 'loginapp');

if ($connection) {
    echo "We are connected";
    echo "<br>";
} else {
    die("Database connection failed");
    echo "<br>";
}

