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
   
	<table width="100%"   class="tableindex"  border="0" >

		<tr>
        	<td bgcolor="#727272" align="center" >
                	<a href="addteam.php" class="btn btn-default btn-sm" role="button" ><strong>สร้างทีม</strong></a></button>&nbsp;</a></td>
			</td>
		</tr>
	</table>
 <div class="contrainer"> 
	<table width="100%"  id="example" >
	<?
		$sql_show = "select * from team";
		$result_show = mysql_query($sql_show) or die(mysql_error());
		while($row_show = mysql_fetch_array($result_show)){
    		if($bg == "#D6D6D6") { //ส่วนของการ สลับสี 
			$bg = "#ffffff";
			} else {
			$bg = "#D6D6D6";
		}
		?>
		<tr bgcolor="<?=$row_show["2"]?>">
			<td width="600">
            	&nbsp;&nbsp;<?=$row_show["Teamname"]?>
			</td>
            <td width="25">
                <div align="center">
                    <a href="teamedit.php?TelID=<?=$row_show["TelID"]?>">
                        <img src="images/edit.png" width="25" height="25" 
                        onmouseover="this.src='images/edit2.png'"
                        onmouseout="this.src='images/edit.png'"/>
                    </a>
                </div>
            </td>
            <td width="25">
            	<div align="center">
                    <a href="teamdelete.php?TelID=<?=$row_show["TelID"]?>" onClick="return confirm('ต้องการลบหรือไม่ ?')">
                    	<img src="images/delete.png" width="25" height="25" 
                        onmouseover="this.src='images/delete2.png'"
                        onmouseout="this.src='images/delete.png'"/>
                    </a>
            	</div>
			</td>
        <? }?>
      	</tr>
    </table>
<script type="text/javascript">
$(document).ready(function(){
//    $('#example').dataTable();
    oTable = $('#example').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers"
    }); 
});
</script>
    
    </div>
  </body>
</html>
