<?php
include("config.php");
if(isset($_POST['bvnCheck']))
{
$Q = mysqli_query($db,"SELECT bvn FROM `domesticstaff` WHERE `bvn`= '$_POST[bvnCheck]'") or die(mysqli_error($db));
$rowCount = mysqli_num_rows($Q);
if($rowCount)
{
echo "BVN Found";
}
}
if(isset($_POST['pnumCheck']))
{
$P = mysqli_real_escape_string($db,$_POST['pnumCheck']);
$Q = mysqli_query($db,"SELECT staffID FROM `domesticstaff` WHERE `phone_numbers` like '%$P%'") or die(mysqli_error($db));
if(!mysqli_num_rows($Q))
{
echo "Phone Number Not Found";
}
else{
echo "Phone Number Found";
}
}
function resendotp($otp)
{
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "8181",
  CURLOPT_URL => "https://prod1flutterwave.co:8181/pwc/rest/bvn/resendotp/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_SSL_VERIFYPEER => FALSE,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"validateoption\": \"rzxpC+REyHU=\",\n  \"merchantid\": \"lk_B1omgnaEj8\",\n  \"transactionreference\": \"$otp\"\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
$Q = json_decode($response,true);
var_dump($Q);
}
curl_close($curl);
}

if(isset($_REQUEST['resendotp']))
{
resendotp(urldecode($_REQUEST['resendotp']));
}
?>