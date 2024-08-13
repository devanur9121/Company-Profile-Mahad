<!DOCTYPE html>
<html lang="id">

   <head>
      <!--Meta Tags-->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="" />
      <meta name="keywords" content="" />

      <!--Favicons-->
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('Front/img/Logo-1.png')}}" />

      <!--Page Title-->
      <title>Home - Ma'had Bahrul Huda</title>

      <!-- Bootstrap core CSS -->
      <link href="{{asset('Front/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Google Font  -->
      <link
         href="https://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800|Roboto:300,400,400i,500,500i,700,700i,900,900i"
         rel="stylesheet">
      <!-- Icofont CSS -->
      <link rel="stylesheet" href="{{asset('Front/css/icofont.min.css')}}">
      <!-- Meanmenu CSS -->
      <link rel="stylesheet" href="{{asset('Front/css/meanmenu.min.css')}}">
      <!--- owl carousel Css-->
      <link rel="stylesheet" href="{{asset('Front/owlcarousel/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('Front/owlcarousel/css/owl.theme.default.min.css')}}">
      <!-- animate CSS -->
      <link rel="stylesheet" href="{{asset('Front/css/animate.css')}}">
      <!-- venobox -->
      <link rel="stylesheet" href="{{asset('Front/venobox/css/venobox.min.css')}}" />
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{asset('Front/css/style.css')}}">
      <!-- Responsive  CSS -->
      <link rel="stylesheet" href="{{asset('Front/css/responsive.css')}}">

   </head>

   <body id="main">

      <!-- START PRELOADER -->
      <div id="page-preloader">
         <div class="loader"><span class="cssload-loader"><span class="cssload-loader-inner"></span></div>
      </div>
      <!-- END PRELOADER -->

      <!-- START HEADER SECTION -->
      <header class="main-header">
         <!-- START TOP AREA -->
         @include('Front.top_area')
         <!-- END TOP AREA -->

         <!-- START LOGO AREA -->
         @include('Front.logo_area')
         <!-- END LOGO AREA -->

         <!-- START NAVIGATION AREA -->
         {{-- @include('Front.nav_area') --}}
         <!-- END NAVIGATION AREA -->
      </header>
      <!-- END HEADER SECTION -->

      <!-- START MAIN CONTENT -->
      <div class="content">
         @yield('content')
      </div>
      <!-- END MAIN CONTENT -->

      <!-- START FOOTER -->
      @include('Front.foot')
      <!-- END FOOTER -->

      <!-- Latest jQuery -->
      <script src="{{asset('Front/js/jquery-2.2.4.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('Front/bootstrap/js/popper.min.js')}}"></script>
      <!-- Latest compiled and minified Bootstrap -->
      <script src="{{asset('Front/bootstrap/js/bootstrap.min.js')}}"></script>
      <!-- Meanmenu Js -->
      <script src="{{asset('Front/js/jquery.meanmenu.js')}}"></script>
      <!-- Sticky JS -->
      <script src="{{asset('Front/js/jquery.sticky.js')}}"></script>
      <!-- owl-carousel min js  -->
      <script src="{{asset('Front/owlcarousel/js/owl.carousel.min.js')}}"></script>
      <!-- isotope js -->
      <script src="{{asset('Front/js/isotope.3.0.6.min.js')}}"></script>
      <!-- venobox js -->
      <script src="{{asset('Front/venobox/js/venobox.min.js')}}"></script>
      <!-- jquery appear js  -->
      <script src="{{asset('Front/js/jquery.appear.js')}}"></script>
      <!-- countTo js -->
      <script src="{{asset('Front/js/jquery.inview.min.js')}}"></script>
      <!-- scrolltopcontrol js -->
      <script src="{{asset('Front/js/scrolltopcontrol.js')}}"></script>
      <!-- WOW - Reveal Animations When You Scroll -->
      <script src="{{asset('Front/js/wow.min.js')}}"></script>
      <!-- scripts js -->
      <script src="{{asset('Front/js/scripts.js')}}"></script>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   </body>

</html>