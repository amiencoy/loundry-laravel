
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Laundry</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="apa ya?" />
      <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <link href="assets/home/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <link href="assets/home/css/font-awesome.css" rel="stylesheet">
      <link href="assets/home/css/prettyPhoto.css" rel="stylesheet" type="text/css">
      <link href="assets/home/css/style.css" rel='stylesheet' type='text/css' media="all">
      <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
   </head>
   <body>
      <div class="header-outs" id="home">
         <div class="header-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
               <div class="hedder-up">
                  <h1><a class="navbar-brand" href="#">LAUNDRY</a></h1>
               </div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                  <ul class="navbar-nav ">
                     <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                     </li>
                  </ul>
               </div>
            </nav>
            <div class="clearfix"> </div>
         </div>
         <div class="slider">
            <div class="callbacks_container">
               <ul class="rslides" id="slider4">
                  <li>
                     <div class="slider-img">
                        <div class="container">
                           <div class="slider-info">
                              <h4>Mencuci Sangat Bersih</h4>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li>
                     <div class="slider-img ">
                        <div class="container">
                           <div class="slider-info">
                              <h4>Tersedia Berbagai Pilihan</h4>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="clearfix"> </div>
         </div>
      </div>
      <div class="price-table">
         <div class="container">
            <h3 class="title clr">Harga Produk</h3>
            <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6 price-agile-list">
                  <div class="pricing text-center">
                     <div class="pricing-top">
                        <p><sup>Rp.</sup><em>30.000</em>/kg</p>
                     </div>
                     <ul>
                        <li>cuci kering</li>
                        <li>bonus setrika</li>
                        <li>Jalan Semarang</li>
                     </ul>
                     <div class="btn"><a href="#contact" class="scroll">Pesan Sekarang</a></div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 price-agile-list">
                  <div class="pricing text-center">
                     <div class="pricing-top">
                        <p><sup>Rp.</sup><em>30.000</em>/kg</p>
                     </div>
                     <ul>
                        <li>cuci basah</li>
                        <li>tanpa bonus</li>
                        <li>Wonokromo</li>
                     </ul>
                     <div class="btn"><a href="#contact" class="scroll">Pesan Sekarang</a></div>                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 price-agile-list">
                  <div class="pricing text-center">
                     <div class="pricing-top">
                        <p><sup>Rp.</sup><em>30.000</em>/kg</p>
                     </div>
                     <ul>
                        <li>cuci basah</li>
                        <li>diskon 80%</li>
                        <li>Gembong</li>
                     </ul>
                     <div class="btn"><a href="#contact" class="scroll">Pesan Sekarang</a></div>                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 price-agile-list">
                  <div class="pricing text-center">
                     <div class="pricing-top">
                        <p><sup>Rp.</sup><em>30.000</em>/kg</p>
                     </div>
                     <ul>
                        <li>cuci kering</li>
                        <li>tanpa bonus</li>
                        <li>Ngagel</li>
                     </ul>
                     <div class="btn"><a href="#contact" class="scroll">Pesan Sekarang</a></div>                  </div>
               </div>
            </div>
         </div>
         <div class="clearfix"> </div>
      </div>
      <div class="contact-map">
         <div class="map-grid">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.948805392833!2d-73.99619098458929!3d40.71914347933105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a27e2f24131%3A0x64ffc98d24069f02!2sCANADA!5e0!3m2!1sen!2sin!4v1479793484055"></iframe>
         </div>
      </div>
      <footer>
         <div class="container">
            <div class="agileits-contact-addrss">
               <div class="row top-gap">
                  <div class="col-md-7 header-side">
                     <p> 
                        Copyright Loundry© 2020</a>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <script src='assets/home/js/jquery-2.2.3.min.js'></script>
      <script src="assets/home/js/responsiveslides.min.js"></script>
      <script>
         $(function () {
         	$("#slider4").responsiveSlides({
         		auto: true,
         		pager:true,
         		nav: false,
         		speed: 900,
         		namespace: "callbacks",
         		before: function () {
         			$('.events').append("<li>before event fired.</li>");
         		},
         		after: function () {
         			$('.events').append("<li>after event fired.</li>");
         		}
         	});
         
         });
      </script>
      <script src="assets/home/js/jquery.waypoints.min.js"></script>
      <script src="assets/home/js/jquery.countup.js"></script>
      <script>
         $('.counter').countUp();
      </script>
      <script src="assets/home/js/move-top.js"></script>
      <script src="assets/home/js/easing.js"></script>
      <script>
         jQuery(document).ready(function ($) {
         	$(".scroll").click(function (event) {
         		event.preventDefault();
         		$('html,body').animate({
         			scrollTop: $(this.hash).offset().top
         		}, 1000);
         	});
         });
      </script>
      <script>
         $(document).ready(function () {
         	$().UItoTop({
         		easingType: 'easeOutQuart'
         	});
         });
      </script>
      <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
      <script src="assets/home/js/bootstrap.min.js"></script>
      <script src="assets/home/js/jquery-1.7.2.js"></script>
      <script src="assets/home/js/jquery.quicksand.js"></script>
      <script src="assets/home/js/script.js"></script>
      <script src="assets/home/js/jquery.prettyPhoto.js" ></script>
   </body>
</html>
<!--
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
-->