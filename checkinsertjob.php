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
	/*echo $_POST["textNamecus"];
	echo $_POST["textNavser"];
	echo $_POST["textLocation"];
	echo $_POST["textDetail"];
	
	//3 ตัวแปรด้านล่าง มาจากสถานะ admin
	echo $_POST["textDate"];
	echo $_POST["textTimejob"];
	echo $_POST["textTelID"];*/
	
			if($_POST["textDate"] != "" && $_POST["textTelID"] != ""){
							$statuschange = "1";
						}else {
							$statuschange = "0";
						}
						
						//echo $statuschange;
			
			
			$date = explode("/",$_POST["textDate"]); // dd/mm/yy
			$newdate = $date[2]."-".$date[1]."-".$date[0];
			
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
							
			$strMID="select * from admin where 1=1 and user='".$_SESSION["textuser"]."'";
			$queryM = mysql_query($strMID);
			$Member= mysql_fetch_array($queryM);
			$user =$Member["userid"];
					

			echo $sqlser="insert into service (Datejob,Timejob,Namecus,Detail,Navser,Location,TelID,notation,update_Time,saveDate,staID,userid) 
							values ('$newdate',
							'".$_POST["textTimejob"]."',
							'".$_POST["textNamecus"]."',
							'".$_POST["textDetail"]."',
							'".$_POST["textNavser"]."',
							'".$_POST["textLocation"]."',
							'".$_POST["textTelID"]."',
							'".$_POST["textNotation"]."',
							'".DateThai($strDate)."',
							'".DateThai($strDate)."',
							'".$statuschange."',
							'".$_SESSION["userid"]."')";
							
							$queryser=mysql_query($sqlser);

			
			print "<SCRIPT>alert('เสร็จเรียบร้อย')</SCRIPT>";
											if($_SESSION["sendDay"] ==""){
						print "<SCRIPT>window.location='index.php'</SCRIPT>";
						}else{
						print "<SCRIPT>window.location='index.php?pickday=".$_SESSION["sendDay"]."'</SCRIPT>";
					}

?>
</body>
</html>
