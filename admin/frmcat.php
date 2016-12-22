<?php
session_start();
include_once '../buslogic.php';
if(isset($_POST["btnsub"]))
{
    $obj=new clscat();
    $obj->catnam=$_POST["txtcat"];
    $obj->save_rec();
}
if(isset($_REQUEST["ccod"]) && isset($_REQUEST["mod"]))
{
    if($_REQUEST["mod"]=='D')
    {
        $obj=new clscat();
        $obj->catcod=$_REQUEST["ccod"];
        $obj->delete_rec();
    }
    if($_REQUEST["mod"]=='E')
    {
        $obj=new clscat();
        $obj->catcod=$_REQUEST["ccod"];
        $obj->find_rec($obj->catcod);
        $catnam=$obj->catnam;
        $_SESSION["ccod"]=$_REQUEST["ccod"];
    }
}
if(isset($_POST["btnupd"]))
{
    $obj=new clscat();
    $obj->catcod=$_SESSION["ccod"];
    $obj->catnam=$_POST["txtcat"];
    $obj->update_rec();
    unset($_SESSION["ccod"]);
}
?>
<html>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>file share</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form name="frmcat" action="frmcat.php" method="POST">
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
    <img src="../images/logo.gif" alt="appleweb" width="205" height="65" title="appleweb" />
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
    <table>
        <tr>
           <td width="100px">Category</td>
            <td>
                <input type="text" name="txtcat" value="<?php if(isset($catnam)) echo $catnam; ?>"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
          <?php
        if(isset($_SESSION["ccod"]))
        {      
        echo "<input type=submit name=btnupd value=update />";
        }     
         else 
         {
            echo "<input type=submit name=btnsub value= submit />";
         }
         ?>
            <input type="submit" name="btncan" value="cancel"/>
        </td>
        </tr>
        <br>
    </table>
      <hr></hr>
 <?php
$obj=new clscat();
$arr=$obj->disp_rec();
echo"<table>";
for($i=0;$i<count($arr);$i++)
{
    echo "<tr>";
    echo "<td width=200px >".$arr[$i][1]."</td>";
    echo "<td><a href=frmcat.php?ccod=".$arr[$i][0]."&mod=E >Edit</a>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<a href=frmcat.php?ccod=".$arr[$i][0]."&mod=D >Delete</a></td>";
    echo "</tr>";
}
echo"</table>";
?>
        </form>
        </body>
</html>
