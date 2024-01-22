<?php
session_start();

if(isset($_SESSION['adminLogin']) && isset($_SESSION['admin']))
{
unset($_SESSION['adminLogin']);
unset($_SESSION['admin']);
$_SESSION['msg']="Logged out successfully...";
}

header('Location: ..\index.php')
?>