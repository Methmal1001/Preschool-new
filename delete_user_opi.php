<?php
include('dbconnect.php');

if (isset($_GET['delete_user_opi'])) {
    $delete_user_opi = $_GET['delete_user_opi'];

    $delete_query = "DELETE FROM details_table WHERE id = $delete_user_opi";
    $result = mysqli_query($con, $delete_query);

    if ($result) {
        echo "<script>alert('Feedback has been deleted successfully');</script>";
        echo "<script>window.open('index.php?user_opi','_self')</script>";
    } else {
        echo "<script>alert('Error deleting user');</script>";
    }
}
?>
