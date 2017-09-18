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
      
    <?

		do{
		function random_color_part() { //สุ่มสี อ่อน (150-255)
		  return str_pad( dechex( mt_rand(50, 255 ) ), 2, '0', STR_PAD_LEFT);
		}
		function random_color() { //แปลงเป็น code สี #xxxxx
			return "#" . random_color_part() . random_color_part() . random_color_part();
		}
		$rgbcolor = random_color();
			 //$sqlcolor="select color from admin where color='".$rgbcolor."'";
			 $sqlcolor="select teamcolor from team where teamcolor='".$rgbcolor."'";
			 $resultcolor = mysql_query($sqlcolor) or die(mysql_error());
			 while($row= mysql_fetch_array($resultcolor)){
				 echo $row[0];
		 }
		} while ($rgbcolor == $row[0]);
	
	?>
<!--------------------------------- Main Menu ----------------------------------------------->
	<?php include 'mainmenu.php';?>
<!--------------------------------- Main Menu ----------------------------------------------->
<div class="contrainer">    
<br>

<form id="form1" name="form1" method="post" action="addteamcheck.php">
<table class="tableindex" name='table1' border='0' align='center'>
    <tr>
		<td colspan="2">
            <div align="center">
                <font size="6">
                	<strong>สร้างทีม</strong>
                </font>
             </div>
		</td>
	</tr>
     <tr>
          <td>
            <div align="center">สร้างทีม</div>
          </td>
          <td>
            <input class="indexinput" type="text" name="textTeamname"  required/>
          </td>
      </tr>
      <tr>
          <td>
            <div align="center">สีทีม</div>
          </td>
          <td>
          	<input class="indexinput" type="color"  maxlength="7" name="show_color" value="<? echo strtoupper($rgbcolor); ?>" disabled/>
            <input type="hidden" maxlength="7" name="textTeamcolor" value="<? echo strtoupper($rgbcolor); ?>" /></td>
          </td>
      </tr>
      <tr>
      	<td colspan="2" align="center">
        	<input type="submit" name="button" id="button" onClick="return confirm('ยืนยันการบันทึก')"class="btn btn-default" value="บันทึก" />
        </td>
    </tr>
</table>
</form>
</div>
  </body>
</html>
