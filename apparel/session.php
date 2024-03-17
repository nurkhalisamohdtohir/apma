<?php
   
   session_start();
   include('connect.php');
   $user_check = $_SESSION['login_user'];

   $connection = mysqli_connect("localhost", "root", "","apparel_db");
   $ses_sql = mysqli_query($connection,"select * from employee where Emp_ID = '$user_check'");
   $row = mysqli_fetch_assoc($ses_sql);
   
   $login_session = $row['Emp_ID'];
  
   if(!isset($login_session)){
      header('Location: index.php'); // Redirecting To Home Page
   }
?>