<!DOCTYPE html>
<html>
<head>
	<title>User</title>
</head>
<body>
	<?php 
	include_once 'header.php'; 
	if (!isset($_SESSION['username'])) {
		header("Location: index.php");
	}
	
	include_once 'Users.php';
	$usr = new Users();
	$data = $usr->select_subject();
	?>
	<div class="container-fluid mt-5">
		<main class="col">
			<div class="ml-5 card-deck">
				<?php
				$htmldata='';
				for ($i=0; $i <count($data); $i++) { 
					$htmldata.='<div>
					<div class="card text-white text-center bg-dark mb-3" style="width: 250px; height:150px;">
					<div class="card-body">
					<h5 class="card-title">'. $data[$i][0] .' Quiz</h5>
					<br>
					<button id="quiz" class="btn btn-outline-primary" data-id='.$data[$i][0].' type="button">Take Quiz</button>
					</div>
					</div>
					</div>';
				}
				print_r($htmldata);
				?>
			</div>
	</div>
	<?php include_once 'footer.php'; ?>
</body>
<script type="text/javascript">
	$(".col").on("click","#quiz",function(){
		var btnval = $(this).data("id");
		location.replace("showq.php?val="+btnval);
		});

</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</html>