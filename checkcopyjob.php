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
require("connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body background="wall/wall4.jpg" >
<? date_default_timezone_set("Asia/Bangkok");?>
<?

	/*echo $_POST["textDetail"];
	echo $_POST["textNavser"];
	echo $_POST["textNamecus"];
	echo $_POST["textLocation"];
	
	echo $_POST["staID"];
	echo $_POST["SerID"];*/
	
	function DateThai($strDate) //แปลง Date/Time = Thai Date/Time
				{
					$strYear = date("Y",strtotime($strDate))+543;
					$strMonth= date("m",strtotime($strDate));
					$strDay= date("j",strtotime($strDate));
					$strHour= date("H",strtotime($strDate));
					$strMinute= date("i",strtotime($strDate));
					$strSeconds= date("s",strtotime($strDate));
						
					return "$strYear-$strMonth-$strDay $strHour:$strMinute:$strSeconds";
				}
				$strDate = date("Y-m-d H:i:s"); //เวลาปัจจุบัน อิงจากเวลา Server
	
	$serID =  $_POST["SerID"];
	$date = explode("/",$_POST["textDatejob"]); // dd/mm/yy
	$newdate = $date[2]."-".$date[1]."-".$date[0];
	
	/*echo $_POST["textDatejob"];
	echo $_POST["textTimejob"];
	echo $_POST["textTeamname"];*/
	
	if($_POST["textDatejob"] == "" && $_POST["textTimejob"] == "" && $_POST["textTeamname"] == ""){				
						print "<script>alert('ไม่พบวันเวลาเข้างานหรือทีมช่าง กรุณาบันทึกข้อมูล')</script>";
						print "<SCRIPT>window.location='copyjob.php?SerID=\"$serID\"'</SCRIPT>";
						exit();
	}
	
						
						$sqlser="insert into service (Datejob,Timejob,TelID,Detail,Location,Navser,Namecus,saveDate,staID,userid,notation,update_Time) 
							values ('$newdate',
							'".$_POST["textTimejob"]."',
							'".$_POST["textTeamname"]."',
							'".$_POST["textDetail"]."',
							'".$_POST["textLocation"]."',
							'".$_POST["textNavser"]."',
							'".$_POST["textNamecus"]."',
							'".DateThai($strDate)."',
							'".$_POST["staID"]."',
							'".$_SESSION["userid"]."',
							'".$_POST["textNotation"]."',
							'".DateThai($strDate)."')";
							$queryser=mysql_query($sqlser);

						print "<SCRIPT>alert('เสร็จสิ้นการทำสำเนาข้อมูล')</SCRIPT>";
														if($_SESSION["sendDay"] ==""){
						print "<SCRIPT>window.location='index.php'</SCRIPT>";
						}else{
						print "<SCRIPT>window.location='index.php?pickday=".$_SESSION["sendDay"]."'</SCRIPT>";
					}
							
									
?>
</body>
</html>



