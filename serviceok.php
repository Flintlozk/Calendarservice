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
	<? date_default_timezone_set("Asia/Bangkok"); ?>
<div class="contrainer">    
<!--------------------------------- Main Menu ----------------------------------------------->
	<?php include 'mainmenu.php';?>
<!--------------------------------- Main Menu ----------------------------------------------->
<br>
   <form id="form1" name="form1" method="post" action="serviceokcheck.php">
    <table class="tableindex" name='table1' border='0' align='center'>
<?
		$sql_show = "select * from service where SerID='".$_GET["SerID"]."'";
		$result_show = mysql_query($sql_show) or die(mysql_error());
		$row_show = mysql_fetch_array($result_show);
		
		
?>
    
    <tr>
    	<td colspan="2"><font color="red">ฟังก์ชั่นนี้ยังไม่สามารถใช้ได้</font></td>
    </tr>
    <tr>
      <td>JobNumber</td>
      <td><input class="indexinput" type="text"  value="<?=$row_show["Serail"];?>"/></td>
    </tr>
    <tr>
      <td>ชื่อลูกค้า</td>
      <td><input class="indexinput" type="text"  value="<?=$row_show["Namecus"];?>"/></td>
    </tr>
    <tr>
      <td>รหัสลูกค้า </td>
      <td><input class="indexinput" type="text"  value="<?=$row_show["Navser"];?>"/></td>
    </tr>
     <tr>
      <td>ทีมช่าง</td>
      <td><input class="indexinput" type="text"  value="<?=$row_show["Team"];?>"/></td>
    </tr>
    <tr>
      <td>Status</td>
      <td><input class="indexinput" type="text"  value="รอเข้างาน"/></td>
    </tr>
    <tr>
      <td>อาการที่แจ้ง</td>
      <td><input class="indexinput" type="text"  value="<?=$row_show["Detail"];?>"/></td>
    </tr>
     <tr>
      <td>แก้ไข</td>
      <td>
      <textarea class="indexinput"  name="textComplete" cols="25" rows="4"></textarea>
     
      <input type="hidden" name="SerID" value="<?=$row_show["SerID"]?>" />
      </td>
    </tr>
    <tr>
    <tr>
      <td colspan="2"  align="center"><input type="submit" name="button" id="button" onClick="return confirm('ยืนยันการบันทึก')" value="บันทึก" /></td>
      </tr>
  </table>
</form>    
  </body>
</html>
