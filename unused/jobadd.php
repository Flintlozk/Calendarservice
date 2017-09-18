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
<title>sgd service</title>
</head>

<body >
<table width="1000" border="0" align="center">
  <tr>
    <th height="10" scope="col"><div align="right">
      <?php require_once('foot.php'); ?>
    </div></th>
  </tr>
  <tr>
    <th height="111" scope="col"><?php require_once('main.php'); ?></th>
  </tr>
  <tr>
    <td><?php require_once('menu.php'); ?></td>
  </tr>
  <tr>
    <td>
    <table width="1000" border="1" >
  <tr>
    <td bgcolor="#313A3A" align="center"><font size="6" color="#FFFFFF">&nbsp;Calendar Service</font></td>
  </tr>
  <tr>
    <td bgcolor="#727272" align="center" ><a href="computerall.php" class="btn btn-default" role="button" ><strong>สร้างงาน</strong></a></button>&nbsp;</a></td>
    
  </tr>
        
      <table width="1000" align="center" border="1" bordercolor="#C1ECFF">
        <tr>
  <td bgcolor="#337AB7" width="50"><div align="center"><strong><font color="#FFFFFF">ลำดับ</font></strong></div></td>
  <td bgcolor="#337AB7" width="100"><div align="center"><strong><font color="#FFFFFF">JobNumber</font></strong></div></td>
  <td bgcolor="#337AB7" width="150"><div align="center"><strong><font color="#FFFFFF">ชื่อลูกค้า/รหัสลูกค้า</strong></font></div></td>
  <td bgcolor="#337AB7" width="300"><div align="center"><strong><font color="#FFFFFF">รายละเอียด/ทีมช่าง</strong></font></div></td>
  <td bgcolor="#337AB7" width="150"><div align="center"><strong><font color="#FFFFFF">วันที่เข้างาน</font></strong></div></td>
  <td bgcolor="#337AB7" width="150"><div align="center"><strong><font color="#FFFFFF">แก้ไข</strong></font></div></td>
  <td bgcolor="#337AB7" width="150"><div align="center"><strong><font color="#FFFFFF">date</strong></font></div></td>  
  <td bgcolor="#337AB7" width="100"><div align="center"><strong><font color="#FFFFFF">Status</strong></font></div></td>
        </tr>
  <td><div align="center">&nbsp;</div></td>
  <td><div align="center">&nbsp;</div></td>
  <td><div align="center">&nbsp;</div></td>
  <td><div align="center">&nbsp;</div></td>
  <td><div align="center">&nbsp;</div></td>
  <td><div align="center">&nbsp;</div></td>
  <td><div align="center">&nbsp;</div></td>
  <td><div align="center">&nbsp;</div></td>
  <td><div align="center">&nbsp;</div></td>
  
      </table>
</table>
<td>
</td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>

</body>
</html>
