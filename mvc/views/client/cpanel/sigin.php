<?php require_once "./mvc/views/client/include/head.php"; ?>
<script>
    $(document).ready(function(){
        $("#email").keyup(function(){
            var email = $(this).val();
            $.post("ajax/checkuser",{email:email},function(data){
                 $("#mess").html(data);
            });
        });

        $("#pass_confirm").keyup(function(){
            var pass_confirm = $(this).val();
            var pass  = $("#pass").val();
            $.post("ajax/checkpass",{pass:pass,pass_confirm:pass_confirm},function(data){
                 $("#mess").html(data);
            });
        });

		$(".unset-mess").blur(function(){
                 $("#mess").html("");
        });
    });
</script>
<style>
    .c{
        background-color: red;
    }
</style>
<body>
<header id="header">
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 33339999</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> teamshopping@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
                                <li><a href="http://www.faceboook.com/profile.php?id=100010426810047"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fab fa-facebook"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-md-2 clearfix">
						<div class="logo pull-left">
							<a href="<?=base?>"><img src="public/images/logo/logo.jpg" alt="" /></a>
						</div>
					</div>
					<div class="col-md-4 clearfix mob-ipa">
						<div class="shop-menu clearfix pull-left">
							<div class="mainmenu pull-left">
								<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href="">Home</a></li>
									<li><a href="<?=base?>contact/contact">Contact</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-6 clearfix mob-ipa">
						<div class="shop-menu clearfix pull-right">
						<ul class="nav navbar-nav collapse navbar-collapse" style="position: relative;">
							<?php if(isset($_SESSION["info"]["name"])){?>
								<li class="dropdown menu-info">
									<a class="text-info" href="javascrip:void(0)"> <?php echo '<i class="fa fa-user"></i>Welcome'.$_SESSION['info']["name"].'<i class="fa fa-angle-down"></i>'; ?></a>
									<ul class="info-user">
											<li><a href="<?=base?>infouser/index">Personal information</a></li>
											<li><a href="<?=base?>home/history">Purchase history</a></li>
									</ul>
								</li>
							<?php }?>
								<li><a href="<?=base?>cart/showcart"><i class="fa fa-shopping-cart"></i>Cart</a></li>
								<li><?php if(isset($_SESSION["info"]["name"])) echo '<a href="logout/logout"><i class="fas fa-sign-out-alt"></i>Logout</a>'; else echo '<a href="login/login"><i class="fa fa-lock"></i>Login</a>'; ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="container" style="height: 500px;">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form">
						<h2 style="text-align: center;">Sign up</h2>
                        <div style="height: 30px; width: 100%;" id= "mess"><?=$data["mess"]?></div>
						<form action="sigin/sigin" method="post">
                            <input class="unset-mess" type="text" placeholder="Full Name" name="data[name]" required>
							<input class="unset-mess" type="email" placeholder="Email" name="data[email]" id="email" required>
							<input class="unset-mess" type="password" placeholder="Password" name="data[pass]" id = "pass" required>
                            <input class="unset-mess" type="password" placeholder="Confirm password" name="data[pass_confirm]" id = "pass_confirm" required>
                            <input class="unset-mess" type="text" placeholder="Phone Number" name="data[phonenumber]" required>
                            <input class="unset-mess" type="text" placeholder="Address" name="data[address]" required>
                            <div style="display: flex; justify-content: space-around;">
                                <button type="submit" class="btn btn-primary" name="sigin">Sign up</button>
                                <a style="margin-left: 40px; padding-left: 30px; padding-right: 30px;" class="btn btn-primary" href="login/login">Login</a>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
    <?php require_once "./mvc/views/client/include/footer.php"; ?>
</body>
</html>