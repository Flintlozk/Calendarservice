<?php

$host = "localhost";
$user = "root"; 
$passwd = "1234"; 
$dbname = "calendarservice";
mysql_connect($host,$user,$passwd) or die("ติดต่อ Host ไม่ได้");
mysql_select_db($dbname) or die("ติดต่อฐานข้อมูลไม่ได้");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

function DateThai($strDate) //แปลง Date/Time = Thai Date/Time
					{
						$strYear = date("Y",strtotime($strDate))+543;
						$strMonth= date("m",strtotime($strDate));
						$strDay= date("j",strtotime($strDate));
						$strHour= date("H",strtotime($strDate));
						$strMinute= date("i",strtotime($strDate));
						$strSeconds= date("s",strtotime($strDate));
						
						return "$strDay-$strMonth-$strYear";
					}
					$strDate = date("d-m-Y"); //เวลาปัจจุบัน อิงจากเวลา Server

$strExcelFileName="รายงาน_".$strDate.".xls"; //ชื่อไฟล์
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");
			
	$date1 = explode("/",$_POST["singleDate"]);
	$singleDate = $date1[2]."-".$date1[1]."-".$date1[0];
	$date2 = explode("/",$_POST["betweenDate_1"]);
	$beDate_1 = $date2[2]."-".$date2[1]."-".$date2[0];
	$date3 = explode("/",$_POST["betweenDate_2"]); // dd/mm/yy
	$beDate_2 = $date3[2]."-".$date3[1]."-".$date3[0];

	if($_POST["singleDate"] == "" && $_POST["betweenDate_1"] == "" && $_POST["betweemDate_2"] == ""){
			$sql=mysql_query("SELECT user,Datejob,Timejob,Location,SerID,Navser,Detail,
						team.TelID,team.Teamname,team.Teamcolor,Namecus,Staname,service.staID,service.userid,notation,saveDate
						FROM service,admin,team,servicestatus
						WHERE service.userid = admin.userid 
						AND service.TelID = team.TelID
						AND service.staID = servicestatus.staID 
						order by Datejob desc , saveDate asc");
		}else if($_POST["singleDate"] !=""){
			$sql=mysql_query("SELECT user,Datejob,Timejob,Location,SerID,Navser,Detail,
						team.TelID,team.Teamname,team.Teamcolor,Namecus,Staname,service.staID,service.userid,notation,saveDate
						FROM service,admin,team,servicestatus
						WHERE service.userid = admin.userid 
						AND service.TelID = team.TelID
						AND service.staID = servicestatus.staID 
						AND Datejob = '$singleDate'
			ORDER BY Datejob desc , saveDate asc");
			
			}else if($_POST["betweenDate_1"] !="" && $_POST["betweenDate_2"] !=""){
				$sql=mysql_query("SELECT user,Datejob,Timejob,Location,SerID,Navser,Detail,
						team.TelID,team.Teamname,team.Teamcolor,Namecus,Staname,service.staID,service.userid,notation,saveDate
						FROM service,admin,team,servicestatus
						WHERE service.userid = admin.userid 
						AND service.TelID = team.TelID
						AND service.staID = servicestatus.staID 
						AND Datejob between '$beDate_1' and '$beDate_2' 
				ORDER BY Datejob desc , saveDate asc");
				}

$num=mysql_num_rows($sql);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>

<style>
  <!--table
  @page
     {mso-header-data:"&CMultiplication Table\000ADate\: &D\000APage &P";
	mso-page-orientation:landscape;}
     br
     {mso-data-placement:same-cell;}
  -->
</style>
<? if($_POST["singleDate"] !=""){?> 
				<strong>Calendar Service</strong><br/>
            	<strong>รายงานวันที่ <?php echo $_POST["singleDate"];?> ทั้งหมด <?php echo number_format($num);?> รายการ</strong><br>
            <?
			}else if($_POST["betweenDate_1"] !="" && $_POST["betweenDate_2"] !=""){	?>	
           		 <strong>Calendar Service</strong><br/>
				<strong>รายงานวันที่ <?php echo $_POST["betweenDate_1"];?> ถึง <?php echo $_POST["betweenDate_2"];?> ทั้งหมด <?php echo number_format($num);?> รายการ</strong><br> <? }else {?>
                <strong>Calendar Service</strong><br/>
                <strong>พิมพ์วันที่ <? echo DateThai($strDate);?> ทั้งหมด <?php echo number_format($num);?> รายการ</strong><br>
			<? }?>

<br>
<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
    <table x:str border=1 cellpadding=1 cellspacing=1 width=100% style="border-collapse:collapse">
        <tr>
        	<td width="40" align="center" valign="top" ><strong>ลำดับ</strong></td>
            <td width="150" align="center" valign="top" ><strong>หมายเหตุ</strong></td>
            <td width="90" height="30" align="center" valign="top" ><strong>ผู้บันทึก</strong></td>
            <td width="150" align="center" valign="top" ><strong>เลขทีม</strong></td>
            <td width="100" align="center" valign="top" ><strong>วัน/เวลาเข้างาน</strong></td>
            <td width="200" align="center" valign="top" ><strong>ชื่อลูกค้า/รหัส</strong></td>
            <td width="200" align="center" valign="top" ><strong>สถานที่</strong></td>
            <td width="140" align="center" valign="top" ><strong>รายละเอียด</strong></td>
            <td width="150" align="center" valign="top" ><strong>สถานะงาน</strong></td>
            <td width="150" align="center" valign="top" ><strong>วันที่บันทึก</strong></td>
            
        </tr>
    <?php
	
/*	user,DATE_FORMAT(Datejob,'%d/%m/%Y'),Timejob,Location,SerID,Navser,Detail,
						team.TelID,8team.Teamname,team.Teamcolor,Namecus,Staname,service.staID,service.userid,notation,saveDate*/
	
    if($num>0){
        while($row=mysql_fetch_array($sql)){
		$i++
    ?>
        <tr>
        	<td height="auto" align="center" valign="top" ><?=$i;?></td>
            <td height="auto" align="center" valign="top" ><?=$row['user'];?></td>
            <td align="center" valign="top"><?=$row['notation'];?></td>
            <td align="center" valign="top" ><?=$row['Teamname'];?> น.</td>
            <td align="center" valign="top"><?=$row['Datejob'];?>&nbsp;<?=$row['Timejob'];?></td>
            <td align="center" valign="top"><?=$row['Namecus'];?>&nbsp;<?=$row['Navser'];?></td>
            <td align="center" valign="top"><?=$row['Location'];?></td>
            <td align="center" valign="top"><?=$row['Detail'];?></td>
            <td align="center" valign="top"><?=$row['Staname'];?></td>
            <td align="center" valign="top"><?=$row['saveDate'];?></td>
            
        </tr>
    <?php
        }
    }
    ?>
    </table>
</div>

<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>