<?
ob_start();
session_start();
require("connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/Stylesheet.css" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style3 {
	font-size: 36px;
	font-weight: bold;
}
-->
</style>
</head>


<form  name="form1" method="post" action="checklogin.php">
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
<br />

  <div align="center">  
    <table width="350px" class="loginform" align="center" cellpadding="0" cellspacing="0">
    	<tr>
            <td colspan="2">
                <div class="info">
                    <img src="./images/Service.png" width="310px" align="center" />
                </div>
            </td>
        </tr>
		<tr>
			<td><input class="loginbutton" type="text" name="textuser" placeholder="ชื่อผู้ใช้งาน" /></td>
		</tr>
      	<tr>
      		<td><input class="loginbutton" type="password" name="textpasswd" placeholder="รหัสผ่าน"/></td>
		</tr>
      	<tr>
        	<td>
                <div align="center">
                  <input class="submitbutton" type="submit" name="button" id="button" value="OK" />
                </div>
			</td>
      	</tr>
        <tr>
            <td colspan='2'>
                <div align="center"><a class="alogin" href="register.php">ลงทะเบียน</a></div>
            </td>
        </tr>
      </table>
  </div>
</form>   
 <br>
 <br>
  <br>
  <br>
   <br>
   <br>
   <br>
  
 </fieldset>
 
</body>
</html>
