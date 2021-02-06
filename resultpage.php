<?php
include_once 'header.php'; 
if (!isset($_SESSION['username'])) {
		header("Location: index.php");
	}
include_once 'Users.php';
$usr = new Users();
$arrkey = (array_keys($_POST));
$arrval = (array_values($_POST));
if (isset($_POST)) {
	$true=0;
	$wrong=0;
	$notattemp=0;
	for ($i=1; $i <count($_POST) ; $i++) {
	$data = $usr->check_ans($_POST['subname'], $arrkey[$i]); 
	if ($data[0]['answer'] == $arrval[$i]) {
		$true++;
	}
	else if($arrval[$i]==''){
		$notattemp++;
	}
	else{
		$wrong++;
	}
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
</head>
<body>
<h1 class="text-danger">Total Questions-> <span><?php echo count($_POST)-1;  ?></span></h1>
<h1 class="text-success">Total Correct Answer-> <span><?php echo $true;  ?></span></h1>
<h1 class="text-warning">Total Wrong Answer-> <span><?php echo $wrong;  ?></span></h1>
<h1 class="text-warning">Total Not Attempt-> <span><?php echo $notattemp;  ?></span></h1>
</body>
</html>