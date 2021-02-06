<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	<?php include_once 'header.php'; ?>
	<main class="col">
		<h1>Welcome to Admin dashboard......</h1>


		<div class="card-deck">
			<div class="">
				<div class="card text-white text-center bg-dark mb-3" style="width: 250px; height:150px;">
					<div class="card-body">
						<h5 class="card-title">Home Page</h5>
						<br>
						<button class="btn btn-outline-primary" type="submit"
						onclick="location.href = 'Adminpage.php';">More Info</button>
					</div>
				</div>
			</div>
			<div class="">
				<div class="card text-white text-center bg-dark mb-3" style="width: 250px; height:150px;">
					<div class="card-body">
						<h5 class="card-title">Add Question & Ans</h5>
						<br>
						<button class="btn btn-outline-primary" type="submit"
						onclick="location.href = 'ques_ans.php';">More Info</button>
					</div>
				</div>
			</div>
			<div class="">
				<div class="card text-white text-center bg-dark mb-3" style="width: 250px; height:150px;">
					<div class="card-body">
						<h5 class="card-title">Add Subject</h5>
						<br>
						<button class="btn btn-outline-primary" type=""
						onclick="location.href = 'subjectadd.php';">More Info</button>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include_once 'footer.php'; ?>
</body>
</html>