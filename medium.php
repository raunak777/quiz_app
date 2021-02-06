<?php
/**
 * 
 */
$score = 0;
	$wrong = 0;
include_once 'Users.php';
extract($_POST);
$usr = new Users();
if ($action=='reg') {
	if ($password == $cnfpassword) {
		$pass = password_hash($password, PASSWORD_BCRYPT);
		$data = $usr->registration($name, $email,$number,$pass);
	}
	else{
		echo "Password and confirm password not match";
	}
}
else if($action =='login')
{
	$data = $usr->user_login($email,$password);
	print_r($data);
}
else if($action == 'getque'){
	$data = $usr->get_ques_ans($btnval);
	print_r(json_encode($data));
}
?>