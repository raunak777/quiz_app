<?php
/*
*
**/
include_once 'Admin.php';
extract($_POST);
$adm = new Admin();
if ($action == "ins_sub") {
	$data = $adm->insert_ques_ans($subject, $ques, $ans, $opt1,$opt2,$opt3,$opt4);
	print_r($data);
}
else if($action == "addsub"){
	$data = $adm->insert_subject($subject);
	print_r($data);
}

?>