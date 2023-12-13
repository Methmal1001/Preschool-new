<?php
include('dbconnect.php');

if (isset($_GET['delete_user'])) {
    $delete_user = $_GET['delete_user'];

    $delete_query = "DELETE FROM started WHERE st_id = $delete_user";
    $result = mysqli_query($con, $delete_query);

    if ($result) {
        echo "<script>alert('User has been deleted successfully');</script>";
        echo "<script>window.open('index.php?feedback','_self')</script>";
    } else {
        echo "<script>alert('Error deleting user');</script>";
    }
}
?>
