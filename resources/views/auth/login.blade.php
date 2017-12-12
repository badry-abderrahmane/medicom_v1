
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>MediCom v1.0</title>
		<meta name="description" content="Philbert is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Philbert Admin, Philbertadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>

		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

		<!-- vector map CSS -->
		<link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>



		<!-- Custom CSS -->
		<link href="dist/css/style.css" rel="stylesheet" type="text/css">
    <style media="screen">
        body, html {
          height: 100%;
        }

        .bg-image {
          /* The image used */
          background-image: url("dist/img/background.jpg") !important;
          /* Full height */
          height: 100% !important;

          /* Center and scale the image nicely */
          background-position: center;
          background-repeat: no-repeat !important;
          background-size: cover;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          background-size: 100% !important;
        }
        /* Responsive */

        @media (max-width: 768px) {

          .bg-image {
            background-image: url("dist/img/background2.jpg") !important;
          }
        }
    </style>
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->

		<div class="wrapper pa-0 ">
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page bg-green bg-image">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row panel">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30"><br>
											<h3 class="text-center txt-primary mb-10">Authentification</h3>
											{{-- <h6 class="text-center nonecase-font txt-grey">Enter your details below</h6> --}}
										</div>
										<div class="form-wrap">
											<form method="POST" action="{{ route('login') }}">
												{{ csrf_field() }}
												<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
													<label class="control-label mb-10" for="email">Email</label>
													<input type="email" class="form-control" required autofocus id="email" name="email" value="{{ old('email') }}" placeholder="Entrez votre email">
													@if ($errors->has('email'))
															<span class="help-block">
																	<strong>{{ $errors->first('email') }}</strong>
															</span>
													@endif
												</div>
												<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
													<label class="pull-left control-label mb-10" for="password">Mot de passe</label>
													{{-- <a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="forgot-password.html">forgot password ?</a> --}}
													<div class="clearfix"></div>
													<input id="password" type="password" class="form-control" name="password" required placeholder="Entrez votre mot de passe">
													@if ($errors->has('password'))
															<span class="help-block">
																	<strong>{{ $errors->first('password') }}</strong>
															</span>
													@endif
												</div>
												<div class="form-group">
	                          <div class="checkbox">
	                              &nbsp;&nbsp;&nbsp;<label>
	                                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
	                              </label>
	                          </div>
                        </div>
												{{-- <div class="form-group">
													<div class="checkbox checkbox-primary pr-10 pull-left">
														<input id="checkbox_2" required="" type="checkbox">
														<label for="checkbox_2"> Rester connecté</label>
													</div>
													<div class="clearfix"></div>
												</div> --}}
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-primary btn-rounded">Se connecter</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
				</div>

			</div>
			<!-- /Main Content -->

		</div>
		<!-- /#wrapper -->

		<!-- JavaScript -->

		<!-- jQuery -->
		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>

		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
	</body>
</html>
