<?php
include "dbconnect.php";

$name = $_POST['name'];

// Check if the user already exists
$checkSql = "SELECT * FROM `started` WHERE childname = ?";
$checkStmt = mysqli_prepare($con, $checkSql);
mysqli_stmt_bind_param($checkStmt, 's', $name);
mysqli_stmt_execute($checkStmt);
mysqli_stmt_store_result($checkStmt);

if (mysqli_stmt_num_rows($checkStmt) > 0) {
    // User already exists
    echo "<script>alert('User already exists. Please choose a different name.');</script>";
    echo "<script>window.open('../index.html#contact','_self')</script>";
} else {
    // User does not exist, proceed with the insertion
    $insertSql = "INSERT INTO `started` (childname, date) VALUES (?, NOW())";
    $insertStmt = mysqli_prepare($con, $insertSql);
    mysqli_stmt_bind_param($insertStmt, 's', $name);

    if (mysqli_stmt_execute($insertStmt)) {
        echo "<script>alert('Your record has been inserted successfully');</script>";
        echo "<script>window.open('../about.html','_self')</script>";
    } else {
        $error_message = "Error: " . mysqli_error($con);
        echo "<script>alert('" . htmlspecialchars($error_message, ENT_QUOTES) . "');</script>";
    }

    mysqli_stmt_close($insertStmt);
}

mysqli_stmt_close($checkStmt);
mysqli_close($con);
?>
