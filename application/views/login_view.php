<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>REST Client</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
            font-size: 15px;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 0 0 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {        
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>
<div class="login-form">
    <form  action="<?=site_url('auth/login')?>" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div class="loginBtn">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
    </form>
    <div class="registerBtn">
        <button class="btn btn-link btn-block">Buat Akun</button>
    </div>
</div>
<!-- The Modal (contains the Sign Up form) -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLongTitle"><b>Register</b></h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
                <form class="login-form" action="<?=site_url('auth/register')?>" method="post">
				<div class="form-group">
                    <input type="text" name="nama" id="" class="form-control" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <input type="text" name="username" id="" class="form-control" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                    <input type="text" name="email" id="" class="form-control" placeholder="Masukkan Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="" class="form-control" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <input type="password" name="confirm" id="" class="form-control" placeholder="Konfirmasi Password">
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="idUser" name="idUser" value="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
                </form>
			</div>
        </div>
</div>
</body>
<script>
    $(".registerBtn").click(function(){
        $('#modalRegister').modal('show');
    })
        // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>