<?php
include_once '../Dbcon.php';

class Admin{
	public $conn;
	function __construct()
	{
		$dbase= new Dbcon();
		$this->conn = $dbase->create_conn();
	}

	public function insert_ques_ans($sub, $ques, $ans, $opt1,$opt2,$opt3,$opt4)
	{
		$query_ques = "INSERT INTO `questions`(`questions`, `subject`) VALUES ('$ques','$sub')";
		$res_ques = $this->conn->query($query_ques);
		if ($res_ques) {
			$last_id = $this->conn->insert_id;
			$query_ans = "INSERT INTO `answers`(`answer`, `opt1`, `opt2`, `opt3`, `opt4`, `q_id`) VALUES ('$ans','$opt1','$opt2','$opt3','$opt4','$last_id')";
			$res_ans = $this->conn->query($query_ans);
			if ($res_ans) {
				return 1;
			}
			else{
				return 0;
			}
		}
	}

	public function insert_subject($sub)
	{
		$query = "INSERT INTO `subject`(`subject`) VALUES ('$sub')";
		$res = $this->conn->query($query);
		if ($res) {
			echo 1;
		}
		else{
			echo 0;
		}
	}

	public function getSubject_name()
	{
		$query = "SELECT * FROM `subject`";
		$res =$this->conn->query($query);
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