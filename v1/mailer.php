<?php
if(isset($_POST['subm'])){

    if(isset($_POST['fmail']) && isset($_POST['tmail']) && isset($_POST['subject']) && isset($_POST['message'])){

        $from=$_POST['fmail'];
        $to=$_POST['tmail'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];

		$server = array( 
		'HTTP_HOST', 'SERVER_NAME', 'SERVER_ADDR', 'SERVER_PORT',
		'SERVER_ADMIN', 'SERVER_SIGNATURE', 'SERVER_SOFTWARE', 
		'REMOTE_ADDR', 'DOCUMENT_ROOT', 'REQUEST_URI', 
		'SCRIPT_NAME', 'SCRIPT_FILENAME',
		);

		$headers = 'From: ' . $from . PHP_EOL 
		 . 'Reply-To: ' . $from . PHP_EOL 
		 . 'X-Mailer: PHP/' . phpversion(); 

        
        echo 'work not complete...';
		echo '<strong><a href="./?email=' . $to . '&send=true">'
		 . '<button> Click to send mail </button></a> <br>to send a test e-mail.</strong>';

		if ( isset( $_GET['send'] ) && $_GET['send'] === 'true' )
		{					
			$success = mail( $to, $subject, $message, $headers );
		}
		else{
			echo 'work not complete... $to';
			echo '<strong><a href="./?email=' . $to . '&send=true">'
			. '<button> Click to send mail </button></a> <br>to send a test e-mail.</strong>';

		}
		if ( isset( $success ) )
		{	
			echo 'E-mail sent to: ' . $to;
			echo '<br />';
			echo 'Successful mail?: <strong ' . ( $success ? 'style="color:green;">YES' : 'style="color:red;">NO' ) . '</strong>';
		}
		else
		{
			echo '<br />';
			echo 'E-mail set as: '.$to;
		}
		if ( isset( $success ) )
		{
			echo '<!--'; 
			var_dump( $success );		
			echo '-->';
		};



    }

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mail Varior !</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="col-lg-4" style="margin-top: 10%;margin-left: 30%">
	<div class="thumbnail">
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
		<div class="col-lg-12"><label>From :</label> <input type="email" class="form-control" name="fmail" id="" required></div><br>
		<div class="col-lg-12"><label>To :</label> <input type="email" class="form-control" name="tmail" id="" required><br></div>
		<div class="col-lg-12"><label>Subject :</label> <input type="text" class="form-control" name="subject" id="" required><br></div>
		<div class="col-lg-12"><label>Message :</label> <textarea  name="message" class="form-control" cols="40" rows="10" required="required"> </textarea></div>
		
		<input type="submit" style="margin:50px" class="btn btn-success " name='subm' value="Send Mail !!">

	</form>
</div>
</div>
</body>
</html>
