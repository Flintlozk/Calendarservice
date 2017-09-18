    <table width="100%"  class="tableindex" border="0" align="center">
      <tr>
      <? if($_SESSION["status"] == "user"){ ?>
        <th scope="col">
            <div align='left' class="left2">
            	 &nbsp;&nbsp;<a href="index.php"><span class="glyphicon glyphicon-home"></span> หน้าแรก</a>
            </div>
            <div align='center' class="center2">
            	<font color="#000">Calendar Service</font>
            </div>
			<div align='right' class="right2">
            	User:&nbsp;<? echo $_SESSION["textuser"]?> 
				                
                <a href="team.php"><span class="glyphicon glyphicon-user"></span>จัดการทีม </a>/
                <a href="report.php">รายงาน </a>/
				&nbsp;<a href="Logoff.php"><u>Logout</u></a>&nbsp;&nbsp;&nbsp;
			</div>
        </th>
          <? } else if($_SESSION["status"] == "admin"){?>
		<th scope="col">
        	<div align='left' class="left2">
            	 &nbsp;&nbsp;<a href="index.php"><span class="glyphicon glyphicon-home"></span> หน้าแรก</a>
            </div>
            <div align='center' class="center2">
            	<font color="#000">Calendar Service</font>
            </div>
			<div align='right' class="right2">
            	User:&nbsp;<? echo $_SESSION["textuser"]?> 
				                
                <a href="team.php"><span class="glyphicon glyphicon-user"></span>จัดการทีม </a>/
                <a href="report.php"><span class="glyphicon glyphicon-file"></span>รายงาน </a>/
				&nbsp;<a href="Logoff.php"><u>Logout</u></a>&nbsp;&nbsp;&nbsp;
			</div>
		</th>
       <? }?>
      </tr>
	</table>
    
    
