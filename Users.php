<?php

/**
 * 
 */
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
include_once 'Dbcon.php';
class Users
{
	public $conn;
	function __construct()
	{
		$dbase= new Dbcon();
		$this->conn = $dbase->create_conn();
	}

	public function registration($name, $email, $num, $pass)
	{
		$query="INSERT INTO `registration`(`name`, `email`, `mobile`, `password`,`is_Admin`) VALUES ('$name','$email','$num','$pass','0')";
		$res = $this->conn->query($query);
		if ($res) {
			echo "Registartion successfull";;
		}
		else{
			return "Not register";
		}
	}

	public function user_login($email, $password)
	{
		$query="SELECT * FROM `registration` where `email`= '$email'";
		$res= $this->conn->query($query) or die("Query not executed");
		if ($res->num_rows>0) {
			$row = $res->fetch_assoc();
			$dbpass= $row['password'];
			$is_admin = $row['is_Admin'];
			$pass_check = password_verify($password, $dbpass);
			if ($pass_check) {

				if ($is_admin == 1) {
					$_SESSION['username'] = $row['name'];
					$_SESSION['user_id'] = $row['id'];
					echo 2;
				}
				else if($is_admin == 0){
					$_SESSION['username']=$row['name'];
					$_SESSION['user_id']=$row['id'];
					echo 3;

				}
			}
			else{
				echo 1;
			}
		}
		else{
			echo 0;
		}
	}

	public function select_subject()
	{
		$query = "SELECT DISTINCT subject FROM `questions`";
		$res = $this->conn->query($query);
		if ($res->num_rows>0) {
			while ($rows = $res->fetch_all()) {
				$arr = $rows;
			}
			return $arr;
		}
		else{
			return false;
		}
	}

	public function get_ques_ans($subj)
	{
		$query = "SELECT * FROM `questions` as qu join answers as ans ON qu.q_id = ans.q_id where subject= '$subj' order by rand() Limit 10";
		$res = $this->conn->query($query);
		if ($res->num_rows>0) {
			while ($rows = $res->fetch_all(MYSQLI_ASSOC)) {
				$arr = $rows;
			}
			return $arr;
		}
		else{
			return false;
		}
	}

	public function check_ans($subj, $qid)
	{
		$query = "SELECT * FROM `questions` as qu join answers as ans ON qu.q_id = ans.q_id where subject= '$subj' and qu.`q_id`='$qid'";
		$res = $this->conn->query($query);
		if ($res->num_rows>0) {
			while ($rows = $res->fetch_all(MYSQLI_ASSOC)) {
				$arr = $rows;
			}
			return $arr;
		}
		else{
			return false;
		}
	}
}

?>