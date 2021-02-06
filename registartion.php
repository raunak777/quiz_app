<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

</head>
<body>
	<?php include_once 'header.php'; ?>
    <div class="formid mt-2 mb-5">
        <h1 class="text-light">Registration Form</h1>
        <form>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="txtname"  placeholder="name">
                
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="txtemail"  placeholder="email">
                
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="number" id="mobile" class="form-control" name="txtmobile" maxlength="10"  placeholder="mobile">
                
            </div>
            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" id="password" class="form-control" name="txtpassword"  placeholder="password">
                
            </div>
            <div class="form-group">
                <label for="name">Confirm Password</label>
                <input type="password" class="form-control" name="cnfpassword"  id="cnfpassword" placeholder="Confirm password">
                
            </div>
            <input type="button" name="register" value="Register" class="button">
        </form>
    </div>
   <?php include_once 'footer.php'; ?>
</body>
<script type="text/javascript">
	$(function(){
		$(".button").on("click",()=>{
 		var name = $("#name").val();
 		var email = $("#email").val();
 		var number = $("#mobile").val();
 		var password = $("#password").val();
 		var cnfpassword = $("#cnfpassword").val();
 		$.ajax({
 			type: "POST",
 			url: "medium.php",
 			data:{"action": "reg", name, email, number, password, cnfpassword},
 			success: data => {
 				alert(data);
 				location.replace('index.php');
 			}
 		});
 	});
	});

</script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</html>