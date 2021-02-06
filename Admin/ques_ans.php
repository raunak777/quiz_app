<!DOCTYPE html>
<html>
<head>
	<title>Add</title>
</head>
<body>
	<?php include_once 'header.php'; 
	include_once 'Admin.php';
	$adm = new Admin();
	$data = $adm->getSubject_name();
	?>
	<div class="formid mt-2 mb-5">
		<h1 class="text-light">Add Ques & Ans</h1>
		<form>
			<div class="form-group">
				<label for="ques">Subject</label>
				<div class="form-group">
					<select  class="form-control" id="subject" required>
						<option>Select Subject</option>
						<?php
						for ($i=0; $i <count($data) ; $i++) { 
						?>
						<option ><?php echo $data[$i]['subject']  ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="ques">Question</label>
				<input required type="text" class="form-control" id="ques" name="ques"  placeholder="Enter question">
			</div>
			<div class="form-group">
				<label for="opt">Option 1</label>
				<input required type="text" class="form-control" id="opt1" name="opt1"  placeholder="Option 1">

			</div>
			<div class="form-group">
				<label for="opt">Option 2</label>
				<input required type="text" class="form-control" id="opt2" name="opt2"  placeholder="Option 2">

			</div>
			<div class="form-group">
				<label for="opt">Option 3</label>
				<input type="text" class="form-control" id="opt3" name="opt3"  placeholder="Option 3">

			</div>
			<div class="form-group">
				<label for="opt">Option 4</label>
				<input required type="text" class="form-control" id="opt4" name="opt4"  placeholder="Option 4">

			</div>
			<div class="form-group">
				<label for="opt">Correct Answer</label>
				<div class="form-group">
					<select required class="form-control" id="ans">
						<option value="1">Option 1</option>
						<option value="2">Option 2</option>
						<option value="3">Option 3</option>
						<option value="4">Option 4</option>
					</select>
				</div>
			</div>
			<input type="submit" name="addques" value="Add" id="quesans" class="button">
		</form>
	</div>
	<script type="text/javascript">
		$(function(){
			$("#quesans").on("click",()=>{
				var subject = $("#subject").val();
				var ques = $("#ques").val();
				var opt1 = $("#opt1").val();
				var opt2 = $("#opt2").val();
				var opt3 = $("#opt3").val();
				var opt4 = $("#opt4").val();
				var ans = $("#ans").val();
				$.ajax({
					type: "POST",
					url: "admin_medium.php",
					data:{"action" : "ins_sub", subject, ques, opt1, opt2, opt3, opt4, ans},
					success: data=>{
						if (data== 1) {
							alert("Ques & Ans added successfully");
							location.reload();
						}
						else if (data==0) {
							alert("Some error!");
						}
						else{
							alert(data);
						}
					}
				});
			});
		});
	</script>
	<?php include_once 'footer.php'; ?>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</html>