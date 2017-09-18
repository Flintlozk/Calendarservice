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
	<? date_default_timezone_set("Asia/Bangkok");?>
    <? function DateThai($strDate) //แปลง Date/Time = Thai Date/Time
	{
		$strYear1 = date("Y",strtotime($strDate))+543;
		$strMonth1= date("m",strtotime($strDate));
		$strDay1= date("j",strtotime($strDate));
						
			return "$strYear1/$strMonth1/$strDay1";
	}
	$strDate = date("Y-m-d"); //เวลาปัจจุบัน อิงจากเวลา Server
	
		function today($strToday) //แปลง Date/Time = Thai Date/Time
	{
		$strYear2 = date("Y",strtotime($strToday))+543;
		$strMonth2= date("m",strtotime($strToday));
		$strDay2= date("j",strtotime($strToday));
						
			return "$strDay2/$strMonth2/$strYear2";
	}
	$strToday = date("Y-m-d"); //เวลาปัจจุบัน อิงจากเวลา Server
?>


<!--------------------------------- Main Menu ----------------------------------------------->
	<?php include 'mainmenu.php';?>
<!--------------------------------- Main Menu ----------------------------------------------->
<?php $today = getdate(); ?>
     <table width="100%"   class="tableindex"  border="0" >
      <tr>
        <td bgcolor="#313A3A" align="center">
        	<font size="6" color="#FFFFFF">&nbsp;Calendar Service</font>
        </td>
      </tr>
      <tr>
        <td bgcolor="#727272"  align="center" >
  
            <form name="show_all" method="get" action="index.php">
            
               <a href="insertjob.php" class="btn btn-default" role="button" ><strong>สร้างงาน</strong></a>&nbsp;</a>
               
                    <input type="hidden" name="show_allvalue" value="1" />
                    <label>
                    	<input type="submit" name="button" class="btn btn-default" id="button2" value="แสดงงานทั้งหมด" /> 
                    </label>
      			</form>
            
        </td>
      </tr>
      <tr>
      	<td bgcolor="#C1C1C1" align="right">
        
            <form name="getday" id="send_Get" method="get" action="index.php">
          
                <b>เลือกวันที่เข้างาน:</b> <input class="indexinput2" type="text" name="thisday" id="datepicker-th3" value="<? echo $_GET["thisday"];?>"/>  
    
                <label>
                    <input type="submit" name="button" class="indexinput" id="button" value="ค้นหา" /> 
                </label>
            
            </form>
            
        </td>
      </tr>
      </table>
<!----------------------------------------------------------- Thai Time Format -------------------------------------------------------------> 

<p id="time"></p>
	<? $date = explode("/",$_GET["thisday"]);
		$getDate = $date["2"]."-".$date["1"]."-".$date["0"]; ?>
	<div class="contrainer">  
    
        <table  id="example" >
        	<thead>
                <tr>
					<th width="10%">ผู้บันทึก</th>
					<th width="10%">เลขทีม</th>
					<th width="12%">วัน/เวลาเข้างาน</th>
					<th width="13%">ชื่อลูกค้า/รหัส</th>
					<th width="15%">สถานที่</th>
					<th width="30%">รายละเอียด</th>
                    <th width="9%">สถานะ</th>
                    <? if($_SESSION["status"]=="admin"){ ?>
                    	<th width="4%"></th>
					<? }?>
                    <th width="4%"></th>
                    <th width="4%"></th>
                </tr>
            </thead>
			<tbody>           	
<!------------------------------------------------------- สถานะงาน เสร็จสิ้น // Done --------------------------------------------------->
	  <?
      	if($_GET["show_allvalue"] == "1"){ 
			$sql_show = "SELECT user,DATE_FORMAT(Datejob,'%d/%m/%Y'),Timejob,Location,SerID,Navser,Detail,
						team.TelID,team.Teamname,team.Teamcolor,Namecus,Staname,service.staID,service.userid
						FROM service
						INNER JOIN admin ON service.userid = admin.userid 
						INNER JOIN team ON service.TelID = team.TelID
						INNER JOIN servicestatus ON  service.staID = servicestatus.staID
						WHERE service.staID='1'";
		}
	  	else if(empty($_GET["thisday"])){	 
            $sql_show = "SELECT user,DATE_FORMAT(Datejob,'%d/%m/%Y'),Timejob,Location,SerID,Navser,Detail,
						team.TelID,team.Teamname,team.Teamcolor,Namecus,Staname,service.staID,service.userid
						FROM service
						INNER JOIN admin ON service.userid = admin.userid 
						INNER JOIN team ON service.TelID = team.TelID
						INNER JOIN servicestatus ON  service.staID = servicestatus.staID
						WHERE service.staID='1' AND Datejob='".DateThai($strDate)."'";
		} else if($_GET["thisday"]){
			$sql_show = "SELECT user,DATE_FORMAT(Datejob,'%d/%m/%Y'),Timejob,Location,SerID,Navser,Detail,
						team.TelID,team.Teamname,team.Teamcolor,Namecus,Staname,service.staID,service.userid,saveDate
						FROM service
						INNER JOIN admin ON service.userid = admin.userid 
						INNER JOIN team ON service.TelID = team.TelID
						INNER JOIN servicestatus ON  service.staID = servicestatus.staID
						WHERE service.staID='1' AND Datejob = '$getDate'";
		}
            $result_show = mysql_query($sql_show) or die(mysql_error());
			
            while($row_show = mysql_fetch_array($result_show))
            {    
			$time = explode(":",$row_show["Timejob"]); // H:i
			$time_in = $time[0].":".$time[1];	?>
            
 				<tr bgcolor="<? if(empty($row_show["TelID"])){echo "#C9C9C9"; }else {echo $row_show["Teamcolor"];} ?>">
					<td>
                    	<font size="2">
							<?=$row_show["user"];?>
                    	</font>
                	</td>
                    
                <? if(empty($row_show["TelID"])){ ?>
					<td>
                    	<font size="2">
                        	-----
                        </font>
                    </td><? 
					}else{?>
                    <td>
                        <font size="2">
							<?=$row_show["Teamname"];?>
                        </font>
                    </td>
					<? }?>
                    
                    <td>
                        <font size="2">
                            <? echo $row_show["DATE_FORMAT(Datejob,'%d/%m/%Y')"]," ",$time_in;
                            ?>
                         </font>
                    </td>
                    <td>
                        <font size="2">
                            <?=$row_show["Namecus"]?>&nbsp;&nbsp;<?=$row_show["Navser"]?>
                        </font>
                    </td>
                    <td>
                        <font size="2">
                            <?=$row_show["Location"]?>
                        </font>
                    </td>
                    <td>
                        <font size="2">
                            <?=$row_show["Detail"]?>
                        </font>
                    </td>
                    <td>
                	<div align="center">
                        <b>
                            <font size="2">
                                <? echo $row_show["Staname"]; ?>
                            </font>
                        </b>
                    </div>
                    </td>
                    
                   <? if($_SESSION["status"] == "admin"){?>
                    <td>	
                        <div align="center">
                            <font size="2">
                                <a href="copyjob.php?SerID=<?=$row_show["SerID"]?>">
                                    <img src="images/copy.png" width="20" height="20" />
                                </a>
                            </font>
                         </div> 
                     </td>    
                     <? } ?>
                     
                    <td>
                    <? if($_SESSION["status"] == "admin"){?>
                        <div align="center">
                            <font size="2">
                                <a href="jobview.php?SerID=<?=$row_show["SerID"]?>&staID=<?=$row_show["staID"]?>">
                                    <img src="images/edit.png" width="20" height="20" />
                                </a>
                            </font>
                         </div> 
                     <? }else if($_SESSION["status"] == "user" && $_SESSION["userid"] == $row_show["userid"]){?>
                        <div align="center">
                            <font size="2">
                                <a href="jobview.php?SerID=<?=$row_show["SerID"]?>&staID=<?=$row_show["staID"]?>">
                                    <img src="images/edit.png" width="20" height="20" />
                                </a>
                            </font>
                         </div> 
                    <? } ?>
                    </td>
                    <td>
                    <? if($_SESSION["status"] == "admin"){?>
                        <div align="center">
                            <font size="2">
                                <a onClick="return confirm('ต้องการลบงานหรือไม่')" href="deletejob.php?SerID=<?=$row_show["SerID"]?>">
                                    <img src="images/delete.png" width="20" height="20" />
                                </a>
                            </font>
                        </div>
                    <? }else if($_SESSION["status"] == "user" && $_SESSION["userid"] == $row_show["userid"]){?>
                         <div align="center">
                            <font size="2">
                                <a onClick="return confirm('ต้องการลบงานหรือไม่')" href="deletejob.php?SerID=<?=$row_show["SerID"]?>">
                                    <img src="images/delete.png" width="20" height="20" />
                                </a>
                            </font>
                        </div>
                    <? } ?> <!--- end if -->
                    </td>
             	 </tr>
          <? }?> <!--- end while row_show -->
          
<!------------------------------------------------------- สถานะงาน กำลังรอ // Waiting --------------------------------------------------->
          <?
  	  		//if($_GET["show_allvalue"] == "1"){
			$sql_show2 = "SELECT user,DATE_FORMAT(Datejob,'%d/%m/%Y'),Timejob,Location,SerID,Navser,Detail,
						TelID,Namecus,Staname,service.staID,service.userid
						FROM service
						INNER JOIN admin ON service.userid = admin.userid 
						INNER JOIN servicestatus ON  service.staID = servicestatus.staID
						WHERE service.staID='0' ";
			
			/*}else if(empty($_GET["thisday"])){	
          	$sql_show2 = "SELECT user,DATE_FORMAT(Datejob,'%d/%m/%Y'),Timejob,Location,SerID,Navser,Detail,
						TelID,Namecus,Staname,service.staID,service.userid
						FROM service
						INNER JOIN admin ON service.userid = admin.userid 
						INNER JOIN servicestatus ON  service.staID = servicestatus.staID
						WHERE service.staID='0'";
						} 
			else if($_GET["thisday"]) {
			$sql_show2 = "SELECT user,DATE_FORMAT(Datejob,'%d/%m/%Y'),Timejob,Location,SerID,Navser,Detail,
						TelID,Namecus,Staname,service.staID,service.userid
						FROM service
						INNER JOIN admin ON service.userid = admin.userid 
						INNER JOIN servicestatus ON  service.staID = servicestatus.staID
						WHERE service.staID='0'";
						}*/

            $result_show2 = mysql_query($sql_show2) or die(mysql_error());
			
            while($row_show2 = mysql_fetch_array($result_show2))
            {    
			$time = explode(":",$row_show2["Timejob"]); // H:i
			$time_in = $time[0].":".$time[1];	?>
          
          
          	<tr bgcolor="#EDEDED">
				<td>
                   <font size="2">
						<?=$row_show2["user"];?>
                   </font>
                </td>
                    
                <? if(empty($row_show2["TelID"])){ ?>
				<td>
                   <font size="2">
                        	
                   </font>
                </td>
				<? }else{?>
                <td>
                   <font size="2">
						รอการยืนยันข้อมูล
                   </font>
               </td>
				<? }?>
                <td>
                	<font size="2">
                    	
                     </font>
                </td>
                <td>
                	<font size="2">
						<?=$row_show2["Namecus"]?>&nbsp;&nbsp;<?=$row_show2["Navser"]?>
                    </font>
                </td>
                <td>
                	<font size="2">
						<?=$row_show2["Location"]?>
                    </font>
                </td>
                <td>
                	<font size="2">
						<?=$row_show2["Detail"]?>
                    </font>
                </td>
                <td>
                	<div align="center">
                    <b>
                        <font size="2">
                         	<? if($_SESSION["status"] == "admin"){?>
								<a href="waitjob.php?SerID=<?=$row_show2["SerID"]?>"><? echo $row_show2["Staname"] ?></a>
                                <? }else if($_SESSION["status"] == "user"){ ?>
                                	<? echo $row_show2["Staname"] ?>
                                <? }?>
                        </font>
                    </b>
                    </div>
                </td>
                <? if($_SESSION["status"]=="admin"){ ?>
                <td></td>
				<? }?>
                <td>
                <? if($_SESSION["status"] == "admin"){?>
                	<div align="center">
                    	<font size="2">
                    		<a href="jobview.php?SerID=<?=$row_show2["SerID"]?>&staID=<?=$row_show2["staID"]?>">
                        		<img src="images/edit.png" width="20" height="20" />
                        	</a>
                        </font>
                     </div> 
                 <? }else if($_SESSION["status"] == "user" && $_SESSION["userid"] == $row_show2["userid"]){?>
                 	<div align="center">
                    	<font size="2">
                    		<a href="jobview.php?SerID=<?=$row_show2["SerID"]?>&staID=<?=$row_show2["staID"]?>">
                        		<img src="images/edit.png" width="20" height="20" />
                        	</a>
                        </font>
                     </div> 
                <? } ?>
                </td>
                <td>
                <? if($_SESSION["status"] == "admin"){?>
                	<div align="center">
                    	<font size="2">
                        	<a onClick="return confirm('ต้องการลบงานหรือไม่')" href="deletejob.php?SerID=<?=$row_show2["SerID"]?>">
                            	<img src="images/delete.png" width="20" height="20" />
                            </a>
                        </font>
                    </div>
				<? }else if($_SESSION["status"] == "user" && $_SESSION["userid"] == $row_show2["userid"]){?>
                 	 <div align="center">
                    	<font size="2">
                        	<a onClick="return confirm('ต้องการลบงานหรือไม่')" href="deletejob.php?SerID=<?=$row_show2["SerID"]?>">
                            	<img src="images/delete.png" width="20" height="20" />
                            </a>
                        </font>
                    </div>
                <? } ?> <!--- end if -->
                </td>
              </tr>
              <? }?>
             </tbody>
             <tfoot>
             	<tr>
                	<th>ผู้บันทึก</th>
					<th>เลขทีม</th>
					<th>วัน/เวลาเข้างาน</th>
					<th>ชื่อลูกค้า/รหัส</th>
					<th>สถานที่</th>
					<th>รายละเอียด</th>
                    <th>สถานะ</th>
                    <? if($_SESSION["status"]=="admin"){ ?>
                    	<th></th>
					<? }?>
					<th></th>
                    <th></th>
                </tr>
              </tfoot>	
    	</table> <!-- end Table "Example" -->
    
<script type="text/javascript">
$(document).ready(function(){
//    $('#example').dataTable();
    oTable = $('#example').dataTable({
		"responsive": true,
        "bJQueryUI": true,
        "sPaginationType": "full_numbers"
    }); 
});
</script>

<script>
$(document).ready(function() {
     var oTable = $('#example').dataTable();
     // Sort immediately with columns 0 and 1
     oTable.fnSort( [ [6,'asc'],[2,'asc'],[0,'desc'] ] );
   } );
</script>





	</div><!-- end Class "Contrainer" -->
</body>
</html>