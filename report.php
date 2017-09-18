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
        	<a href="selectReport.php" class="btn btn-default btn-sm" role="button" ><strong>พิมพ์รายงาน</strong></a>&nbsp;</a>
        </td>
      </tr>
      </table>
      
<div class="contrainer">         
        <table class="table" width="100%"  id="example" >
        	<thead>
                <tr>
					<th width="10%">ผู้บันทึก</th>
					<th width="10%">เลขทีม</th>
					<th width="12%">วัน/เวลาเข้างาน</th>
					<th width="15%">ชื่อลูกค้า/รหัส</th>
					<th width="15%">สถานที่</th>
					<th width="15%">เวลาที่บันทึก</th>
                </tr>
            </thead>
			<tbody>           	
              <?  
            $sql_show = "SELECT user,DATE_FORMAT(Datejob,'%d-%m-%Y'),Timejob,Location,SerID,Navser,Detail,
						service.TelID,team.Teamname,team.Teamcolor,Namecus,Staname,service.staID,service.userid,saveDate
						FROM service
						INNER JOIN admin ON service.userid = admin.userid 
						INNER JOIN team ON service.TelID = team.TelID
						INNER JOIN servicestatus ON  service.staID = servicestatus.staID
						and service.staID = 1";
						
            $result_show = mysql_query($sql_show) or die(mysql_error());
            while($row_show = mysql_fetch_array($result_show))
            {    
			$time = explode(":",$row_show["Timejob"]); // H:i
			$time_in = $time[0].":".$time[1];	?>
    
				<tr class="tr" data-url="report_detail.php?SerID=<?=$row_show["SerID"]?>" bgcolor="<? if(empty($row_show["Teamcolor"])){echo "#C9C9C9"; }else {echo $row_show["Teamcolor"];} ?>">
					<td>
                    	<font size="2">
							<?=$row_show["user"];?>
                    	</font>
                	</td>
                    
                <? if(empty($row_show["Teamname"])){ ?>
					<td>
                    	<font size="2">
                        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-
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
						<?=$row_show["DATE_FORMAT(Datejob,'%d-%m-%Y')"]?> <?=$time_in?>
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
						<?=$row_show["saveDate"]?>
                    </font>
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
                    <th>เวลาที่บันทึก</th>
                </tr>
              </tfoot>	
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

<script>
$(document).ready(function() {
     var oTable = $('#example').dataTable();
     // Sort immediately with columns 0 and 1
     oTable.fnSort( [ [2,'desc'] ] );
   } );
</script>
<script>
	$(function () {
		$('table.table tr.tr').click(function () {
			window.location.href = $(this).data('url');
		});
	})
</script>
	</div>
</body>
</html>
