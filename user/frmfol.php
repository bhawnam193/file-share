<?php 
session_start();
include_once'../buslogic.php';
if(isset($_POST["btnsub"]))
{
        $obj=new clsfol();
    $obj->folnam=$_POST["txtfolname"];
    $obj->folcrtdat=date('y-m-d');
    $obj->folregcod=$_SESSION["cod"];
    $obj->save_rec();
}
if(isset($_REQUEST["fcod"]))
{
    $obj=new clsfol();
    $obj->folcod=$_REQUEST["fcod"];
    $obj->delete_rec();
}

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Share</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form name="f1" action="frmfol.php" method="POST">
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
<!--      <li><a href="">Home</a></li>
      <li><a href="../login.php">Login</a></li>
      <li><a href="../reg1.php">Register</a></li>
      <li><a href="#">Category</a></li>
      <li class="li1"><a href="#"></a></li>-->
    </ul>
  </div>
</div>
        <div id="main_body">
  <div id="body">
 <br class="balnk" />
  </div>
</div>
  </div>
</div>


   
            <h3>My Folder</h3>
            <table>
                <tr>
                    <th>
                        Create New Folder
                    </th>
                </tr>
                <tr>
                    <td>Folder Name</td>
                    <td>
                    <input type="text" name="txtfolname"/>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="submit" name="btnsub"/></td>
                    <td><input type="Reset" value="Cancel" name="btncan"/></td>
                </tr>
            </table width 100%>
            <tr>
                <th>Folder Name</th>
                <th>Document Contained</th>
            </tr><br>
            <?php 
            $obj=new clsfol();
            $arr=$obj->disp_rec($_SESSION["cod"]);
                    for($i=0;$i<count($arr);$i++)
                    {
                        echo "<tr><td>".$arr[$i][1]."</td><br/>";
                        echo"<td width 150px>";
                        echo "<td><a href=frmfol.php?fcod=".$arr[$i][0].">Remove Folder</a><br>";
                          echo $obj->dspdoccnt($arr[$i][0]);
                            echo "</td></tr>";
                          
                    }
                    ?>
                    <div id="main_footer">
  <div id="footer">
    <ul>
      <li><a href="frmdoc.php">My Document</a>|</li>
      <li><a href="frmgrp.php">Groups</a>|</li>
      <li><a href="frmpur.php">Purchase</a>|</li>
      <li><a href="frmshrdoc.php">Shared Documents</a>|</li>
     
    </ul>
   
                    
          
        </form>
    </body>
</html>
