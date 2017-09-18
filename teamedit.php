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
<body >
	<? date_default_timezone_set("Asia/Bangkok"); ?>
    

<!--------------------------------- Main Menu ----------------------------------------------->
	<?php include 'mainmenu.php';?>
<!--------------------------------- Main Menu ----------------------------------------------->
<div class="contrainer">    
<br>
  
<form id="form1" name="form1" method="post" action="teameditcheck.php" enctype="multipart/form-data" >

<table class="tableindex" name='table1' border='0' align='center'>
	<tr>
  <?
//echo $_GET["CatID"];
		$sql="select * from team where 1=1 and TelID='".$_GET["TelID"]."'";
		$query=mysql_query($sql);
		$re= mysql_fetch_array($query);
?>

	<tr>
      <td><div align="center">ชื่อทีม&nbsp;</div></td>
      <td><input type="hidden" name="textTelID" value="<?=$re["TelID"];?>"  />
      	<input class="indexinput" type="text" name="textTeamname" value="<?=$re["Teamname"];?>"  required/>
      </td>
     </tr>
     <tr>
      <td colspan="2" align="center">
      	<input type="submit" name="button" id="button" class="btn btn-default" onClick="return confirm('ยืนยันการแก้ไข')" value="แก้ไข" />
      </td>
    </tr>
  </table>
</form>
    
  </body>
</html>
