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
include_once('header2.php');

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

            
        </td>
      </tr>
      </table>
<!----------------------------------------------------------- Thai Time Format -------------------------------------------------------------> 

	<? $date = explode("/",$_GET["pickday"]);
		$getDate = $date["0"]."-".$date["1"]."-".$date["2"]; 
	?>
    
<div class="indexform">
<div>
<button class="indexinput" onClick="hideshow()"><b><font size="2">ซ่อน/แสดง ปฏิทิน</font></b></button><br>
</div>

    <div class="left" id="left">
     <br/>
    <form name="calendar" id="get_calendar" method="get" action="index2.php">
        <div id="datepicker-th3"></div>
            <input type="hidden" name="pickday" id="datepicker-th3_value" value="<? echo $_GET["pickday"]?>" />  
            <label>
				<font color='red' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*เลือกแสดงวันเวลาเข้างาน*</font><br/><br />
            </label>
      </form>
      <? 
	  	$sx = explode("/",DateThai($strDate)); // dd/mm/yy	
		$ex = explode("/",$_GET["pickday"]); // dd/mm/yy	
		?>
	</div>   
    
	<div class="right" id="right">
   	<div align="center">
    	<b>
		<? if($_GET["pickday"] == ""){
			switch($sx[1]){
				case 1: echo "วันที่ ".$sx[2]." เดือน มกราคม พ.ศ. ".$sx[0]; break;
				case 2: echo "วันที่ ".$sx[2]." เดือน กุมภาพันธ์ พ.ศ. ".$sx[0]; break;
				case 3: echo "วันที่ ".$sx[2]." เดือน มีนาคม พ.ศ. ".$sx[0]; break;
				case 4: echo "วันที่ ".$sx[2]." เดือน เมษายน พ.ศ. ".$sx[0]; break;
				case 5: echo "วันที่ ".$sx[2]." เดือน พฤษภาคม  พ.ศ. ".$sx[0]; break;
				case 6: echo "วันที่ ".$sx[2]." เดือน มิถุนายน พ.ศ. ".$sx[0]; break;
				case 7: echo "วันที่ ".$sx[2]." เดือน กรกฎาคม พ.ศ. ".$sx[0]; break;
				case 8: echo "วันที่ ".$sx[2]." เดือน สิงหาคม พ.ศ. ".$sx[0]; break;
				case 9: echo "วันที่ ".$sx[2]." เดือน กันยายน พ.ศ. ".$sx[0]; break;
				case 10: echo "วันที่ ".$sx[2]." เดือน ตุลาคม พ.ศ. ".$sx[0]; break;
				case 11: echo "วันที่ ".$sx[2]." เดือน พฤศจิกายน  พ.ศ. ".$sx[0]; break;
				case 12: echo "วันที่ ".$sx[2]." เดือน ธันวาคม พ.ศ. ".$sx[0]; break;
				}
			}else{
			switch($ex[1]){
				case 1: echo "วันที่ ".$ex[2]." เดือน มกราคม พ.ศ. ".$ex[0]; break;
				case 2: echo "วันที่ ".$ex[2]." เดือน กุมภาพันธ์ พ.ศ. ".$ex[0]; break;
				case 3: echo "วันที่ ".$ex[2]." เดือน มีนาคม พ.ศ. ".$ex[0]; break;
				case 4: echo "วันที่ ".$ex[2]." เดือน เมษายน พ.ศ. ".$ex[0]; break;
				case 5: echo "วันที่ ".$ex[2]." เดือน พฤษภาคม  พ.ศ. ".$ex[0]; break;
				case 6: echo "วันที่ ".$ex[2]." เดือน มิถุนายน พ.ศ. ".$ex[0]; break;
				case 7: echo "วันที่ ".$ex[2]." เดือน กรกฎาคม พ.ศ. ".$ex[0]; break;
				case 8: echo "วันที่ ".$ex[2]." เดือน สิงหาคม พ.ศ. ".$ex[0]; break;
				case 9: echo "วันที่ ".$ex[2]." เดือน กันยายน พ.ศ. ".$ex[0]; break;
				case 10: echo "วันที่ ".$ex[2]." เดือน ตุลาคม พ.ศ. ".$ex[0]; break;
				case 11: echo "วันที่ ".$ex[2]." เดือน พฤศจิกายน  พ.ศ. ".$ex[0]; break;
				case 12: echo "วันที่ ".$ex[2]." เดือน ธันวาคม พ.ศ. ".$ex[0]; break;
				}
			}
	   ?>
       </b>
    </div>
        <table id="example" class='table'>
        	<thead>
                <tr>
					<th width="8%">ผู้บันทึก</th>
                    <th width="10%">หมายเหตุ</th>
					<th width="10%">เลขทีม</th>
					<th width="12%">วัน/เวลาเข้างาน</th>
					<th width="13%">ชื่อลูกค้า/รหัส</th>
					<th width="15%">สถานที่</th>
					<!--<th width="30%">รายละเอียด</th>-->
                    <th width="9%">สถานะ</th>
                    <th width="4%"></th>
                    <th width="4%"></th>
                    <th width="4%"></th>
                </tr>
            </thead>
			<tbody>           	
<!------------------------------------------------------- สถานะงาน เสร็จสิ้น // Done --------------------------------------------------->
	  <?
      	if($_GET["show_allvalue"] == "1"){ 
			$sql_show = "SELECT user,DATE_FORMAT(Datejob,'%d/%m/%Y'),Timejob,Location,SerID,Navser,Detail,
						team.TelID,team.Teamname,team.Teamcolor,Namecus,Staname,service.staID,service.userid,notation
						FROM service
						INNER JOIN admin ON service.userid = admin.userid 
						INNER JOIN team ON service.TelID = team.TelID
						INNER JOIN servicestatus ON  service.staID = servicestatus.staID
						WHERE service.staID='1'";
		}
	  	else if(empty($_GET["pickday"])){	 
            $sql_show = "SELECT user,DATE_FORMAT(Datejob,'%d/%m/%Y'),Timejob,Location,SerID,Navser,Detail,
						team.TelID,team.Teamname,team.Teamcolor,Namecus,Staname,service.staID,service.userid,notation
						FROM service
						INNER JOIN admin ON service.userid = admin.userid 
						INNER JOIN team ON service.TelID = team.TelID
						INNER JOIN servicestatus ON  service.staID = servicestatus.staID
						WHERE service.staID='1' AND Datejob='".DateThai($strDate)."'";
		} else if($_GET["pickday"]){
			$sql_show = "SELECT user,DATE_FORMAT(Datejob,'%d/%m/%Y'),Timejob,Location,SerID,Navser,Detail,
						team.TelID,team.Teamname,team.Teamcolor,Namecus,Staname,service.staID,service.userid,saveDate,notation
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
            
 				<tr class="tr" data-url="jobview.php?SerID=<?=$row_show["SerID"]?>&staID=<?=$row_show["staID"]?>" bgcolor="<? if(empty($row_show["TelID"])){echo "#C9C9C9"; }else {echo $row_show["Teamcolor"];} ?>">
					<td>
                    	<font size="2">
							<?=$row_show["user"];?>
                    	</font>
                	</td>
                <td>
                   <font size="2">
						<?=$row_show["notation"];?>
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
                            <? echo $row_show["DATE_FORMAT(Datejob,'%d/%m/%Y')"]," ",$time_in," น.";
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
                    <!--<td>
                        <font size="2">
                            <? //$row_show["Detail"]?>
                        </font>
                    </td>-->
                    <td>
                	<div align="center">
                        <b>
                            <font size="2">
                                <? echo $row_show["Staname"]; ?>
                            </font>
                        </b>
                    </div>
                    </td>
                    
                    <td>	
                        <div align="center">
                            <font size="2">
                                <a href="copyjob.php?SerID=<?=$row_show["SerID"]?>">
                                    <img src="images/copy.png" width="20" height="20" 
                                    onmouseover="this.src='images/copy2.png'"
                                    onmouseout="this.src='images/copy.png'"/>
                                </a>
                            </font>
                         </div> 
                     </td>    
                     
                    <td>
                        <div align="center">
                            <font size="2">
                                <a href="jobview.php?SerID=<?=$row_show["SerID"]?>&staID=<?=$row_show["staID"]?>">
                                    <img src="images/edit.png" width="20" height="20"
                                    onmouseover="this.src='images/edit2.png'"
                                    onmouseout="this.src='images/edit.png'"/>
                                </a>
                            </font>
                         </div> 
                    </td>
                    <td>
                         <div align="center">
                            <font size="2">
                                <a onClick="return confirm('ต้องการลบงานหรือไม่')" href="deletejob.php?SerID=<?=$row_show["SerID"]?>">
                                    <img src="images/delete.png" width="20" height="20" 
                                    onmouseover="this.src='images/delete2.png'"
                                    onmouseout="this.src='images/delete.png'"/>
                                </a>
                            </font>
                        </div>

                    </td>
             	 </tr>
          <? }?> <!--- end while row_show -->
          
<!------------------------------------------------------- สถานะงาน กำลังรอ // Waiting --------------------------------------------------->
          <?
  	  		//if($_GET["show_allvalue"] == "1"){
			$sql_show2 = "SELECT user,DATE_FORMAT(Datejob,'%d/%m/%Y'),Timejob,Location,SerID,Navser,Detail,
						TelID,Namecus,Staname,service.staID,service.userid,notation
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
          
          
          	<tr class="tr" data-url="jobview.php?SerID=<?=$row_show2["SerID"]?>&staID=<?=$row_show2["staID"]?>" bgcolor="#EDEDED">
				<td>
                   <font size="2">
						<?=$row_show2["user"];?>
                   </font>
                </td>
                <td>
                   <font size="2">
						<?=$row_show2["notation"];?>
                   </font>
                </td>
                    
				<td>
                   <font size="2">
                        	
                   </font>
                </td>
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
                <!-- <td>
                	<font size="2">
						<? //$row_show2["Detail"]?>
                    </font>
                </td>-->
                <td>
                	<div align="center">
                    <b>
                        <font size="2">
							<a href="jobview.php?SerID=<?=$row_show2["SerID"]?>&staID=<?=$row_show2["staID"]?>"><? echo $row_show2["Staname"] ?></a>
                        </font>
                    </b>
                    </div>
                </td>
                <td></td>
                <td>
                 	<div align="center">
                    	<font size="2">
                    		<a href="jobview.php?SerID=<?=$row_show2["SerID"]?>&staID=<?=$row_show2["staID"]?>">
                        		<img src="images/edit.png" width="20" height="20"
                                onmouseover="this.src='images/edit2.png'"
                                onmouseout="this.src='images/edit.png'"/>
                        	</a>
                        </font>
                     </div> 
                </td>
                <td>
                 	 <div align="center">
                    	<font size="2">
                        	<a onClick="return confirm('ต้องการลบงานหรือไม่')" href="deletejob.php?SerID=<?=$row_show2["SerID"]?>">
                            	<img src="images/delete.png" width="20" height="20"
                                onmouseover="this.src='images/delete2.png'"
                                onmouseout="this.src='images/delete.png'"/>
                            </a>
                        </font>
                    </div>
                </td>
              </tr>
              <? }?>
             </tbody>
             <tfoot>
             	<tr>
                	<th>ผู้บันทึก</th>
                    <th>หมายเหตุ</th>
					<th>เลขทีม</th>
					<th>วัน/เวลาเข้างาน</th>
					<th>ชื่อลูกค้า/รหัส</th>
					<th>สถานที่</th>
					<!--<th>รายละเอียด</th>-->
                    <th>สถานะ</th>
                    <th></th>
					<th></th>
                    <th></th>
                </tr>
              </tfoot>	
    	</table> <!-- end Table "Example" -->
	</div>    
</div>
<script type="text/javascript">
	$(document).ready(function(){
		oTable = $('#example').dataTable({
			"iDisplayLength": 50,
			"responsive": true,
			"bJQueryUI": true,
			"sPaginationType": "full_numbers"
		}); 
	});
	
	$(document).ready(function() {
		 var oTable = $('#example').dataTable();
		 oTable.fnSort( [ [2,'desc'],[3,'asc'] ] );
	   } );
	   
	$(function () {
		$('table.table tr.tr').click(function () {
			window.location.href = $(this).data('url');
		});
	})
</script>

<!-------------------------------------------------Inline Carlendar Selected----------------------------------------------------------------->
<script>

$('#datepicker-th3').datepicker({
	dateFormat: 'yy/m/d',
	dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
    dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
    monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
    monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'],
    inline: true,
	isBuddhist: true,
    altField: '#datepicker-th3_value'
});
	
</script>

<!-------------------------------------------------Pass Parameter----------------------------------------------------------------->
<script>
$('#datepicker-th3_value').change(function(){
    $('#datepicker-th3').datepicker('setDate', $(this).val());
});
</script>




	</div><!-- end Class "Contrainer" -->
</body>
</html>