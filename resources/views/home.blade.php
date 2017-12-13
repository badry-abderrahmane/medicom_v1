<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
    <link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
    <!-- select2 CSS -->
		<link href="vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <!-- bootstrap-touchspin CSS -->
		<link href="vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css"/>
    <!-- Jasny-bootstrap CSS -->
		<link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap Datetimepicker CSS -->
		<link href="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
    <!-- Calendar CSS -->
		<link href="vendors/bower_components/fullcalendar/dist/fullcalendar.css" rel="stylesheet" type="text/css"/>
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/app.css">
    <title></title>
  </head>
  <body>


    <!-- Preloader -->
  	<div class="preloader-it">
  		<div class="la-anim-1"></div>
  	</div>
  	<!-- /Preloader -->
    <div id="app">
      <full-app></full-app>
    </div>

    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
    <!-- Data table JavaScript -->
    <script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/bower_components/jszip/dist/jszip.min.js"></script>
    <script src="vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="/js/select2.min.js"></script>
    <script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
    <!-- Moment JavaScript -->
		<script type="text/javascript" src="vendors/bower_components/moment/min/moment-with-locales.min.js"></script>
    <!-- Bootstrap Datetimepicker JavaScript -->
		<script type="text/javascript" src="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

    <script src="/js/app.js" charset="utf-8"></script>

    <!-- Select2 JavaScript -->

    <!-- Bootstrap Touchspin JavaScript -->
		<script src="vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
	  <script src="vendors/bower_components/moment/min/moment.min.js"></script>
    <script src="vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
    <script src="dist/js/simpleweather-data.js"></script>
	  <script src="vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	  <script src="vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	  <script src="dist/js/dropdown-bootstrap-extended.js"></script>
	  <script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	  <script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	  <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="vendors/bower_components/morris.js/morris.min.js"></script>

	  <script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
  	<script src="dist/js/init.js"></script>
    <script type="text/javascript">
      /*Form advanced Init*/
      $(document).ready(function() {
        "use strict";
        /* Select2 Init*/
        // $(".select2").select2();
        $("input[name='tch3']").TouchSpin();

      });
    </script>

</html>
