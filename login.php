<?php
session_start();
include_once 'buslogic.php';
if(isset($_POST["btnsub"]))
{
    $obj=new clsreg();
    $r=$obj->logincheck($_POST["txteml"],$_POST["txtpwd"]);
    if($r==-1)
       $msg="email password incorrect";
    
        else
        
    {
        $_SESSION["cod"]=$r;
        header("location:user/frmdoc.php");
    }
}
?>
<html>
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>file share</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form name="f1" action="login.php" method="POST">
<div id="main_header">
  <div id="header">
    <ul>
      <li><a href="http://www.free-css.com/" class="home">home</a></li>
      <li><a href="http://www.free-css.com/" class="user" title="user">user</a></li>
      <li><a href="http://www.free-css.com/" class="contact">contact</a></li>
    </ul>
    <ul class="free">
      <li><a class="call">800-121-4545 759-121-5454</a></li>
    </ul>
    <img src="images/logo.gif" alt="appleweb" width="205" height="65" title="appleweb" />
    <ul class="navi">
      <li><a href="#">Category</a></li>
      <li><a href="#">Submission</a></li>
      <li><a href="#">Archives</a></li>
      <li><a href="#">Finance</a></li>
      <li class="li1"><a href="#">Testimonials</a></li>
    </ul>
  </div>
</div>
        <div id="main_body">
  <div id="body">
 
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form name="login" action="login.php" method="POST">
            <div align="center">
            <a href="frmreg.php" class="login_btn">Register</a>
            </div>
            <h3>login</h3>
            
              <table>
<!--                  <tr>
                      <td>Name</td>
                      <td>
                          <input type="text" name="txtname" />
                      </td>
                  </tr>-->
        <tr>
            <td>Email</td>
            <td>
                <input type="text" name="txteml"/>
            </td>
        </tr>
        <tr>
            <td>password</td>
            <td>
                <input type="password" name="txtpwd"/>
            </td>
        </tr>
<!--        <tr>
            <td>confirm password</td>
            <td>
                <input type="password" name="txtconpwd" />
            </td>
        </tr>-->
        <tr>
            <td></td>
            <td>
                <input type="submit" name="btnsub" value="login"/>
<!--                <input type="reset" name="btncan" value="cancel" />-->
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?php
                if(isset($msg))
                    echo $msg;
                ?>
            </td>
        </tr>
          </table> 
            <div>
       </form>
    </body>
</html>

