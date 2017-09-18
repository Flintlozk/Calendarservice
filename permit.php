<?
ob_start();
session_start();
if ($_SESSION["textuser"] == "1") {  
echo "you are logged in";
}
else if ($_SESSION["textuser"] == "") 
{
header ("Location: login.php");
}

include_once('header.php');
require("connect.php");
?>

<body>
<form id="form1" name="form1" method="post" action="givepermit.php">
<!--------------------------------- Main Menu ----------------------------------------------->
	<?php include 'mainmenu.php';?>
<!--------------------------------- Main Menu ----------------------------------------------->
<div class="contrainer">  
	
   <? if($_SESSION["status"] != "admin"){ ?>
	  <table class="loginform" align="center">
      <tr>
        <td>You are not Admin</td>
        </tr>
      </table>
        <?
   }else { ?>
    <table class="loginform" width="30%" align="center" >
      <tr>
        <td colspan="2"><div align="center"><p><b>Permission</b></p></div></td>
      </tr>
      <tr>
        <td >ชื่อผู้ใช้งาน</td>
        <td>   
        <select class="loginbutton"  name="get_name" required>
        	<option value="">เลือกชื่อผู้ใช้งาน</option>
    	<?
			$sql_show = "select user from admin ";
			$result_show = mysql_query($sql_show) or die(mysql_error());

			while($row_show = mysql_fetch_array($result_show)){?>
			 <option value="<? echo $row_show["0"];?>">
			 	<? echo $row_show["0"];?>
             </option>
        <? } ?>
    	</select>
        </td>
      </tr>
      <tr>
      	<td>สิทธิ์</td>
      	<td>
        	<select class="loginbutton" name="permit" required>
            	<option value="">เลือกสิทธิ์การเข้าใช้งาน</option>
            	<option value="admin">admin</option>
                <option value="user">user</option>
            </select>
        </td>
      </tr>
        <td colspan="2">
        	<div align="center">
            	<input class="btn btn-default" type="submit" name="button" id="button" onClick="return confirm('ยืนยันการแก้ไข')" value="ยืนยัน" />
                <input class="btn btn-default" type="button" name="button" id="button"  onclick="window.location.href='index.php'" value="กลับ" />
            </div>
         </td>
      </tr>
    </table>
    <? }?>
</body>
</html>