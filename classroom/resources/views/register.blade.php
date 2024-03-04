<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>FORM REGISTER YORUMI CLASSROOM</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="image-holder">
				<img src="images/bg-01.jpg" alt="">
			</div>
			<div class="form-inner">
				<form action="{{route('actionregister')}}" method="post">
					@csrf
					<div class="form-header">
						<h3>REGISTER</h3>
					</div>
					@if(session('message'))
                    <div class="alert alert-success"> {{session('message')}}
                    </div>
                    @endif
					<div class="form-group">
						<label for="">Username:</label>
						<input type="text" name="username" class="form-control" placeholder="Ex: Sunaookami Shiroko" required="">
					</div>
					<div class="form-group">
						<label for="">E-mail:</label>
						<input type="email" name="email" class="form-control" placeholder="Ex: shirokokawaii@gmail.com" required="">
					</div>
					<div class="form-group" >
						<label for="">Password:</label>
						<input type="password" name="password"class="form-control" placeholder="Ex: 1234567890" required="">
					</div>
					<div class="form-group"> <label><i class="fa fa-address-book"></i> Role</label>
						<input type="text" name="role" class="form-control" value="pengguna" readonly>
					</div>
					
					<button>REGISTER</button>
					<div class="text-center p-t-90">
                        <a class="txt1" href="/"> <br>
                            Sudah Punya? Login Disini!
                        </a>
                    </div>
				</form>
			</div>
			
		</div>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/jquery.form-validator.min.js"></script>
		<script src="js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>