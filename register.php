<?
require("connect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="css/Stylesheet.css" />

</head>

<body>
<form id="form1" name="form1" method="post" action="insertuser.php">
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
  
    <table class="loginform" align="center">
      <tr>
        <td colspan="2"><div align="center"><p><b>Registation</b></p></div></td>
      </tr>
      <tr>
        <td>ชื่อผู้ใช้งาน</td>
        <td><input class="regisbutton" type="text" name="reg_username" placeholder="ชื่อผู้ใช้งาน" required/>
        <input type="hidden" name="reg_status" value="user"/></td>
      </tr>
      <tr>
        <td>รหัสผ่าน</td>
        <td><input class="regisbutton" type="password" name="reg_passwd" placeholder="รหัสผ่าน" required/></td>
      </tr>
      <tr>
        <td colspan="2">
        	<div align="center">
            	<input class="submitbutton" type="submit" name="button" id="button" value="ลงทะเบียน" />
            </div>
         </td>
      </tr>
    </table>
<br />

</body>
</html>