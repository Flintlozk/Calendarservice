<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SGD SERVICE</title>
<link rel="shortcut icon" href="images/icon.ico" type="image/x-icon">
<link rel="icon" href="images/itsuppp.ico" type="image/x-icon">
</head>

<body>
<?
$host = "localhost";
$user = "root"; 
$passwd = "1234"; 
$dbname = "calendarservice";
mysql_connect($host,$user,$passwd) or die("ติดต่อ Host ไม่ได้");
mysql_select_db($dbname) or die("ติดต่อฐานข้อมูลไม่ได้");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
?>
</body>
</html>
