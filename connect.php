<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_fshop";
$conn = mysqli_connect($host, $username, $password, $database);
if (!isset($conn)) {
    echo "Loi ket noi";
}
