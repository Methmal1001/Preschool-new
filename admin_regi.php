<?php
include('dbconnect.php');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['admin_registration'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];

    // select query to check user exist
    $select_query = "SELECT * FROM admin_table WHERE admin_name='$username' or admin_email='$email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if ($rows_count > 0) {
        echo "<script>alert('Username and Email already exist')</script>";
    } elseif ($password != $confirm_password) {
        echo "<script>alert('Password does not match')</script>";
    } else {
        // Continue with your registration logic
        $insert_query = "INSERT INTO admin_table (admin_name, admin_email, admin_password)
         VALUES ('$username', '$email', '$hash_password')";
        $sql_execute = mysqli_query($con, $insert_query);

        if ($sql_execute) {
            echo "<script>alert('Data inserted successfully')</script>";
            echo "<script>window.open('../index.html','_self')</script>";
        } else {
            die("Error: " . mysqli_error($con));
        }
    }
}
?>
