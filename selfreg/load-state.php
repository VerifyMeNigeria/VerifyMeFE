<?php
include('config.php');
if ( ($_POST['value']) == 'NG') {
    // query for options based on value
    $sql = 'SELECT * FROM states ORDER BY STATE_ID asc';
	$sql_result = mysqli_query ($db,$sql) or die ('request "Could not execute SQL query" '.$sql);
$rows = array();
while($row = mysqli_fetch_array($sql_result))
    $rows[] = $row;


    // iterate over your results and create HTML output here
    echo "<option value=''>-select-</option>";
    // return HTML option output
	foreach($rows as $row){ 
	$id = $row['STATE_ID'];
	$state = $row['STATE'];
    echo "<option value='$id'>$state</option>";
	}
    
}
else
{
	echo "<option value='0'>Not Applicable</option>";
}




die('error');
?>