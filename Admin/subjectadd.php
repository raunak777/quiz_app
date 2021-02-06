<!DOCTYPE html>
<html>
<head>
	<title>Add</title>
	<style type="text/css">
		#sub{
			text-transform: uppercase;
		}
	</style>
</head>
<body>
	<?php include_once 'header.php'; ?>
	<div class="formid mt-2 mb-5">
		<h1 class="text-light">Add Subject/ Catagory</h1>
		<form>
			<div class="form-group">
				<label for="sub">Subject</label>
				<input type="text" class="form-control" id="sub" name="sub"  placeholder="Enter Subject">
			</div>
			<input type="button" name="addques" value="Add" id="subadd" class="button">
		</form>
	</div>
	<script type="text/javascript">
		$(function(){
			$("#subadd").on("click",()=>{
				var subject = $("#sub").val();
				$.ajax({
					type: "POST",
					url: "admin_medium.php",
					data:{"action":"addsub", subject},
					success: data=>{
						if (data==1) {
							alert("Insert successfully");
							location.reload();
						}
						else if (data==0) {
							alert("Not inserted");
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