@php
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Moonlight Ecommerce | Home</title>
	<script>
		var pro_img = "{{asset('storage/products/')}}";
	</script>
	<!-- Font awesome -->
	<link href="{{asset('front_asset/css/font-awesome.css')}}" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="{{asset('front_asset/css/bootstrap.css')}}" rel="stylesheet">
	<!-- SmartMenus jQuery Bootstrap Addon CSS -->
	<link href="{{asset('front_asset/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
	<!-- Product view slider -->
	<link rel="stylesheet" type="text/css" href="{{asset('front_asset/css/jquery.simpleLens.css')}}">
	<link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/4338/4338718.png" type="image/x-icon">
	<!-- slick slider -->
	<link rel="stylesheet" type="text/css" href="{{asset('front_asset/css/slick.css')}}">
	<!-- price picker slider -->
	<link rel="stylesheet" type="text/css" href="{{asset('front_asset/css/nouislider.css')}}">
	<!-- Theme color -->
	<link id="switcher" href="{{asset('front_asset/css/theme-color/default-theme.css')}}" rel="stylesheet">
	<!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
	<!-- Top Slider CSS -->
	<link href="{{asset('front_asset/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">

	<!-- Main style sheet -->
	<link href="{{asset('front_asset/css/style.css')}}" rel="stylesheet">

	<!-- Google Font -->
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body class="productPage">
	<!-- wpf loader Two -->
	<div id="wpf-loader-two">
		<div class="wpf-loader-two-inner">
			<span>Loading</span>
		</div>
	</div>
	<!-- / wpf loader Two -->

	<a class="scrollToTop" href="#">
		<i class="fa fa-chevron-up"></i>
	</a>

	<!-- Start header section -->
	<header id="aa-header">
		<!-- start header top  -->
		<div class="aa-header-top">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="aa-header-top-area">
							<!-- start header top left -->
							<div class="aa-header-top-left">
								<!-- start language -->
								<div class="aa-language">
									<div class="dropdown">
										<a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											<img src="{{asset('front_asset/img/flag/english.jpg')}}" alt="english flag">ENGLISH
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
											<li><a href="#"><img src="{{asset('front_asset/img/flag/french.jpg')}}" alt="">FRENCH</a></li>
											<li><a href="#"><img src="{{asset('front_asset/img/flag/english.jpg')}}" alt="">ENGLISH</a></li>
										</ul>
									</div>
								</div>
								<!-- / language -->

								<!-- start currency -->
								<div class="aa-currency">
									<div class="dropdown">
										<a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											<i class="fa fa-usd"></i>USD
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
											<li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
											<li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
										</ul>
									</div>
								</div>
								<div class="cellphone hidden-xs">
									<p><span class="fa fa-phone"></span>7777-00-4907</p>
								</div>
							</div>

							<div class="aa-header-top-right">
								<ul class="aa-head-top-nav-right">
									<li><a href="{{url('order')}}">My Order</a></li>
									<li class="hidden-xs"><a href="{{url('wishlist')}}">Wishlist</a></li>
									<li class="hidden-xs"><a href="{{url('cart')}}">My Cart</a></li>
									<li class="hidden-xs"><a href="{{url('checkout')}}">Checkout</a></li>
									@if(session()->has('LOGIN_USER_ID') != null)
									<li><a href="{{url('logout')}}">Logout</a></li>
									@else
									<li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
									@endif
								</ul>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / header top  -->
		<div class="aa-header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="aa-header-bottom-area">
							<!-- logo  -->
							<div class="aa-logo">
								<!-- Text based logo -->
								<a href="{{url('/')}}" style="display:flex">
									<span class="fa fa-shopping-cart"></span>
									<p>Moon<strong>light</strong> <span>Your Shopping Partner</span></p>
								</a>
								<!-- img based logo -->
								<!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
							</div>
							<!-- / logo  -->
							<!-- cart box -->
							<div class="aa-cartbox">
								<a class="aa-cart-link" href="#">
									<span class="fa fa-shopping-basket"></span>
									<span class="aa-cart-title">SHOPPING CART</span>
									@php
									$result=getCartResult();
									$total=0;
									@endphp
									<span class="aa-cart-notify">{{count($result)}}</span>
								</a>
								<div class="aa-cartbox-summary">
									<ul id="cart-box-start">
										@if(isset($result[0]))
										@foreach($result as $val)
										@php
										$total += $val->quanity*$val->price;
										@endphp
										<li>
											<a class="aa-cartbox-img" href="#"><img src="{{asset('storage/products/'.$val->image)}}" width="150px" height="150px" alt="img"></a>
											<div class="aa-cartbox-info">
												<h4><a href="#">{{$val->title}}</a></h4>
												<p>{{$val->quanity}} x ₹ {{$val->price}}</p>
											</div>
											<a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
										</li>
										@endforeach
										<li>
											<span class="aa-cartbox-total-title">
												Total
											</span>
											<span class="aa-cartbox-total-price">
												₹ {{$total}}
											</span>
										</li>
										@endif
									</ul>
									<a class="aa-cartbox-checkout aa-primary-btn" href="{{url('checkout')}}">Checkout</a>
								</div>

							</div>
							<!-- / cart box -->
							<!-- search box -->
							<div class="aa-search-box">
								<form action="">
									<input type="text" name="" id="" placeholder="Search here ex. 'man' ">
									<button type="submit"><span class="fa fa-search"></span></button>
								</form>
							</div>
							<!-- / search box -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / header bottom  -->
	</header>
	<!-- / header section -->
	<!-- menu -->
	<section id="menu">
		<div class="container">
			<div class="menu-area">
				<!-- Navbar -->
				<div class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="navbar-collapse collapse">

						<!-- Left nav -->
						{!! getTopNavBar() !!}
						<!-- <ul class="nav navbar-nav">
              <li><a href="#">Men <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="#">Casual</a></li>
                  <li><a href="#">Sports</a></li>
                  <li><a href="#">Formal</a></li>
                  <li><a href="#">Standard</a></li>                                                
                  <li><a href="#">T-Shirts</a></li>
                  <li><a href="#">Shirts</a></li>
                  <li><a href="#">Jeans</a></li>
                  <li><a href="#">Trousers</a></li>
                  <li><a href="#">And more.. <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Sleep Wear</a></li>
                      <li><a href="#">Sandals</a></li>
                      <li><a href="#">Loafers</a></li>                                      
                    </ul>
                  </li>
                </ul>
              </li>

            </ul> -->
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
	</section>
	<!-- / menu -->

	@section('container')
	@show

	<!-- footer -->
	<footer id="aa-footer">
		<!-- footer bottom -->
		<div class="aa-footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="aa-footer-top-area">
							<div class="row">
								<div class="col-md-3 col-sm-6">
									<div class="aa-footer-widget">
										<h3>Main Menu</h3>
										<ul class="aa-footer-nav">
											<li><a href="#">Home</a></li>
											<li><a href="#">Our Services</a></li>
											<li><a href="#">Our Products</a></li>
											<li><a href="#">About Us</a></li>
											<li><a href="{{url('contactus')}}">Contact Us</a></li>
										</ul>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="aa-footer-widget">
										<div class="aa-footer-widget">
											<h3>Knowledge Base</h3>
											<ul class="aa-footer-nav">
												<li><a href="#">Delivery</a></li>
												<li><a href="#">Returns</a></li>
												<li><a href="#">Services</a></li>
												<li><a href="#">Discount</a></li>
												<li><a href="#">Special Offer</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="aa-footer-widget">
										<div class="aa-footer-widget">
											<h3>Useful Links</h3>
											<ul class="aa-footer-nav">
												<li><a href="#">Site Map</a></li>
												<li><a href="#">Search</a></li>
												<li><a href="#">Advanced Search</a></li>
												<li><a href="#">Suppliers</a></li>
												<li><a href="#">FAQ</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="aa-footer-widget">
										<div class="aa-footer-widget">
											<h3>Contact Us</h3>
											<address>
												<p> 25 Sector Mohali Punjab<br> - 132103, INDIA</p>
												<p><span class="fa fa-phone"></span>+91 777700-4907</p>
												<p><span class="fa fa-envelope"></span>moonlight@gmail.com</p>
											</address>
											<div class="aa-footer-social">
												<a href="#"><span class="fa fa-facebook"></span></a>
												<a href="#"><span class="fa fa-twitter"></span></a>
												<a href="#"><span class="fa fa-google-plus"></span></a>
												<a href="#"><span class="fa fa-youtube"></span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- footer-bottom -->
		<div class="aa-footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="aa-footer-bottom-area">
							<p>Designed by <a href="https://github.com/BharatManchanda">Bharat Manchanda</a></p>
							<div class="aa-footer-payment">
								<span class="fa fa-cc-mastercard"></span>
								<span class="fa fa-cc-visa"></span>
								<span class="fa fa-paypal"></span>
								<span class="fa fa-cc-discover"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- / footer -->

	<!-- Login Modal -->
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div id="login_popup">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Login or Register</h4>

						@php
						if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
						$user=$_COOKIE['email'];
						$pass=$_COOKIE['password'];
						}
						else{
						$user="";
						$pass="";
						}
						@endphp
						<div id="alert_error" style="display:none" class="alert alert-danger"></div>
						<form class="aa-login-form" id="login_form">
							<label for="">Email address<span>*</span></label>
							<input type="text" name="login_email" id="login_email" placeholder="Email ID" value="{{$user}}">
							<div id="login_email_error" style="font-size:14px; color:red; margin-top: -15px; margin-left: 10px"></div>
							<label for="">Password<span>*</span></label>
							<input type="password" name="login_password" value="{{$pass}}" id="login_password" placeholder="Password">
							<div id="login_password_error" style="font-size:14px; color:red; margin-top: -15px; margin-left: 10px"></div>
							@csrf
							<button class="aa-browse-btn" type="submit">Login</button>
							<label for="rememberme" class="rememberme">
								<input type="checkbox" id="rememberme" name="login_rememberme"> Remember Me </label>
							<p class="aa-lost-password"><a href="javascript:void(0)" onclick="show_forget_password()">Lost your password?</a></p>
							<div class="aa-register-now">
								Don't have an account?<a href="{{url('register')}}">Register now!</a>
							</div>
						</form>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
		<br> <br> <br>
		<div id="forget_popup" style="display:none">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Forget Password</h4>
						<div id="alert_error_2" style="display:none" class="alert alert-danger"></div>
						<form class="aa-login-form" id="forget_form">
							<label for="">Email address<span>*</span></label>
							<input type="text" name="forget_email" id="forget_email" placeholder="Email ID">
							<div id="forget_email_error" style="font-size:14px; color:red; margin-top: -15px; margin-left: 10px"></div>
							@csrf
							<button class="aa-browse-btn" type="submit">Submit</button>
							<br> <br>
							<div class="aa-register-now">
								Click Here to Login your account?<a href="javascript:void(0)" onclick="login_popup_show()">Log in!</a>
							</div>
						</form>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
	</div>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="{{asset('front_asset/js/bootstrap.js')}}"></script>
	<!-- SmartMenus jQuery plugin -->
	<script type="text/javascript" src="{{asset('front_asset/js/jquery.smartmenus.js')}}"></script>
	<!-- SmartMenus jQuery Bootstrap Addon -->
	<script type="text/javascript" src="{{asset('front_asset/js/jquery.smartmenus.bootstrap.js')}}"></script>
	<!-- To Slider JS -->
	<script src="{{asset('front_asset/js/sequence.js')}}"></script>
	<script src="{{asset('front_asset/js/sequence-theme.modern-slide-in.js')}}"></script>
	<!-- Product view slider -->
	<script type="text/javascript" src="{{asset('front_asset/js/jquery.simpleGallery.js')}}"></script>
	<script type="text/javascript" src="{{asset('front_asset/js/jquery.simpleLens.js')}}"></script>
	<!-- slick slider -->
	<script type="text/javascript" src="{{asset('front_asset/js/slick.js')}}"></script>
	<!-- Price picker slider -->
	<script type="text/javascript" src="{{asset('front_asset/js/nouislider.js')}}"></script>
	<!-- Custom js -->
	<script src="{{asset('front_asset/js/custom.js')}}"></script>

</body>

</html>