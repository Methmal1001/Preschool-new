<?php
include('dbconnect.php');
@session_start();
?>

<?php
if(isset($_POST['admin_login'])){
    $username = $_POST['username'];
    
    // Use backticks around table and column names, not single quotes
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);

    if($row_count > 0){
        $row_data = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $username;
        
        if(password_verify($_POST['password'], $row_data['admin_password'])){
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            // Redirect or do other actions after successful login
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
            echo "<script>window.open('../admin/admin_login.html','_self')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
        echo "<script>window.open('../admin/admin_login.html','_self')</script>";
    }
}
?>
