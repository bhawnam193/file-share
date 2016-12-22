<?php
session_start();
include_once '../buslogic.php';
if (isset($_REQUEST["gcod"])) 
    {
    $_SESSION["gcod"]=$_REQUEST["gcod"];
}
if(isset($_REQUEST["rcod"]))
{
    $obj=new clsgrpmem();
    $obj->grpmemgrpcod=$_SESSION["gcod"];
    $obj->grpmemregcod=$_REQUEST["rcod"];
    $obj->save_rec();
}
 
?>
<html>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Share</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form name="frmgrpmem" action="frmgrpmem.php" method="POST">
<div id="main_header">
  <div id="header">
    <ul>
      <li><a href="http://www.free-css.com/" class="home">home</a></li>
      <li><a href="http://www.free-css.com/" class="user" title="user">user</a></li>
      <li><a href="http://www.free-css.com/" class="contact">contact</a></li>
    </ul>
<!--    <ul class="free">
      <li><a class="call">800-121-4545 759-121-5454</a></li>
    </ul>-->
    <img src="../images/logo.gif" alt="appleweb" width="205" height="65" title="appleweb" />
    <ul class="navi">
 <li><a href="frmgrp.php">Groups</a></li>
<!--      <li><a href="login.php">Login</a></li>
      <li><a href="reg1.php">Register</a></li>-->
<!--      <li><a href="frmcat.php">Category</a></li>
      <li class="li1"><a href="#">Testimonials</a></li>-->
    </ul>
  </div>
</div>
        <div id="main_body">
  <div id="body">
 <br class="balnk" />
  </div>
</div>
    <form name="frmgrpmem" action="frmgrpmem.php" method="post">
        <h1 class="heading">Groups</h1>
        <table>
            <tr>
                <th>Search Users</th>
            </tr>
            <tr>
                <td>User Email</td>
                <td><input type="text" name="txteml"/></td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </tr>
            <tr><td></td></tr>
            <td><input type="Submit" name="btnsub" value="submit"/></td>
            <td><input type="Reset" name="btncan" value="Cancel"/></td>
        </table>   
        <?php 
       if(isset($_POST["btnsub"]))
       {
           $obj=new clsreg();
           $arr=$obj->srcuser($_SESSION["cod"],$_POST["txteml"]."%",$_SESSION["cod"]);
           echo "<table>";
              echo "<tr><th>Name</th><th>Email</th></tr>";
           for($i=0;$i<count($arr);$i++)
           {
               echo "<tr><td>".$arr[$i][1]."</td><td>".$arr[$i][2]."</td>";
              
               echo "<td><a href=frmgrpmem.php?rcod=".$arr[$i][0].">Join</a></td></tr>";
           }
           echo "</table>";
       }
        ?>
    </form>
</body>
</html>