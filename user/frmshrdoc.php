    <?php
session_start();
include_once '../buslogic.php';
 if(isset($_REQUEST["dcod"]))
 {
 $_SESSION["dcod"]=$_REQUEST["dcod"];
 }
if(isset($_REQUEST["scod"]))
{
    $obj=new clsshr();
    $obj->shrcod=$_REQUEST["scod"];
    $obj->delete_rec();
}
if(isset($_REQUEST["rcod"]))
{
    $obj=new clsshr();
    $obj->shrdat=  date('y-m-d');
    $obj->shrfilcod=$_SESSION["dcod"];
    $obj->shrreggrpcod=$_REQUEST["rcod"];
    $obj->shrtyp='U';
    $obj->save_rec();
}
if(isset($_REQUEST["gcod"]))
{
    $obj=new clsshr();
    $obj->shrdat=  date('y-m-d');
    $obj->shrfilcod=$_SESSION["dcod"];
    $obj->shrreggrpcod=$_REQUEST["gcod"];
    $obj->shrtyp='G';
    $obj->save_rec();
}
?>
    
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Share</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form name="frmshrdoc" action="frmshrdoc.php" method="POST">
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
            <h1 class="heading">Share Document
                <?php
               $obj=new clsfil();
               $obj->filcod=$_SESSION["dcod"];
               $obj->find_rec($obj->filcod);
               echo $obj->filnam;
                ?>
        </h1>
            <table>
                <tr>
                    <td>
                        Share With
                    </td>
                    <td>
                        <select name="drpshr">
                            <?php 
                            if(isset($_REQUEST["rcod"]))
                                echo "<option value=U selected/>User";
                            else
                                echo "<option value=U />User";
                            if(isset($_REQUEST["gcod"]))
                                echo "<option value=G selected/>Group";
                            else 
                                echo "<option value=G />Group";
                            ?>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Enter Information</td>
               <td> <input type="text" name="txtinfo"/>
                <input type="submit" name="btnsub" value="submit"/>
               </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php
                        if(isset($_POST["btnsub"]))
                        {
                            if($_POST["drpshr"]=='U')
                            {
                                $obj=new clsreg();
                                $arr=$obj->srcshrusr($_SESSION["dcod"],$_SESSION["cod"],$_POST["txtinfo"]."%");
                                if(count($arr)>0)
                                {
                                    echo "<table>";
                                     echo "<tr><th>User Name</th><th>Email</th></tr>";
                                   
                                }
                                for($i=0;$i<count($arr);$i++)
                                {
                                    echo "<tr><td>".$arr[$i][1]."</td>";
                                    echo "<td>".$arr[$i][2]."</td>";
                                    echo "<td><a href=frmshrdoc.php?rcod=".$arr[$i][0].">Share Document</a></td>";
                                }
                                echo "</table>";
                            }
                            else
                            {
                              if($_POST["drpshr"]=='G')
                              {
                                  $obj=new clsreg();
                               $arr=$obj->srcshrgrp($_SESSION["dcod"],$_SESSION["cod"],$_POST["txtinfo"]."%");
                               if(count($arr)>0)
                                {
                                    echo "<table><tr><th>Group Name</th><th>Created Date</th></tr>";
                                  
                                }
                                for($i=0;$i<count($arr);$i++)
                                {
                                    echo "<tr><td>".$arr[$i][1]."</td>";
                                    echo "<td>".$arr[$i][2]."</td>";
                                    echo "<td><a href=frmshrdoc.php?gcod=".$arr[$i][0].">Share Document</a></td>";
                                }
                                echo "</table>";
                              }
                            }
                        }
                        ?>
                    </td>
                </tr>
            </table>
            <hr></hr>
           
            <?php 
            $obj=new clsshr();
            $arr=$obj->disp_rec($_SESSION["dcod"]);
            if(count($arr)>0)
            {
                echo "<table><tr><th>Shared With</th><th>Shared Date</th></tr>";
            }
            for($i=0;$i<count($arr);$i++)
            {
                echo "<tr><td>".$arr[$i][2]."</td>";
                echo "<td>".$arr[$i][1]."</td>";
                echo "<td><a href=frmshrdoc.php?scod=".$arr[$i][0].">Remove Sharing</a></td></tr>";
            }
            echo "</table>";
            ?>
        </form>
    </body>
</html>
