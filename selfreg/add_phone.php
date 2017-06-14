<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Verify Workers</title>

</head>
<body style="background-color:#F1F2F7 !important">
<h3>Add Phone Number</h3>
<input type="text"  data-inputmask="'mask':'+2349999999999'" class="form-control mask" id="pnu" name="pnu" required maxlength="14" />
<input type="button" class="btn btn-send" value="Add" name="add" onclick="pass(this)"/>
<div id="error"></div>
</body>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script type="text/javascript" src="files/jquery.js"></script> <!-- Include all compiled plugins (below), or include individual files as needed --> 
<script type="text/javascript" src="files/demo-mask.js"></script> 
<script type="text/javascript" src="files/jquery.inputmask.min.js"></script>
<script type="text/javascript">

function pass(text) { 
   var text = $('#pnu').val();
			if(text.length == 14)
			{
   <?php
   if($_REQUEST['u'] == 'w')
   {
	   ?>
  window.opener.document.getElementById('pnum').value += text+', ';
  <?php
   }
   if($_REQUEST['u'] == 'e')
   {
	 ?>	 
   window.opener.document.getElementById('empnum').value += text+', ';
	 <?php  
   }
   ?>
  window.close();
}
else{
$("#error").html("Invalid Phone Number.");
}
}
</script>
</html>