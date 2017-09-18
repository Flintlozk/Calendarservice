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
   <form id="form1" name="form1" method="post" action="jobvieweditcheck.php">
    <table class="tableindex" name='table1' border='0' align='center'>
        <tr>
		<td colspan="2">
            <div align="center">
                <h4><strong>แก้ไข</strong></h4>
             </div>
		</td>
	</tr>
    
<?		
echo $_GET["staID"];
	if($_GET["staID"] == "0"){
		echo "Waiting";
		}else 
			if($_GET["staID"] == "1"){
				echo "Done";
				}
	/*SELECT service.userid,user,service.TelID,team.Teamname,SerID, Datejob, Timejob, Location, Namecus, Detail, Navser, saveDate
					FROM service,admin,team
					WHERE admin.userid = service.userid 
					AND team.TelID = service.TelID
					AND SerID = 61*/ //For staID == 1
					
	/*SELECT service.userid,user,SerID, Datejob, Timejob, Location, Namecus, Detail, Navser, saveDate
					FROM service,admin
					WHERE admin.userid = service.userid 
					AND SerID = 61*/ //For staID == 0
										
		$sqlget = "SELECT SerID, Datejob, Timejob, Location, Namecus, Detail, Navser, saveDate
					FROM service
					WHERE SerID ='".$_GET["SerID"]."'";
			$result_get = mysql_query($sqlget) or die(mysql_error());
			$row_get = mysql_fetch_array($result_get);

		$sql_show = "SELECT service.userid,user,service.TelID,team.Teamname
					FROM service,admin,team
					WHERE admin.userid = service.userid 
					AND team.TelID = service.TelID
					AND SerID = '".$_GET["SerID"]."'";
			$result_show = mysql_query($sql_show) or die(mysql_error());
			$row_show = mysql_fetch_array($result_show);
?>	
	<tr>
		<td>
      		ผู้บันทึก
      	</td>
		<td>
        	<input class="indexinput" type="text"  value="<?=$row_show["user"];?>" disabled/>
		</td>
	</tr>
	<? if($_SESSION["status"] == "admin"){?>
	<tr>
      	<td>เลขทีม</td>
      	<td>
        	<input class="indexinput" type="text"  value="<? if(isset($row_show["TelID"])){echo "";}else{ echo $row_show["Teamname"];}?>" disabled/>
        </td>
	<tr>
      	<td></td>
          <td>
          <select class="indexinput" name="textTeamname" id="select">
           <option value="<?=$row_show["TelID"];?>" >--เปลียนทีม--</option>
                      <?
                $sql_group = "select * from team order by TelID asc";
                $dbquery_group = mysql_query($sql_group);
                $num_rows_group = mysql_num_rows($dbquery_group);
                while ($result = mysql_fetch_array($dbquery_group)){
                    if($_POST["TelID"] == $result["TelID"]){
                        $sel="selected";}
                            else{
                        $sel="";
                    }
                ?>					
           <option value="<?=$result["TelID"];?>" <?=$sel;?>><?=$result["Teamname"];?></option>
            <?	} ?>
            </td>
	</tr>
    <tr>
      	<td>
        	วันเข้างาน
		</td>
      	<td>
        	<input class="indexinput" id="datepicker-th2" name="textDatejob" type="text" size="10" value="<?=$row_get["Datejob"];?>"  />
		</td>
    </tr>
    <tr>
		<td>เวลาเข้างาน</td>
		<td><input class="indexinput" type="text" size="10" value="<?=$row_get["Timejob"];?>"  /></td>
	</tr>
	<tr>
		<td></td>
		<td><select class="indexinput"  name="textTimejob" value="" <? echo $disabled?> >
                    <option value="<?=$row_get["Timejob"];?>" >--เลือกเวลา--</option>
                    <option value="00:00:00">00.00</option>
                    <option value="00:30:00">00.30</option>
                    <option value="01:00:00">01.00</option>
                    <option value="01:30:00">01.30</option>
                    <option value="02:00:00">02.00</option>
                    <option value="02:30:00">02.30</option>
                    <option value="03:00:00">03.00</option>
                    <option value="03:30:00">03.30</option>
                    <option value="04:00:00">04.00</option>
                    <option value="04:30:00">04.30</option>
                    <option value="05:00:00">05.00</option>
                    <option value="05:30:00">05.30</option>
                    <option value="06:00:00">06.00</option>
                    <option value="06:30:00">06.30</option>
                    <option value="07:00:00">07.00</option>
                    <option value="07:30:00">07.30</option>
                    <option value="08:00:00">08.00</option>
                    <option value="08:30:00">08.30</option>
                    <option value="09:00:00">09.00</option>
                    <option value="09:30:00">09.30</option>
                    <option value="10:00:00">10.00</option>
                    <option value="10:30:00">10.30</option>
                    <option value="11:00:00">11.00</option>
                    <option value="11:30:00">11.30</option>
                    <option value="12:00:00">12.00</option>
                    <option value="12:30:00">12.30</option>
                    <option value="13:00:00">13.00</option>
                    <option value="13:30:00">13.30</option>
                    <option value="14:00:00">14.00</option>
                    <option value="14:30:00">14.30</option>
                    <option value="15:00:00">15.00</option>
                    <option value="15:30:00">15.30</option>
                    <option value="16:00:00">16.00</option>
                    <option value="16:30:00">16.30</option>
                    <option value="17:00:00">17.00</option>
                    <option value="17:30:00">17.30</option>
                    <option value="18:00:00">18.00</option>
                    <option value="18:30:00">18.30</option>
                    <option value="19:00:00">19.00</option>
                    <option value="19:30:00">19.30</option>
                    <option value="20:00:00">20.00</option>
                    <option value="20:30:00">20.30</option>
                    <option value="21:00:00">21.00</option>
                    <option value="21:30:00">21.30</option>
                    <option value="22:00:00">22.00</option>
                    <option value="22:30:00">22.30</option>
                    <option value="23:00:00">23.00</option>
                    <option value="23:30:00">23.30</option>
            	</select>
		</td>
	</tr>
        <? }?>
		<td>ชื่อลูกค้า</td>
		<td><input class="indexinput" type="text" name="textNamecus" value="<?=$row_get["Namecus"];?>" /></td>       
	</tr>
	<tr>
		<td>รหัสลูกค้า</td>
      	<td><input class="indexinput" type="text" name="textNavser" value="<?=$row_get["Navser"];?>"/></td>
    </tr>
    <tr>
		<td>สถานที่</td>
		<td><input class="indexinput" type="text" name="textLocation" value="<?=$row_get["Location"]?>"/></td>
    </tr>
    <tr>
        <td>รายละเอียด</td>
        <td>
        	<textarea class="indexinput" name="textDetail" type="text" cols="40" rows="4" value="<?=$row_get["Detail"];?>"><?=$row_get["Detail"];?></textarea>
		</td>
    </tr>
    <tr>
    	<td colspan="2" align="center">
 			<input class="btn btn-default" type="submit" name="button" id="button" onClick="return confirm('ยืนยันการบันทึก')" value="บันทึก" />
     	</td>
     </tr>
  </table>
  
  <input type="hidden" name="SerID" value="<?=$row_get["SerID"]?>" />
</form>    
  </body>
</html>
