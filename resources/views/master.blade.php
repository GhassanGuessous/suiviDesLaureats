<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <title>{{$title}}</title>
	<!-- core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/animate.min.css" rel="stylesheet">
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.transitions.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">  
    <!--  auth styles  -->
    <link rel="stylesheet" type="text/css" href="assets/css/mesStyles.css">
    <link rel="stylesheet" type="text/css" href="assets/sweetAlert/sweetalert.min.css">
    <script src="assets/sweetAlert/sweetalert.min.js"></script>

</head><!--/head-->

<body id="home" class="homepage">

<!-- header section  -->
    @yield('header')
<!-- end header section -->

   
<!-- basic elements -->
    @yield('sections.basic')
<!--  end basic elements  -->


<!-- autres elements -->
    @yield('autres.sections')
<!--  end autres elements  -->



    <footer id="footer">
        <div class="container text-center">
          All rights reserved © 2018 | <a href="#">Suivi Des Laureats</a> By <a href="http://www.ensas.uca.ma/">Ensas</a>
        </div>
    </footer><!--/#footer-->

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/mousescroll.js"></script>
    <script src="assets/js/smoothscroll.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/jquery.isotope.min.js"></script>
    <script src="assets/js/jquery.inview.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
	<script src="assets/js/scrolling-nav.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="assets/js/inscription.js"></script> 

<script>

    $(document).ready(function($) {
      $("#owl-example").owlCarousel();
    });

    $("body").data("page", "frontpage");

$("#owl-example").owlCarousel({ 
        items:3,   
/*        itemsDesktop : [1199,3],
        itemsDesktopSmall : [980,9],
        itemsTablet: [768,5],
        itemsTabletSmall: false,
        itemsMobile : [479,4]*/
})

    </script>
</body>
</html> 
