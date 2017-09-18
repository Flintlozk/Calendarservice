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

<!--------------------------------- Main Menu ----------------------------------------------->
	<?php include 'mainmenu.php';?>
<!--------------------------------- Main Menu ----------------------------------------------->
<div class="contrainer">    
<br>
   <form id="form1" name="form1" method="post" action="jobvieweditcheck.php">
    <table class="tableindex" name='table1' border='0' align='center'>
        <tr>
		<td colspan="2">
             <div align="center">
                <font size="6">
                	<strong>รายละเอียด</strong>
                </font>
             </div>
		</td>
	</tr>

     
<?
				$sql_show = "SELECT service.userid,user,service.TelID,team.Teamname,SerID, DATE_FORMAT(Datejob,'%d/%m/%Y'), Timejob, Location, Namecus, Detail, Navser, saveDate
					FROM service,admin,team
					WHERE admin.userid = service.userid 
					AND team.TelID = service.TelID
					AND SerID = '".$_GET["SerID"]."'";;
					$result_show = mysql_query($sql_show) or die(mysql_error());
					$row_show = mysql_fetch_array($result_show);
?>							
		<tr>
		<td align="right">
      		ผู้บันทึก:
      	</td>
		<td>
        	<input class="indexinput" type="text"  value="<?=$row_show["user"];?>" disabled/>
		</td>

	</tr>
    <tr>    
        <td align="right">
      		เวลาที่บันทึก:
      	</td>
		<td>
        	<input class="indexinput" type="text"  value="<?=$row_show["saveDate"];?>" disabled/>
		</td>
    </tr>
	<? if($_SESSION["status"] == "admin"){?>
	<tr>
      	<td align="right">เลขทีม:</td>
      	<td>
        	<input class="indexinput" type="text"  value="<?=$row_show["Teamname"];?>" disabled/>
        </td>
	
	</tr>
    <tr>
      	<td align="right">
        	วันเข้างาน:
		</td>
      	<td>
        	<input class="indexinput" name="textDatejob" type="text" size="10" value="<?=$row_show["DATE_FORMAT(Datejob,'%d/%m/%Y')"];?>"  required/>
		</td>
    </tr>
    <tr>
    <?
			$time = explode(":",$row_show["Timejob"]); // H:i
			$newtime = $time[0].".".$time[1];
	?>
		<td align="right">เวลาเข้างาน:</td>
		<td><input class="indexinput" type="text" size="10" value="<?=$newtime;?>"  disabled/></td>
	</tr>
	
        <? }?>
		<td align="right">ชื่อลูกค้า:</td>
		<td><input class="indexinput" type="text" name="textNamecus" value="<?=$row_show["Namecus"];?>" disabled/></td>       
	</tr>
	<tr>
		<td align="right">รหัสลูกค้า:</td>
      	<td><input class="indexinput" type="text" name="textNavser" value="<?=$row_show["Navser"];?>" disabled/></td>
    </tr>
    <tr>
		<td align="right">สถานที่:</td>
		<td><input class="indexinput" type="text" name="textLocation" value="<?=$row_show["Location"]?>" disabled/></td>
    </tr>
    <tr>
        <td align="right" valign="top">รายละเอียด:</td>
        <td>
        	<textarea class="indexinput" name="textDetail" type="text" cols="100%" rows="28" value="<?=$row_show["Detail"];?>" disabled><?=$row_show["Detail"];?></textarea>
		</td>
    </tr>
	
  </table>
  
  <input type="hidden" name="SerID" value="<?=$row_show["SerID"]?>" />
</form>    
</body>
</html>
