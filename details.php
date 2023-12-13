<?php
include "dbconnect.php";

if (isset($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $town = $_POST["town"];
    $msg = $_POST["msg"];

    // Use prepared statements to prevent SQL injection
    $query = "INSERT INTO details_table (name, email, town, msg, date) VALUES (?, ?, ?, ?, NOW())";

    $stmt = mysqli_prepare($con, $query);

    if (!$stmt) {
        die('Error in preparing the statement: ' . mysqli_error($con));
    }

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $town, $msg);

    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die('Error in executing the statement: ' . mysqli_error($con));
    }

    mysqli_stmt_close($stmt);

    echo "<script>alert('Thank you for your feedback.')</script>";
    echo "<script>window.open('../index.html','_self')</script>";
}
?>
