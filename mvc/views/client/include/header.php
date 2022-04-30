
<header id="header">
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 33339999</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> onlineshopping@gmail.com</a></li>
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
		
		<div class="header-middle" style="height: 100px;">
			<div class="container">
				<div class="row">
					<div class="col-md-2 clearfix" >
						<div class="logo pull-left">
							<a href="<?=base?>"><img src="public/images/logo/logo1.ico" alt="" /></a>
						</div>
					</div>
					<div class="col-md-4 clearfix mob-ipa">
						<div class="shop-menu clearfix pull-left">
							<div class="mainmenu pull-left">
								<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href="<?=base?>" class="contact-us.html">Home</a></li>
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
											<li><a href="<?=base?>home/history">Order history</a></li>
									</ul>
								</li>
							<?php }?>
								<li class="trung__subnav"><a href="<?=base?>cart/showcart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li class="trung__subnav"><?php if(isset($_SESSION["info"]["name"])) echo '<a href="logout/logout"><i class="fas fa-sign-out-alt"></i>Logout</a>'; else echo '<a href="login/login"><i class="fa fa-lock"></i>Login</a>'; ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<input type="checkbox" id="check"></input>
							<label for="check">
								<i style="font-size: 20px;" class="fas fa-bars" trung="open"></i>
								<i style="font-size: 25px;" class="fas fa-times" trung="close"></i>
							</label>
							<ul class="sub_nav">

								<li class="sub_nav__title"></li>
								<li>
									<a href="javascrip:void(0)" class="home">Menu</a>
								</li>
								<?php if(isset($_SESSION["info"])){?>
									<li>
										<p>Welcome, <?=$_SESSION["info"]["name"]?></p>
									</li>
								<?php }?>
								<li>
									<a href="<?=base?>"><i class="fas fa-home"></i>Home</a>
								</li>
								<li>
									<a href="<?=base?>contact/contact"><i class="fas fa-phone-square"></i>Contact</a>
								</li>
								<?php if(isset($_SESSION["info"])){?>
									<li>
										<a href="<?=base?>infouser/index"><i class="fas fa-user i_subnav"></i>Personal information</a>
									</li>
									<li>
										<a href="<?=base?>home/history"><i class="fas fa-history i_subnav"></i>Order history</a>
									</li>
								<?php }?>
								<li>
									<a href="<?=base?>cart/showcart"><i class="fa fa-shopping-cart i_subnav"></i>Cart</a>
								</li>
								<li>
									<?php if(isset($_SESSION["info"]["name"])) echo '<a href="logout/logout"><i class="fas fa-sign-out-alt i_subnav"></i>Logout</a>'; else echo '<a href="login/login"><i class="fa fa-lock i_subnav"></i>Login</a>'; ?>
								</li>
								<li>
									<p></p>
								</li>
							</ul>
						</div>
		
					</div>
						<div class="col-sm-8">
							<form method="post">
								<div  style="position: relative;" class="search_box pull-right">
									<input id="search" type="text" placeholder="Search product"/><button id="btn-search" style="position: absolute; top: 5px; font-size: 23px;right: 3px; color:#999;border: none;background: none;" class="fas fa-search btnn"></button >
								</div>
							</form>
						</div>
				</div>
			</div>
		</div>
	</header>
	<script>
		var content;
		var current_page;
		$(document).on('click','.btnn',function(){
			content = $("#search").val()
			current_page = 1;
			$.post("ajax/search",{content:content,page:current_page},function(data){
            	$("#listproduct").html(data);
        	});
			$.post("ajax/pagingsearch",{content:content},function(data){
                $("#getpage").html(data);
           });
    	});
		$(document).on('click','.nextpagesearch',function(){
			content = $("#search").val()
			current_page = $(this).attr('numPage');

			$.post("ajax/pagingsearch",{content:content,page:current_page},function(data){
            	$("#getpage").html(data);
        	});
			$.post("ajax/search",{content:content,page:current_page},function(data){
                $("#listproduct").html(data);
           });
    	});

		document.querySelector('#btn-search').addEventListener('click',(e)=>{
			e.preventDefault()
		})
	</script>