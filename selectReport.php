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
include_once('reportHeader.php');
require("connect.php");
?>
<body >
	<? date_default_timezone_set("Asia/Bangkok"); ?>
    
<!--------------------------------- Main Menu ----------------------------------------------->
	<?php include 'mainmenu.php';?>
<!--------------------------------- Main Menu ----------------------------------------------->
<div class="contrainer">    
<br>

<form id="form1" name="form1" method="post" action="printReport.php">
<div align="center">
	<table>
		<tr>
            <td colspan="4">
                <div align="center">
                    <font size="6">
                        <strong>พิม์รายงาน</strong>
                    </font>
                 </div>
            </td>
        </tr>
		<tr><td> </td></tr>
		<tr><td> </td></tr>
        <tr>
        	<td align="right">
            	เลือกวันที่: 
            </td>
            <td colspan="3">
                <input type="text" class="indexinput" name="singleDate" id="datepicker-th1" value="">
            </td>
        </tr>
        <tr>
        	<td>
             
            </td>
        </tr>
        <tr>
        	<td align="right">
        		เลือกวันที่ระหว่าง: 
            </td>
            <td>    
            	<input type="text" class="indexinput" name="betweenDate_1" id="datepicker-th2" value="">
            </td>
            <td>
            	 ถึง 
            </td>
            <td>
        		<input type="text" class="indexinput" name="betweenDate_2"  id="datepicker-th3" value="">
            </td>
        </tr>
        <tr >
            <td colspan="4">
                <div class="info">
                    <font size="-1" color="red">** หากไม่เลือกวันที่ระบบจะทำการพิมพ์ข้อมูลทั้งหมด **</font>
                </div>
            </td>
        </tr>
		<tr><td> </td></tr>
        <tr>
        	<td align="center" colspan="4">
            	<input class="btn btn-default" type="submit" name="button1" id="button1" value="ตกลง" />
            </td>
        </tr>
    </table>
</div>
</form>
</div>
</body>
</html>
