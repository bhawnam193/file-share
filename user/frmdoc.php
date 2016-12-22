<?php
session_start();
include_once '../buslogic.php';
if (isset($_REQUEST["dcod"]))
{
    $obj=new clsfil();
    $obj->filcod=$_REQUEST["dcod"];
    $obj->delete_rec();
}
if(isset($_POST["btnsub"]))
{
   
    $obj=new clsfil();
    $obj->filnam=$_POST["txtdoctit"];
    $obj->filupldat= date('y-m-d');
    $obj->filfolcod=$_POST["drpfol"];
   
if(isset($_POST["chk"]))
{
     $obj->filhidsts=$_POST["chk"];
    $obj->filhidsts='T';
}
 else
     {
 $obj->filhidsts='F';
     }
 $s=$_FILES["fileupl"]["name"];
 $s= substr($s,strpos($s,'.'));
 $obj->fildwnfil=$s;
 $a=$obj->save_rec();
 if($s!="")
     move_uploaded_file ($_FILES["fileupl"]["tmp_name"],"../files/".$_FILES["fileupl"]["name"]);

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

<div id="main_header">
  <div id="header">
    <ul>
      <li><a href="http://www.free-css.com/" class="home">home</a></li>
      <li><a href="http://www.free-css.com/" class="user" title="user">user</a></li>
      <li><a href="http://www.free-css.com/" class="contact">contact</a></li>
    </ul>
    <img src="../images/logo.gif" alt="appleweb" width="205" height="65" title="appleweb" />
    <ul class="navi">
      <li><a href="frmdoc.php">My Documents</a></li>
        <li><a href="frmdoc.php">Shared Documents</a></li>
        <li><a href="frmseldoc.php">Sell Documents</a></li>
        <li><a href="frmpurdoc.php">Purchase Documents</a></li>
        <li><a href="frmgrp.php">Groups</a></li>
    </ul>
  </div>
</div>
        <div id="main_body">
  <div id="body">
      <br class="blank" />
  </div>
        </div>
</div>
</div>
      <h1 class="heading">My Documents</h1>
        <form action="frmdoc.php" method="post" enctype="multipart/form-data">
           
            <table>
                <tr>
                    <th>Upload new document</th>
                </tr>
                <tr>
                    <td>Document Title</td>
                    <td><input type="text" name="txtdoctit"/></td>
                </tr>
                <tr>
                    <td>select folder</td>
                    <td><select name="drpfol">
                    <?php 
                   //$obj=new clscon();
                    $obj=new clsfol();
                    $arr=$obj->disp_rec($_SESSION["cod"]);
                            for($i=0;$i<count($arr);$i++)
                            {
                                echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
                            }
                    ?>
                    <td><a href="frmfol.php">Add New Folder</a></td>
                    </select>
                    </td>
                </tr>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                
                <tr>
                    <td>Browse Document</td>
                    <td><input type="file" name="fileupl"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="checkbox" value="T" name="chk[]"/>
                        Do you wish to make this document hidden?
                    </td>
                </tr>
                <tr>
                    <td>
                <input type="submit" name="btnsub" value="submit"/>
                    </td>
                    <td><input type="Reset" name="btncan" value="cancel"/></td>
                </tr>
            </table>
            <?php
            $obj=new clsfil();
            $arr=$obj->disp_rec($_SESSION["cod"]);
            if (count($arr)>0)
            {
        echo "<table>";
        echo "<tr>";
        echo "<th>Filename</th>";
        echo "<th>Uploaded Date</th>";
        echo "<th>Size</th>";
        echo "</tr>";
        }
       
            for($i=0;$i<count($arr);$i++)
            { 
                echo "<tr>";
               echo"<td>".$arr[$i][1]."</td>";
                echo"<td>".$arr[$i][2]."</td>";
               echo "<td><a href=frmshrdoc.php?dcod=".$arr[$i][0].">Share Document</a>";
               echo "&nbsp;&nbsp;&nbsp;<a href=frmdwn.php?dcod=".$arr[$i][0].">Download</a>";
               echo "&nbsp;&nbsp;&nbsp;<a href=frmdoc.php?dcod=".$arr[$i][0].">Delete Document</a></td>";
               echo"<td>"."</td>";
                echo "</tr>";
             }
            if (count($arr)>0)
            {
                echo "</table>";
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
