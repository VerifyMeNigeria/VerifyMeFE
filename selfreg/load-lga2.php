<?php
include('config.php');
if ( ($_POST['value3']) != '0') {
    
	 $sql = "SELECT * FROM lga WHERE STATE_ID = '$_POST[value3]' ORDER BY LGA_ID asc";
	$sql_result = mysqli_query ($db,$sql) or die ('request "Could not execute SQL query" '.$sql);
$rows = array();
while($row = mysqli_fetch_array($sql_result))
    $rows[] = $row;


    // iterate over your results and create HTML output here
    echo "<option value=''>-select-</option>";
    // return HTML option output
	foreach($rows as $row){ 
	$id = $row['LGA_ID'];
	$lga = $row['LGA'];
    echo "<option value='$id'>$lga</option>";
	}
    
}

die('error');
?>