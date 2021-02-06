<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
	<?php include_once 'header.php'; 
    if (isset($_SESSION['username'])) {
        header("Location: Userpage.php");
    }
    ?>
    <div class="formid mt-2 mb-5">
        <h1 class="text-light">Login Form</h1>
        <form name="register">

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="txtemail"  placeholder="email">
                
            </div>
            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" class="form-control" id="password" name="txtpassword"  placeholder="password">
                
            </div>
            <input type="button" value="Login" id="loginbtn" class="button">
        </form>
    </div>
<?php include_once 'footer.php'; ?>
</body>
<script type="text/javascript">

    $(function(){
        $("#loginbtn").on("click",()=>{
            var email = $("#email").val();
            var password =$("#password").val();
            $.ajax({
                type: "POST",
                url: "medium.php",
                data:{"action":"login", email, password},
                success: data => {

                    if (data==0) {
                        alert("Email not registered");
                    }
                    else if(data==1)
                    {
                        alert("Password wrong");
                    }
                    else if(data==2)
                    {
                        location.replace("Admin/Adminpage.php");
                    }
                    else if(data ==3)
                    {
                       location.replace("Userpage.php");   
                   }
                   else{
                    alert(data);
                }
            }
        });
        });
    });

</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</html>