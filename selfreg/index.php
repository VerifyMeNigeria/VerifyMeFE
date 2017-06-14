<?php
// Inialize session
session_start();
include( 'config.php' );
?>
<!DOCTYPE>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->

<!-- Specific Page Data -->
<!-- End of Data -->

<head>
	<meta charset="utf-8"/>
	<title>Verify Workers</title>
	<meta name="description" content="Verify Workers is a platform where employers have access to a searchable database of all registered workers, and can verify the employment history and identity of current, newly hired, and potential workers. "/>
	<meta name="keywords" content="employee, employer, hire, hiring, human resource management, hr, online workers management, company, worker, career, recruiting, recruitment, verify, verify workers,"/>
	<meta name="author" content="VerifyMeNigeria">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Fav and Touch Icons -->

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#106200">


	<!-- CSS -->

	<!-- Bootstrap & FontAwesome & Entypo CSS -->
	<link href="files/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="files/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!--[if IE 7]><link type="text/css" rel="stylesheet" href="files/font-awesome-ie7.min.css"><![endif]-->
	<link href="files/font-entypo.css" rel="stylesheet" type="text/css">

	<!-- Fonts CSS -->
	<link href="files/fonts.css" rel="stylesheet" type="text/css">

	<!-- Plugin CSS -->
	<link href="files/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">
	<link href="files/isotope.css" rel="stylesheet" type="text/css">
	<link href="files/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">
	<link href="files/prettify.css" rel="stylesheet" type="text/css">


	<link href="files/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
	<link href="files/jquery.tagsinput.css" rel="stylesheet" type="text/css">
	<link href="files/bootstrap-switch.css" rel="stylesheet" type="text/css">
	<link href="files/daterangepicker-bs3.css" rel="stylesheet" type="text/css">
	<link href="files/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">

	<!-- Specific CSS -->
	<link rel="stylesheet" type="text/css" media="screen" href="files/smartadmin-production-plugins.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="files/smartadmin-production.min.css">

	<!-- Theme CSS -->
	<link href="files/theme.min.css" rel="stylesheet" type="text/css">
	<!--[if IE]> <link href="files/ie.css" rel="stylesheet" > <![endif]-->
	<link href="files/chrome.css" rel="stylesheet" type="text/chrome">
	<!-- chrome only css -->



	<!-- Responsive CSS -->
	<link href="files/theme-responsive.min.css" rel="stylesheet" type="text/css">




	<!-- for specific page in style css -->

	<!-- for specific page responsive in style css -->

	<!-- Head SCRIPTS -->
	<script type="text/javascript" src="files/modernizr.js"></script>
	<script type="text/javascript" src="files/mobile-detect.min.js"></script>
	<script type="text/javascript" src="files/mobile-detect-modernizr.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script type="text/javascript" src="files/html5shiv.js"></script>
      <script type="text/javascript" src="files/respond.min.js"></script>     
    <![endif]-->

</head>

<body id="forms" class="full-layout responsive nav-right-hide nav-right-start-hide nav-left-hide nav-left-start-hide clearfix" data-active="forms " data-smooth-scrolling="1">
	<div class="vd_body">

		<div class="content">
			<div class="container">
				<?php
				do {
					$a = implode( '-', str_split( rand( 10000, 99999 ), 3 ) );
					$b = "-";
					$c = rand( 1000, 9999 );
					$SID = $a . $b . $c;
					$Q = mysqli_query( $db, "SELECT staffID FROM domesticstaff WHERE staffID = '$SID'" )or die( mysqli_error( $db ) );
				}
				while ( mysqli_num_rows( $Q ) > 0 );
				$QW = mysqli_query( $db, "INSERT INTO domesticstaff (staffID) VALUE ('$SID')" )or die( mysqli_error( $db ) );
				$_SESSION[ 'staffID' ] = $SID;
				$TR = "";
				?>

				<div class="vd_content-wrapper">
					<div class="vd_container">
						<div class="vd_content clearfix">
							<div class="vd_content-section clearfix">

								<div class="row">
									<div class="col-md-12">
										<div class="panel widget">
											<div class="panel-heading vd_bd-white">
												<center>
								<img src="files/logo-1.png" class="img-responsive image">
								<h1 class="no-padding">Workers Self Registration</h1>
								<small class="subtitle no-padding">Fill out all required fields.</small> 
								</center>
											</div>
											<div class="panel-body">
												<?php
												if ( isset( $_POST[ 'done' ] ) ) {
													$_SESSION[ 'suffix' ] = $_POST[ 'suffix' ];
													$_SESSION[ 'fname' ] = $_POST[ 'fname' ];
													$_SESSION[ 'mname' ] = $_POST[ 'mname' ];
													$_SESSION[ 'lname' ] = $_POST[ 'lname' ];
													$_SESSION[ 'mdname' ] = $_POST[ 'mdname' ];
													$_SESSION[ 'alias' ] = $_POST[ 'alias' ];
													$_SESSION[ 'dob' ] = $_POST[ 'dob' ];
													$_SESSION[ 'gender' ] = $_POST[ 'gender' ];
													$_SESSION[ 'email' ] = $_POST[ 'email' ];
													$_SESSION[ 'pnum' ] = $_POST[ 'pnum' ];
													$_SESSION[ 'occupation' ] = $_POST[ 'occupation' ];
													$_SESSION[ 'address' ] = strtoupper( $_POST[ 'addre' ] . " " . $_POST[ 'addre2' ] . " " . $_POST[ 'addre3' ] );
													$_SESSION[ 'latlong' ] = $_POST[ 'latlong' ];
													$_SESSION[ 'idtype' ] = $_POST[ 'idtype' ];
													$_SESSION[ 'idnum' ] = $_POST[ 'idnum' ];
													$_SESSION[ 'bvn' ] = $_POST[ 'bvn' ];
													$_SESSION[ 'police' ] = $_POST[ 'police' ];
													$_SESSION[ 'nation' ] = $_POST[ 'nation' ];
													$_SESSION[ 'state' ] = $_POST[ 'state' ];
													$_SESSION[ 'lga' ] = $_POST[ 'lga' ];
													$_SESSION[ 'mstat' ] = $_POST[ 'mstat' ];
													$_SESSION[ 'spname' ] = $_POST[ 'spname' ];
													$_SESSION[ 'nchild' ] = $_POST[ 'nchild' ];
													$_SESSION[ 'educa' ] = $_POST[ 'educa' ];
													$_SESSION[ 'eye' ] = $_POST[ 'eye' ];
													$_SESSION[ 'hair' ] = $_POST[ 'hair' ];
													$_SESSION[ 'height' ] = $_POST[ 'height' ];
													$_SESSION[ 'imgupload' ] = base64_encode( file_get_contents( $_FILES[ 'imgupload' ][ 'tmp_name' ] ) );
													$_SESSION[ 'nokname' ] = $_POST[ 'nokname' ];
													$_SESSION[ 'grntname' ] = $_POST[ 'grntname' ];
													$_SESSION[ 'nokrel' ] = $_POST[ 'nokrel' ];
													$_SESSION[ 'grntadd' ] = $_POST[ 'grntadd' ];
													$_SESSION[ 'nokpnum' ] = $_POST[ 'nokpnum' ];
													$_SESSION[ 'grntpnum' ] = $_POST[ 'grntpnum' ];
													$_SESSION[ 'nokemail' ] = $_POST[ 'nokemail' ];
													$_SESSION[ 'grntemail' ] = $_POST[ 'grntemail' ];

													$bvn = encrypt( $_POST[ 'bvn' ], 'lk_jCJxuI2NQ93kRWX4fGzo' );
													$curl = curl_init();

													curl_setopt_array( $curl, array(
														CURLOPT_PORT => "8181",
														CURLOPT_URL => "https://prod1flutterwave.co:8181/pwc/rest/bvn/verify/",
														CURLOPT_RETURNTRANSFER => true,
														CURLOPT_ENCODING => "",
														CURLOPT_MAXREDIRS => 10,
														CURLOPT_TIMEOUT => 30,
														CURLOPT_SSL_VERIFYPEER => FALSE,
														CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
														CURLOPT_CUSTOMREQUEST => "POST",
														CURLOPT_POSTFIELDS => "{\r\n\t\"otpoption\": \"rzxpC+REyHU=\",\r\n\t\"merchantid\": \"lk_B1omgnaEj8\",\r\n\t\"bvn\": \"$bvn\"\r\n}",
														CURLOPT_HTTPHEADER => array(
															"cache-control: no-cache",
															"content-type: application/json"
														),
													) );

													$response = curl_exec( $curl );
													$err = curl_error( $curl );
													if ( $err ) {
														echo "cURL Error #:" . $err;
													} else {
														$R = json_decode( $response, true );
														//var_dump($R);
														if ( $R[ 'data' ][ 'responseMessage' ] == "Successful, pending OTP validation" ) {
															$TR = encrypt( $R[ 'data' ][ 'transactionReference' ], 'lk_jCJxuI2NQ93kRWX4fGzo' );

															?>
												<h2>Enter The Verification Code Sent To Your Mobile Number</h2>
												<form method="post" name="AuthForm" id="AuthForm" action="/register/">
													<div class="form-group">
														<div class="col-sm-16 controls">
															<input type="text" id="authcode" name="authcode" class="input-border-btm required" required placeholder="Verification Code" maxlength="5">
															<input type="hidden" name="trn" value="<?php echo $TR;?>">
															<input type="hidden" name="bv" value="<?php echo($bvn);?>">
														</div>
														<div class="col-sm-6 controls">
															<input type="submit" value="Verify" name="verify" id="verify" class="btn-sm">
														</div>
													</div>

												</form>


												<div class="input-box">
													<br><br>
													<p align="justify">The new NCC Do Not Disturb (DND) policy has taken effect. Please note that if DND is active on your line, you will not be able to receive any message we send to you. To check your status send <strong>STATUS</strong> to 2442.
														<br> To Deactivate DND on your phone,
														<br> 1. First Send <strong>STOP</strong> to 2442 and then
														<br> 2. Send <strong>ALLOW</strong> to 2442
														<br><br> If you still did not receive your Verification Code. <a href="#" id="sendotp">Click Here</a> to resend code.
													</p>
												</div>
												<?php
												} else if ( $R[ 'data' ][ 'responseMessage' ] == "BVN does not exist" ) {
													echo( "<h2>BVN Inputed Does Not Exist.</h2>" );
												}

												}
												curl_close( $curl );



												}
												if ( !isset( $_POST[ 'done' ] ) && !isset( $_POST[ 'authcode' ] ) ) {
													?>
												<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="regForm" action="/register/">
													<div id="wizard-2" class="form-wizard condensed">
														<ul>
															<li>
																<a href="#tab21" data-toggle="tab">
																	<div class="menu-icon"> 1 </div>
																	Basic Info </a>
															</li>
															<li>
																<a href="#tab22" data-toggle="tab">
																	<div class="menu-icon"> 2 </div>
																	Address & Identification </a>
															</li>
															<li>
																<a href="#tab23" data-toggle="tab">
																	<div class="menu-icon"> 3 </div>
																	Family & Personalisation </a>
															</li>
															<li>
																<a href="#tab24" data-toggle="tab">
																	<div class="menu-icon"> 4 </div>
																	Next of Kin/Guarantor </a>
															</li>
															<li>
																<a href="#tab25" data-toggle="tab">
																	<div class="menu-icon"> 5 </div>
																	Terms & Conditions </a>
															</li>
														</ul>
														<div class="progress progress-striped active">
															<div class="progress-bar progress-bar-info"> </div>
														</div>
														<div class="tab-content no-bd pd-25">
															<div class="tab-pane" id="tab21">
																<div class="form-group">
																	<div class="col-sm-3 controls">
																		<label for="imgupload">
																			<figure><i class="fa fa-5x fa-user"></i>
																			</figure> <span></span>
																		</label>
																		<input type="file" required class="inputfile inputfile-4 required" name="imgupload" id="imgupload" accept=".jpg, .png, .bmp|image/*">

																	</div>
																	<div class="form-group">
																		<label class="col-sm-3 control-label">Title</label>
																		<div class="col-sm-3 controls">
																			<select id="suffix" name="suffix" class="input-border-btm required" required>
																				<option value="">-select-</option>
																				<option value="Mr">Mr</option>
																				<option value="Mrs">Mrs</option>
																				<option value="Miss">Miss</option>
																				<option value="Dr">Dr</option>
																				<option value="Pastor">Pastor</option>
																				<option value="Alhaji">Alhaji</option>
																				<option value="Alhaja">Alhaja</option>
																			</select>
																		</div>
																		<label class="col-sm-3 control-label mgtp-15">Gender</label>
																		<div class="col-sm-3 controls mgtp-15">
																			<select id="gender" name="gender" class="input-border-btm required" required>
																				<option value="">-select-</option>
																				<option value="Male">Male</option>
																				<option value="Female">Female</option>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">First Name</label>
																	<div class="col-sm-6 controls">
																		<input type="text" class="input-border-btm required" required name="fname" placeholder="Personal Name">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Middle Name</label>
																	<div class="col-sm-6 controls">
																		<input type="text" class="input-border-btm required" required name="mname" placeholder="Other Name">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Surname</label>
																	<div class="col-sm-6 controls">
																		<input type="text" class="input-border-btm required" required name="lname" placeholder="Family Name">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Maiden Name</label>
																	<div class="col-sm-6 controls">
																		<input type="text" class="input-border-btm" name="mdname" placeholder="Surname before marriage">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Alias</label>
																	<div class="col-sm-6 controls">
																		<input type="text" class="input-border-btm" name="alias" placeholder="Also Known As">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Date of Birth</label>
																	<div class="col-sm-6 controls">
																		<div class="input-group">
																			<input type="text" id="datepicker-restrict" class="input-border-btm required" required name="dob" placeholder="Date of Birth">
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Phone Number</label>
																	<div class="col-sm-6 controls">
																		<input type="text" class="input-border-btm required" required id="pnum" name="pnum" maxlength="11" placeholder="07000000000">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Email Address</label>
																	<div class="col-sm-6 controls">
																		<input type="email" class="input-border-btm" name="email" placeholder="name@example.com">
																	</div>
																</div>

															</div>

															<div class="tab-pane" id="tab22">
																<div class="form-group">
																	<label class="col-sm-4 control-label">Address (Street)</label>
																	<div class="col-sm-6 controls">
																		<input type="text" class="input-border-btm required" required name="addre" id="addre" placeholder="e.g No 2, Example Street">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Address (City)</label>
																	<div class="col-sm-6 controls">
																		<input type="text" class="input-border-btm required" required name="addre2" id="addre2" placeholder="e.g Ikeja">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Address (State)</label>
																	<div class="col-sm-6 controls">
																		<select id="addre3" name="addre3" class="input-border-btm required" required>
																			<option value="">-select-</option>
																			<?php
																			$sql = "SELECT * FROM states ORDER BY STATE_ID asc";
																			$sql_result = mysqli_query( $db, $sql )or die( 'request "Could not execute SQL query" ' . $sql );
																			while ( $row = mysqli_fetch_assoc( $sql_result ) ) {
																				echo "<option value='" . $row[ "STATE" ] . "'>" . $row[ "STATE" ] . "</option>";
																			}

																			?>
																		</select>
																		<input type="hidden" id="latlong" name="latlong">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">BVN</label>
																	<div class="col-sm-6 controls">
																		<input type="text" class="input-border-btm required" required name="bvn" maxlength="11" title="Must be 11 digits" id="bvn">
																		<span class="help-inline"><a href="#" data-toggle="modal" data-target="#myModal">Why is my BVN required?</a></span>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Identification Type</label>
																	<div class="col-sm-6 controls">
																		<select name="idtype" class="input-border-btm">
																			<option value="">-select-</option>
																			<option value="International Passport">International Passport</option>
																			<option value="National ID">National ID</option>
																			<option value="Drivers License">Drivers License</option>
																			<option value="Voters Card">Voters Card</option>
																		</select><input type="text" id="idnum" name="idnum" value="" placeholder="Identification #" class="input-border-btm">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Any Police Records?</label>
																	<div class="col-sm-6 controls">
																		<input type="radio" value="Yes" id="optionsRadios5" name="police" required="required" class="required">
																		<label for="optionsRadios5"> Yes </label>
																		<input type="radio" value="No" id="optionsRadios6" name="police" required="required" class="required">
																		<label for="optionsRadios6"> No </label>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Nationality</label>
																	<div class="col-sm-6 controls">
																		<select id="nation" name="nation" class="input-border-btm required" required>
																			<option value="">-select-</option>
																			<?php
																			$sql = "SELECT * FROM countries ORDER BY country_name asc";
																			$sql_result = mysqli_query( $db, $sql )or die( 'request "Could not execute SQL query" ' . $sql );
																			while ( $row = mysqli_fetch_assoc( $sql_result ) ) {
																				echo "<option value='" . $row[ "country_iso_code" ] . "'>" . $row[ "country_name" ] . "</option>";
																			}

																			?>
																		</select>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">State of Origin</label>
																	<div class="col-sm-6 controls">
																		<select id="state" name="state" class="input-border-btm required" required>
																			<option value="">-select-</option>
																		</select>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">LGA</label>
																	<div class="col-sm-6 controls">
																		<select id="lga" name="lga" class="input-border-btm required" required>
																			<option value="">-select-</option>
																		</select>
																	</div>
																</div>



															</div>

															<div class="tab-pane" id="tab23">
																<div class="form-group">
																	<label class="col-sm-4 control-label">Occupation</label>
																	<div class="col-sm-6 controls">
																		<select id="occupation" name="occupation" class="input-border-btm required" required>
																			<option value="">-select-</option>
																			<?php
																			$sql = "SELECT * FROM occupations ORDER BY Occupation asc";
																			$sql_result = mysqli_query( $db, $sql )or die( 'request "Could not execute SQL query" ' . $sql );
																			while ( $row = mysqli_fetch_assoc( $sql_result ) ) {
																				echo "<option value='" . $row[ "Occupation" ] . "'>" . $row[ "Occupation" ] . "</option>";
																			}

																			?>
																		</select>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Marital Status</label>
																	<div class="col-sm-6 controls">
																		<select name="mstat" class="input-border-btm required" required id="mstat">
																			<option value="">-select-</option>
																			<option value="Single">Single</option>
																			<option value="Married">Married</option>
																			<option value="Widowed">Widowed</option>
																			<option value="Divorced">Divorced</option>
																		</select>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Spouse Name</label>
																	<div class="col-sm-6 controls">
																		<input type="text" id="spname" name="spname" value="" class="input-border-btm" placeholder="Name of Wife/Husband">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Number of Children</label>
																	<div class="col-sm-6 controls">
																		<input type="number" min="0" max="100" step="1" value="0" id="nchild" name="nchild" class="input-border-btm required width-50" required>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Educational Level</label>
																	<div class="col-sm-6 controls">
																		<select id="educa" name="educa" class="input-border-btm required" required>
																			<option value="">-select-</option>
																			<?php
																			$sql = "SELECT * FROM level_of_education ORDER BY educationLvlID asc";
																			$sql_result = mysqli_query( $db, $sql )or die( 'request "Could not execute SQL query" ' . $sql );
																			while ( $row = mysqli_fetch_assoc( $sql_result ) ) {
																				echo "<option value='" . $row[ "educationLvlID" ] . "'>" . $row[ "education_level" ] . "</option>";
																			}

																			?>
																		</select>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Eye Color</label>
																	<div class="col-sm-6 controls">
																		<select id="eye" name="eye" class="input-border-btm required width-50" required>
																			<option value="">-select-</option>
																			<?php
																			$sql = "SELECT * FROM eye_colour ORDER BY colour asc";
																			$sql_result = mysqli_query( $db, $sql )or die( 'request "Could not execute SQL query" ' . $sql );
																			while ( $row = mysqli_fetch_assoc( $sql_result ) ) {
																				echo "<option value='" . $row[ "eyeColourID" ] . "'>" . $row[ "colour" ] . "</option>";
																			}

																			?>
																		</select>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Hair Color</label>
																	<div class="col-sm-6 controls">
																		<select id="hair" name="hair" class="input-border-btm required width-50" required>
																			<option value="">-select-</option>
																			<?php
																			$sql = "SELECT * FROM hair_colours ORDER BY hairColourID asc";
																			$sql_result = mysqli_query( $db, $sql )or die( 'request "Could not execute SQL query" ' . $sql );
																			while ( $row = mysqli_fetch_assoc( $sql_result ) ) {
																				echo "<option value='" . $row[ "hairColourID" ] . "'>" . $row[ "hair_colour" ] . "</option>";
																			}

																			?>
																		</select>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Height (in meters)</label>
																	<div class="col-sm-6 controls">
																		<input type="number" min="0.00" max="1.90" step="0.01" value="0.00" id="height" name="height" class="input-border-btm required width-50" required>
																	</div>
																</div>

															</div>

															<div class="tab-pane" id="tab24">
																<div class="form-group">
																	<label class="col-sm-4 control-label">Next of Kin Fullname</label>
																	<div class="col-sm-6 controls">
																		<input type="text" id="nokname" name="nokname" class="input-border-btm required" required placeholder="Closest Living Relative">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Next of Kin Relationship</label>
																	<div class="col-sm-6 controls">
																		<select id="nokrel" name="nokrel" class="input-border-btm required" required>
																			<option value="">-select-</option>
																			<?php
																			$sql = "SELECT * FROM noktypes ORDER BY NOK asc";
																			$sql_result = mysqli_query( $db, $sql )or die( 'request "Could not execute SQL query" ' . $sql );
																			while ( $row = mysqli_fetch_assoc( $sql_result ) ) {
																				echo "<option value='" . $row[ "nokTypeID" ] . "'>" . $row[ "NOK" ] . "</option>";
																			}
																			?>
																		</select>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Next of Kin's Phone Number(s)</label>
																	<div class="col-sm-6 controls">
																		<input type="text" id="nokpnum" name="nokpnum" value="" placeholder="08021111111, 07031111111" class="input-border-btm required" required>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Next of Kin's Email</label>
																	<div class="col-sm-6 controls">
																		<input type="email" id="nokemail" name="nokemail" class="input-border-btm" placeholder="Email of Next of Kin">
																	</div>
																</div>
																<hr>
																<h4>Guarantor Details</h4>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Guarantor's Full Name</label>
																	<div class="col-sm-6 controls">
																		<input type="text" id="grntname" name="grntname" class="input-border-btm required" required placeholder="">
																	</div>
																</div>

																<div class="form-group">
																	<label class="col-sm-4 control-label">Guarantor's Address</label>
																	<div class="col-sm-6 controls">
																		<input type="text" id="grntadd" name="grntadd" class="input-border-btm required" required>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Guarantor's Phone Number(s)</label>
																	<div class="col-sm-6 controls">
																		<input type="text" id="grntpnum" name="grntpnum" value="" placeholder="08021111111, 07031111111" class="input-border-btm required" required>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Guarantor's Email</label>
																	<div class="col-sm-6 controls">
																		<input type="email" id="grntemail" name="grntemail" class="input-border-btm">
																		<input type="hidden" name="done">
																	</div>
																</div>

															</div>
															
															<div class="tab-pane" id="tab25">
															<div class="panel widget light-widget width-100">
               <div class="panel-heading no-title">
               </div>
                  <div class="panel-body-list">
																		<h2 class="pd-15 mgtp--5">Terms & Conditions</h2>
                    <div class="content-list content-image menu-action-right">
                      <div data-rel="scroll" class="mCustomScrollbar _mCS_6" style="overflow: hidden;">
																						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
																						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                      </div></div></div>
                      
                    </div>
																<div class="form-group mgtp-10">
                            <div class="checkbox-success">
                            <input type="checkbox" value="1" id="checkbox_1" required name="checkbox_1">
                            <label for="checkbox_1"> I have read and understand the terms & conditions </label>
                          </div>
                          </div>
																<div class="form-group">
                            <div class="checkbox-success">
                            <input type="checkbox" value="1" id="checkbox_2" required name="checkbox_2">
                            <label for="checkbox_2"> I also confirm that the details provided are correct</label>
                          </div>
                          </div>
															</div>

															<div class="form-actions-condensed wizard">
																<div class="row mgbt-xs-0">
																<div class="col-sm-9"> <a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a> <a class="btn vd_btn next" href="javascript:void(0);" id="send_btn">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a> <a id="wait"> Validating Please Wait...</a> <a class="btn vd_btn vd_bg-green finish" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Finish</a></div>
																</div>
															</div>
														</div>
													</div>
												</form>
												<?php
												}
												if ( isset( $_POST[ 'authcode' ] ) ) {
													$trn = $_POST[ 'trn' ];
													$otp = encrypt( $_POST[ 'authcode' ], 'lk_jCJxuI2NQ93kRWX4fGzo' );
													$bv = $_POST[ 'bv' ];
													$curl1 = curl_init();

													curl_setopt_array( $curl1, array(
														CURLOPT_PORT => "8181",
														CURLOPT_URL => "https://prod1flutterwave.co:8181/pwc/rest/bvn/validate/",
														CURLOPT_RETURNTRANSFER => true,
														CURLOPT_ENCODING => "",
														CURLOPT_MAXREDIRS => 10,
														CURLOPT_TIMEOUT => 30,
														CURLOPT_SSL_VERIFYPEER => FALSE,
														CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
														CURLOPT_CUSTOMREQUEST => "POST",
														CURLOPT_POSTFIELDS => "{\r\n\t\"otp\": \"$otp\",\r\n\t\"transactionreference\": \"$trn\",\r\n\t\"merchantid\": \"lk_B1omgnaEj8\",\r\n\t\"bvn\": \"$bv\"\r\n}",
														CURLOPT_HTTPHEADER => array(
															"cache-control: no-cache",
															"content-type: application/json"
														),
													) );

													$response1 = curl_exec( $curl1 );
													$err1 = curl_error( $curl1 );

													curl_close( $curl1 );

													if ( $err1 ) {
														echo "cURL Error #:" . $err1;
													} else {
														$Q = json_decode( $response1, true );
														//var_dump($Q);
														$out = substr( $_SESSION[ 'pnum' ], -10 );
														$PN = "0" . $out;
														if ( $Q[ 'data' ][ 'responseMessage' ] == "Invalid OTP!FALSE" ) {
															echo( "<h2>Invalid OTP entered.</h2>" );
														} else {
															if ( $Q[ 'data' ][ 'firstName' ] == strtoupper( $_SESSION[ 'fname' ] ) && $Q[ 'data' ][ 'lastName' ] == strtoupper( $_SESSION[ 'lname' ] ) && $Q[ 'data' ][ 'phoneNumber' ] == $PN && strtotime( $Q[ 'data' ][ 'dateOfBirth' ] ) == strtotime( $_SESSION[ 'dob' ] ) ) {

																function GUID() {
																	if ( function_exists( 'com_create_guid' ) === true ) {
																		return trim( com_create_guid(), '{}' );
																	}

																	return sprintf( '%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand( 0, 65535 ), mt_rand( 0, 65535 ), mt_rand( 0, 65535 ), mt_rand( 16384, 20479 ), mt_rand( 32768, 49151 ), mt_rand( 0, 65535 ), mt_rand( 0, 65535 ), mt_rand( 0, 65535 ) );
																}

																$title = $_SESSION[ 'suffix' ];
																$fname = strtoupper( $_SESSION[ 'fname' ] );
																$email = $_SESSION[ 'email' ];
																$pnum = "234" . substr( $_SESSION[ 'pnum' ], -10 ) . ", ";
																$mname = strtoupper( $_SESSION[ 'mname' ] );
																$lname = strtoupper( $_SESSION[ 'lname' ] );
																$fullname = strtoupper( $_SESSION[ 'fname' ] . ' ' . $_SESSION[ 'lname' ] );
																$mdname = strtoupper( $_SESSION[ 'mdname' ] );
																$alias = strtoupper( $_SESSION[ 'alias' ] );
																$address = mysqli_real_escape_string( $db, strtoupper( $_SESSION[ 'address' ] ) );
																$latlong = substr( $_SESSION[ 'latlong' ], 1, -1 );
																$dob = date( "Y-m-d", strtotime( $_SESSION[ 'dob' ] ) );
																if ( $_SESSION[ 'idtype' ] != '' ) {
																	$pnatid = mysqli_real_escape_string( $db, $_SESSION[ 'idtype' ] . ': ' . $_SESSION[ 'idnum' ] );
																} else {
																	$pnatid = '';
																}
																$gender = strtoupper( $_SESSION[ 'gender' ] );
																$bvnn = $_SESSION[ 'bvn' ];
																$occupation = $_SESSION[ 'occupation' ];
																$police = $_SESSION[ 'police' ];
																$nation = $_SESSION[ 'nation' ];
																$mstat = $_SESSION[ 'mstat' ];
																$state = $_SESSION[ 'state' ];
																$lga = $_SESSION[ 'lga' ];
																$spname = strtoupper( $_SESSION[ 'spname' ] );
																$nchild = $_SESSION[ 'nchild' ];
																$educa = $_SESSION[ 'educa' ];
																$eye = $_SESSION[ 'eye' ];
																$hair = $_SESSION[ 'hair' ];
																$height = $_SESSION[ 'height' ];
																$pic = $_SESSION[ 'imgupload' ];
																$seid = GUID();

																$nokid = GUID();
																$nokname = strtoupper( $_SESSION[ 'nokname' ] );
																$nokrel = $_SESSION[ 'nokrel' ];
																$nokpnum = $_SESSION[ 'nokpnum' ];
																$nokemail = $_SESSION[ 'nokemail' ];

																$grntid = GUID();
																$grntname = strtoupper( $_SESSION[ 'grntname' ] );
																$grntadd = mysqli_real_escape_string( $db, $_SESSION[ 'grntadd' ] );
																$grntpnum = $_SESSION[ 'grntpnum' ];
																$grntemail = $_SESSION[ 'grntemail' ];

																$Q1 = mysqli_query( $db, "UPDATE `domesticstaff` SET `title`='$title',`firstname`='$fname',`middlename`='$mname',`surname`='$lname',`nickname`='$alias',`maidenname`='$mdname',`gender`='$gender',`current_address`='$address',`latlong`='$latlong',`phone_numbers`='$pnum',`email`='$email',`occupation`='$occupation',`DOB`='$dob',`origin_state`='$state',`LGA`='$lga',`nationality`='$nation',`passport_nationalID`='$pnatid',`police_rec`='$police',`bvn`='$bvnn',`height`='$height',`eye_colour`='$eye',`hair_colour`='$hair',`education`='$educa',`picture`='$pic',`maritalstatus`='$mstat',`spousename`='$spname',`no_of_children`='$nchild',`sync`='2',`fullname`='$fullname',`dateregistered`=NOW(),`password`=MD5('VMNUSR'),`reg_by`='Self' WHERE staffID = '$_SESSION[staffID]'" )or die( mysqli_error( $db ) );

																$Q2 = mysqli_query( $db, "INSERT INTO `nok`(`kinInfoID`, `nokName`, `nokRelationship`, `nokPhone`, `nokEmail`, `domstaff`) VALUES ('$nokid','$nokname','$nokrel','$nokpnum','$nokemail','$_SESSION[staffID]')" )or die( mysqli_error( $db ) );

																$Q4 = mysqli_query( $db, "INSERT INTO `guarantor`(`grntInfoID`, `grntName`, `grntAddress`, `grntPhone`, `grntEmail`, `domstaff`) VALUES ('$grntid','$grntname','$grntadd','$grntpnum','$grntemail','$_SESSION[staffID]')" )or die( mysqli_error( $db ) );

																if ( $Q1 == true && $Q2 == true && $Q4 == true ) {
																	?>
												<div class="panel-body">
													<h2 class="font-light">Congratulations!!! <em>Your Registration was successfull</em> </h2>
													<h2>This is your VMN ID: <strong><?php echo($_SESSION['staffID']);?></strong></h2>
													<h2 class="font-semi-bold">Give this to your potential employer for quick and easy verification on verifyworkers.com<br>You can also login to view/edit your profile using your VMN ID and Password sent to your registered phone number.</h2>

												</div>
												<?php
												$P = "234" . $out;
												$sms = file_get_contents( "http://smsgator.com/bulksms?email=ashodipo@verifymenigeria.com&password=VerifyMe2016&type=0&dlr=0&destination=$P&sender=VerifyMe&message=Registration%20successful.%20VMN%20ID:%20$_SESSION[staffID]%20Password:%20VMNUSR" );
												if ( preg_match( '/2601/', $sms ) ) {
													mysqli_query( $db, "UPDATE domesticstaff SET int_sms='1' WHERE staffID = '$_SESSION[staffID]'" )or die( mysqli_error( $db ) );
												}
												session_destroy();
												}
												}
												else {
													?>
												<div class="panel-body">
													<h2 class="font-light">ERROR!!! <em>Your Registration failed</em> </h2>
													<h2 class="font-semi-bold">Your BVN data does not match data provided.</h2>

												</div>
												<?php
												}
												}
												}
												}
												?>


											</div>
										</div>
										<!-- Panel Widget -->
									</div>
									<!-- col-md-12 -->
								</div>
								<!-- row -->



							</div>
							<!-- .vd_content-section -->

						</div>
						<!-- .vd_content -->
					</div>
					<!-- .vd_container -->
				</div>
				<!-- .vd_content-wrapper -->

				<!-- Middle Content End -->

			</div>
			<!-- .container -->
		</div>
		<!-- .content -->

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
					


					</div>
					<div class="modal-body custom-scroll terms-body">
						<div id="left">
							<h4>Why is my BVN required?</h4>
							<p>


							</p>

						</div>
					</div>
					<div class="modal-footer">

					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->

		<!-- Footer Start -->
		<footer class="footer-1" id="footer">
			<div class="vd_bottom ">
				<div class="container">
					<div class="row">
						<div class=" col-xs-12">
							<div class="copyright text-center">
								Copyright &copy;
								<?php echo(date('Y'));?> Verify Me Nigeria. All Rights Reserved
							</div>
						</div>
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
		</footer>
		<!-- Footer END -->


	</div>


	<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

	<!-- Javascript =============================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="files/jquery.js"></script>
	<!--[if lt IE 9]>
  <script type="text/javascript" src="files/excanvas.js"></script>      
<![endif]-->
	<script type="text/javascript" src="files/bootstrap.min.js"></script>
	<script type="text/javascript" src='files/jquery-ui.custom.min.js'></script>
	<script type="text/javascript" src="files/jquery.ui.touch-punch.min.js"></script>

	<script type="text/javascript" src="files/caroufredsel.js"></script>
	<script type="text/javascript" src="files/plugins.js"></script>

	<script type="text/javascript" src="files/breakpoints.js"></script>

	<script type="text/javascript" src='files/bootstrap-timepicker.min.js'></script>
	<script type="text/javascript" src='files/moment.min.js'></script>
	<script type="text/javascript" src='files/daterangepicker.js'></script>

	<script type="text/javascript" src="files/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript" src="files/jquery.tagsinput.min.js"></script>
	<script type="text/javascript" src="files/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="files/jquery.blockUI.js"></script>
	<script type="text/javascript" src="files/jquery.pnotify.min.js"></script>
	<script src="files/SmartNotification.min.js"></script>

	<script type="text/javascript" src="files/theme.js"></script>
	<script src="files/custom-file-input.js"></script>
	<!-- Specific Page Scripts Put Here -->
	<script type="text/javascript" src='files/jquery.bootstrap.wizard.min.js'></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAGRyzd_ejBttqp_Sc1nahz6ESUif07TE">
	</script>

	<script type="text/javascript">
		$( window ).load( function () {
		$("#wait").hide();
			$( '[data-datepicker]' ).click( function ( e ) {
				var data = $( this ).data( 'datepicker' );
				$( data ).focus();
			} );
			$( "#datepicker-restrict" ).datepicker( {
				minDate: new Date( 1900, 1 - 1, 1 ),
				maxDate: "-18Y",
				changeMonth: true,
				changeYear: true,
				yearRange: '-110:-18',
				format: 'yyyy-mm-dd',
				viewMode: 2,
				minViewMode: 0
			} );
		} );

		$( document ).ready( function () {
			"use strict";
			var ad3 = document.getElementById( 'addre3' );

			ad3.onchange = function () {
				var geocoder = new google.maps.Geocoder();
				var map;

				var add1 = document.getElementById( 'addre' ).value;
				var add2 = document.getElementById( 'addre2' ).value;
				if ( add2 == null ) {
					var ad2 = "";
				} else {
					var ad2 = add2;
				}
				var add3 = document.getElementById( 'addre3' ).value;

				geocoder.geocode( {
					'address': add1 + ' ' + ad2 + ' ' + add3
				}, function ( results, status ) {
					if ( status == 'OK' ) {
						var Posi = results[ 0 ].geometry.location;

						document.getElementById( 'latlong' ).value = Posi;

					}
				} );
			};
			$( '#minus' ).click( function () {
				document.getElementById( 'pnum' ).value = '';
			} );

			$( "#sendotp" ).click( function () {
				var trcode = "<?php echo $TR;?>";
				$.post( "functions.php?resendotp=" + encodeURIComponent( trcode ) );
			} );

			$( '#mstat' ).change( getValue );

			function getValue() {
				var val = $( this ).val();
				if ( val == 'Married' ) {
					$( "#spname" ).attr( "required", "required" );
				} else {
					$( "#spname" ).removeAttr( "required", "required" );
				}
			}


			$( '#bvn' ).change( checkBVN );

			function checkBVN() {
				var val = $( this ).val();
				if ( val == '12345678900' || val == '11111111111' || val == '00000000000' || val == '12345678901' ) {
					$( this ).val( "" );
					$.smallBox( {
						title: "Error",
						content: "Invalid BVN inputed.",
						color: "#a90303",
						timeout: 10000,
						icon: "fa fa-warning"
					} );
				} else if ( val.length == '11' ) {
					$.ajax( {
						type: "POST",
						url: "functions.php",
						data: "bvnCheck=" + val,
						cache: false,
						beforeSend: function(){
						$("#send_btn").hide();
						$("#wait").show();
						},
						success: function ( data ) {
						$("#wait").hide();
						$("#send_btn").show();
							if ( data == 'BVN Found' ) {
								$.smallBox( {
									title: "Error",
									content: "BVN already exists in record. <a href='https://verifyworkers.com'>Click Here</a> to login.",
									color: "#a90303",
									timeout: 10000,
									icon: "fa fa-warning"
								} );
								$( "#bvn" ).val( "" );
							}
						}
					} );
				}
			}

			$( '#pnum' ).on( 'blur', function () {
				var val = $( this ).val().substring( 1 );
				if ( val.length >= 10 ) {
					$.ajax( {
						type: "POST",
						url: "functions.php",
						data: "pnumCheck=234" + encodeURIComponent( val ),
						cache: false,
						beforeSend: function(){
						$("#send_btn").hide();
						$("#wait").show();
						},
						success: function ( response ) {
						$("#wait").hide();
						$("#send_btn").show();
							if ( response == "Phone Number Found" ) {
								$.smallBox( {
									title: "Error",
									content: "Phone Number already exists in record. <a href='https://verifyworkers.com'>Click Here</a> to login.",
									color: "#a90303",
									timeout: 10000,
									icon: "fa fa-warning"
								} );
								$( "#pnum" ).val( "" );
							}
						}
					} );
				}

			} );




			$( '#nation' ).change( getDropdownOptions );

			$( '#state' ).change( getDropdownOptions2 );
			$.validator.addMethod( 'filesize', function ( value, element, param ) {
				// param = size (in bytes) 
				// element = element to validate (<input>)
				// value = value of the element (file name)
				return this.optional( element ) || ( element.files[ 0 ].size <= param )
			} );

			var $validator = $( "#regForm" ).validate( {
				rules: {
					bvn: {
						required: true,
						minlength: 11,
						maxlength: 11
					},
					pnum: {
						required: true,
						minlength: 11,
						maxlength: 11
					},
					imgupload: {
						required: true,
						filesize: 2048576
					},
					checkbox_1: {
					required: true
					},
					checkbox_2: {
					required: true
					}
				},
				messages: {
					imgupload: {
						filesize: 'Image larger than 2mb'
					}
				}
			} );

			$( '#wizard-2' ).bootstrapWizard( {
				'tabClass': 'nav nav-pills nav-justified',
				'nextSelector': '.wizard .next',
				'previousSelector': '.wizard .prev',
				'onTabShow': function ( tab, navigation, index ) {
					$( '#wizard-2 .finish' ).hide();
					$( '#wizard-2 .next' ).show();
					if ( $( '#wizard-2 .nav li:last-child' ).hasClass( 'active' ) ) {
						$( '#wizard-2 .next' ).hide();
						$( '#wizard-2 .finish' ).show();
					}
					var $total = navigation.find( 'li' ).length;
					var $current = index + 1;
					var $percent = ( $current / $total ) * 100;
					$( '#wizard-2' ).find( '.progress-bar' ).css( {
						width: $percent + '%'
					} );
				},
				'onTabClick': function ( tab, navigation, index ) {
					return false;
				},
				'onNext': function ( tab, navigation, index ) {
					var $valid = $( "#regForm" ).valid();

					if ( !$valid ) {
						$.smallBox( {
							title: "Error",
							content: "Some required fields are missing.",
							color: "#a90303",
							timeout: 10000,
							icon: "fa fa-warning"
						} );
						$validator.focusInvalid();
						return false;
					}
					if ( index == 1 ) {
						console.log( "page 2" );
					}

				},
				'onPrevious': function () {
					scrollTo( '#wizard-2', -100 );
				}
			} );

			$( '#wizard-2 .finish' ).click( function () {
				var $valid = $( "#regForm" ).valid();
				if ( !$valid ) {
					$validator.focusInvalid();
					return false;
				} else {
					$.SmartMessageBox( {
						title: "Confirm Entry!",
						content: "Please confirm that the details are correct and that \n you want to post these details",
						buttons: '[No][Yes]'
					}, function ( ButtonPressed ) {
						if ( ButtonPressed === "Yes" ) {
							document.getElementById( 'regForm' ).submit();
						}
						if ( ButtonPressed === "No" ) {

						}

					} );
				}
			} );


		} );


		function getDropdownOptions() {
			var val = $( this ).val();
			// fire a POST request to populate.php
			$.post( 'load-state.php', {
				value: val
			}, populateDropdown, 'html' );
			$.post( 'load-lga.php', {
				value2: val
			}, populateDropdown2, 'html' );
		}

		function getDropdownOptions2() {
			var val = $( this ).val();
			// fire a POST request to populate.php
			$.post( 'load-lga2.php', {
				value3: val
			}, populateDropdown3, 'html' );
		}

		function populateDropdown( data ) {
			if ( data != 'error' ) {
				$( '#state' ).html( data );
			}
		}

		function populateDropdown2( data ) {
			if ( data != 'error' ) {
				$( '#lga' ).html( data );
			}
		}

		function populateDropdown3( data ) {
			if ( data != 'error' ) {
				$( '#lga' ).html( data );
			}
		}
	</script>
	<!-- Specific Page Scripts END -->




</body>

</html>