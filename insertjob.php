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
<body >
	<? date_default_timezone_set("Asia/Bangkok"); ?>
    
<!--------------------------------- Main Menu ----------------------------------------------->
	<?php include 'mainmenu.php';?>
<!--------------------------------- Main Menu ----------------------------------------------->
<div class="contrainer">    
<br>

<form id="form1" name="form1" method="post" action="checkinsertjob.php">
  
      <?  	
			$tel = "SELECT * FROM team WHERE TelID = '4'";
			$result = mysql_query($tel) or die(mysql_error());
			if($result){
				echo $result["TelID"];
				echo $result["Teamname"];
				echo $result["Teamcolor"];
				}?>

<table class="tableindex" name='table1' border='0' align='center'>
    <tr>
		<td colspan="2">
            <div align="center">
                <font size="6">
                	<strong>สร้างงาน</strong>
                </font>
             </div>
		</td>
	</tr>

    <tr>
		<td align='right'>
        	วันที่ขอเข้างาน:
		</td>
		<td>
      		<input class="indexinput" type="text" id="datepicker-th1" name="textDate" size="30" autocomplete="off" />					
		</td>
    <tr>
    	<td align='right'>
        	เวลาที่ขอเข้างาน:
        </td>
    	<td><select class="indexinput"  name="textTimejob" value="" >
            	<option value="" >--เลือกเวลา--</option>
        		<option value="00:00:00">00.00</option>
                <option value="00:30:00">00.30</option>
                <option value="01:00:00">01.00</option>
                <option value="01:30:00">01.30</option>
                <option value="02:00:00">02.00</option>
                <option value="02:30:00">02.30</option>
                <option value="03:00:00">03.00</option>
                <option value="03:30:00">03.30</option>
                <option value="04:00:00">04.00</option>
                <option value="04:30:00">04.30</option>
                <option value="05:00:00">05.00</option>
                <option value="05:30:00">05.30</option>
                <option value="06:00:00">06.00</option>
                <option value="06:30:00">06.30</option>
                <option value="07:00:00">07.00</option>
                <option value="07:30:00">07.30</option>
                <option value="08:00:00">08.00</option>
                <option value="08:30:00">08.30</option>
                <option value="09:00:00">09.00</option>
                <option value="09:30:00">09.30</option>
                <option value="10:00:00">10.00</option>
                <option value="10:30:00">10.30</option>
                <option value="11:00:00">11.00</option>
                <option value="11:30:00">11.30</option>
                <option value="12:00:00">12.00</option>
                <option value="12:30:00">12.30</option>
                <option value="13:00:00">13.00</option>
                <option value="13:30:00">13.30</option>
                <option value="14:00:00">14.00</option>
                <option value="14:30:00">14.30</option>
                <option value="15:00:00">15.00</option>
                <option value="15:30:00">15.30</option>
                <option value="16:00:00">16.00</option>
                <option value="16:30:00">16.30</option>
                <option value="17:00:00">17.00</option>
                <option value="17:30:00">17.30</option>
                <option value="18:00:00">18.00</option>
                <option value="18:30:00">18.30</option>
                <option value="19:00:00">19.00</option>
                <option value="19:30:00">19.30</option>
                <option value="20:00:00">20.00</option>
                <option value="20:30:00">20.30</option>
                <option value="21:00:00">21.00</option>
                <option value="21:30:00">21.30</option>
                <option value="22:00:00">22.00</option>
                <option value="22:30:00">22.30</option>
                <option value="23:00:00">23.00</option>
                <option value="23:30:00">23.30</option>
            </select>
		</td>
	</tr>
	<tr>
		<td align='right'>
        	ทีมช่าง:
		</td>
		<td><select  class="indexinput" name="textTelID" id="select">
          <option value="" >--เลือกทีม--</option>
        <?
            $sql_group = "select * from team order by TelID asc";
            $dbquery_group = mysql_query($sql_group);
            $num_rows_group = mysql_num_rows($dbquery_group);
            while ($result = mysql_fetch_array($dbquery_group))
                {
                    if($_POST["TelID"] == $result["TelID"]){
                        $sel="selected";
                        }else{
                            $sel="";
                            }
        ?>					
          <option value="<?=$result["TelID"];?>"><?=$result["Teamname"];?></option> 
	<? }?>
    </select>
    	</td>
    </tr>
        <tr><td> </td></tr>
        <tr>
      	<td align='right'>
      		ชื่อลูกค้า:
		</td>
      	<td>
      		<input class="indexinput" type="text" name="textNamecus" required/>
		</td>
        <td>
        	<font color="red">*</font>
        </td>
    </tr>
    <tr>
		<td align='right'>
        	รหัสลูกค้า:
		</td>
      	<td>
      		<input class="indexinput" type="text" name="textNavser" required/>
      	</td>
        <td>
        	<font color="red">*</font>
        </td> 
    </tr>
	<tr>
		<td align='right'>
      		สถานที่:
		</td>
		<td>
      		<input class="indexinput" type="text" name="textLocation" required/>
		</td>
        <td>
        	<font color="red">*</font>
        </td>
    </tr>
        <tr>
		<td align='right' >หมายเหตุ:</td>
		<td ><input class="indexinput" type="text" name="textNotation" value="" required/></td>
        <td>
        	<font color="red">*</font>
        </td>
	</tr>
    <tr>
		<td align='right' valign="top">รายละเอียดหน้างาน:</td>
		<td ><textarea class="indexinput" name="textDetail" cols="100%" rows="20" required></textarea></td>
        <td valign="top">
        	<font color="red">*</font>
        </td>
	</tr>
	<tr>
		<td colspan="2"  align="center">
			<input type="submit" class="btn btn-default" name="button" id="button" onClick="return confirm('ยืนยันการบันทึก')" value="ตกลง" />
		</td>
	</tr>
</table>

</div>
</body>
</html>
