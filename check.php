<?php
include 'config.php';

session_start();

if ( $_SERVER['SCRIPT_NAME'] != '/login.php' && $_SERVER['SCRIPT_NAME'] != '/login_ok.php' )
{
  if ( isset($_SESSION['login_user']) == false ) {
    header("login.php");
    exit;
  }else{
    $user_check=$_SESSION['login_user'];

    $sql = "
    SELECT userName
    FROM user
    WHERE userId='$user_check'
    ";

    $ses_sql=mysqli_query($link, $sql);

    $row=mysqli_fetch_array($ses_sql);

    $login_session=$row['userName'];

  }
}
?>
