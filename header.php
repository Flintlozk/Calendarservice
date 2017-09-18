<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>SGD Calendar Service</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/Stylesheet.css" />
    
		<link type="text/css" rel="stylesheet" href="css/base/jquery-ui-1.9.2.custom.css" />
		<link type="text/css" rel="stylesheet" href="css/base/jquery-ui-1.9.2.custom.min.css" />
        
        <link rel="stylesheet" href="css/dataTables/dataTables.css" />
		<link rel="stylesheet" href="css/dataTables/dataTables_themeroller.css" />
 
		<script src="js/1.8.3/jquery.min.js"></script> 
        <script type="text/javascript" src="js/1.9.4/jquery.dataTables.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>  
        <script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay1 = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);
			var toDay2 = (d.getFullYear() + 543) + '/' + (d.getMonth() + 1) + '/' + d.getDate();
			var toDay3 = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);
			var $hiddenInput = $('#hiddenFieldID');
			
		    $("#datepicker-th1").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay1, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']}
			  );
			
			$("#datepicker-th2").datepicker({ dateFormat: 'yy-mm-dd', isBuddhist: true, defaultDate: toDay2, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
     		$("#datepicker-th3").datepicker({ dateFormat: 'yy/mm/dd', isBuddhist: true, defaultDate: toDay3,  inline: true});
			/*$("#datepicker-th3").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay3, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'],inline: true ,
			  onSelect : function(){$('#send_Get').submit();}
			});*/
			  			
			$("#datepicker-en").datepicker({ dateFormat: 'dd/mm/yy'});
		    $("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });
			});
		</script>
        <script>
			$(function() {
  		 	$("#datepicker-th3").change(function() {
     			$("#get_calendar").submit();
   			});
 		});
		</script>
        <script>
function hideshow() {
    var x = document.getElementById('left');
	var y = document.getElementById('right');
    if (x.style.display === 'none') {
        x.style.display = 'block';
		y.style.width = '80%';
    } else {
        x.style.display = 'none';
		y.style.width = '100%';
    }
}
</script>

