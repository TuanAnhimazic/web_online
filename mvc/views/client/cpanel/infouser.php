<?php require_once "./mvc/views/client/include/head.php"; ?>
<body>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
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
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
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
									<a class="text-info" href="javascrip:void(0)"> <?php echo '<i class="fa fa-user"></i>Welcome '.$_SESSION['info']["name"].'<i class="fa fa-angle-down"></i>'; ?></a>
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
		</div><!--/header-middle-->
    <div id="contact-page" class="container">
        <h3 style="color: #FE980F;">Personal information</h3>
		<div style="padding: unset;" class="form-group col-md-12">
			<a href="<?=base?>" name="submit" class="btn btn-primary pull-left">Back</a>
		</div>
    	<div class="bg">  	   
    		<div class="row" style="margin-top: 100px;">  	
	    		<div class="col-sm-7">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Change of Personal Information</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="info[name]" class="form-control" required="required" placeholder="Full Name" value="<?=$data["info"][0]["name"]?>">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="info[email]" class="form-control" required="required" placeholder="Email" value="<?=$data["info"][0]["email_account"]?>">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="info[phone]" required="required" class="form-control" rows="8" placeholder="Phone Number" value="<?=$data["info"][0]["phone_number"]?>">
				            </div> 
                            <div class="form-group col-md-6">
				                <input type="text" name="info[address]"  required="required" class="form-control" rows="8" placeholder="Address" value="<?=$data["info"][0]["address_user"]?>">
				            </div>                       
				            <div class="form-group col-md-3">
				                <input type="submit" name="changer_info" class="btn btn-primary pull-left" value="Change">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-5">
					<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
						<div class="contact-info">
							<h2 class="title text-center">Change Password</h2>
							<div class="form-group col-md-12">
									<input type="password" name="info[pass_old]" class="form-control" required="required" placeholder="Old password">
								</div>
								<div class="form-group col-md-12">
									<input type="password" name="info[pass_new]" required="required" class="form-control" rows="8" placeholder="New password">
								</div> 
								<div class="form-group col-md-12">
									<input type="password" name="info[pass_confirm]"  required="required" class="form-control" rows="8" placeholder="Confirm new password">
								</div>                       
								<div class="form-group col-md-12">
									<input type="submit" name="changer_pass" class="btn btn-primary pull-left" value="Change">
							</div>
						</div>
					</form>
    			</div>    			
	    	</div>  
    	</div>	
    </div>
</body>
    <?php require_once "./mvc/views/client/include/footer.php"; ?>