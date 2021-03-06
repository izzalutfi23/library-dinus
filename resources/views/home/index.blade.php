<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <title>Home | Online Library</title>
    <!--

ART FACTORY

https://templatemo.com/tm-537-art-factory

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/templatemo-art-factory.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">Online Library</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#welcome" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">Tentang</a></li>
                            <li class="scroll-to-section"><a href="#katalog">Katalog</a></li>
                            <li class="scroll-to-section"><a href="#contact-us">Kontak</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12"
                        data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1><strong>E-Library</strong></h1>
                        <p>Aplikasi ini berisi banyak buku yang ada di perpustakaan. Aplikasi ini juga dilengkapi dengan
                            mesin pencarian sehingga dapat mempermudah pengunjung dalam menemukan buku yang diinginkan.
                        </p>
                        <a href="#about" class="main-button-slider">Cari Sekarang</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                        data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="{{ url('home/images/slider-icon.png') }}" class="rounded img-fluid d-block mx-auto"
                            alt="First Vector Graphic">
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="{{ url('home/images/left-image.png') }}" class="rounded img-fluid d-block mx-auto"
                        alt="App">
                </div>
                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading">
                        <h5>Vivamus sodales nisi id ante molestie venenatis</h5>
                    </div>
                    <div class="left-text">
                        <p>This template is <a href="#">last updated on 20 August 2019 </a>for main menu drop-down arrow
                            and sub menu text color. Duis auctor dolor eu scelerisque vestibulum. Vestibulum lacinia,
                            nisl sit amet tristique condimentum. <br><br>
                            Sed a consequat velit. Morbi lectus sapien, vestibulum et sapien sit amet, ultrices
                            malesuada odio. Donec non quam euismod, mattis dui a, ultrices nisi.</p>
                        <a href="#about2" class="main-button">Discover More</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="katalog">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-12 col-md-12 col-sm-12 mobile-bottom-fix">
                    <div class="text-center pt-5 pb-5">
                        <h5>BUKU PERPUSTAKAAN</h5>
                        <p>Katalog Buku yang Ada di Perpustakaan</p>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('search') }}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari Buku..." name="key">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($buku as $data)
                        <div class="col-4 mt-3 mb-5">
                            <div class="card">
                                <img class="card-img-top" src="{{ Storage::url('public/buku/'.$data->foto) }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data->judul }}</h5>
                                    <table class="table table-striped">
                                        <tr>
                                            <td>Penulis</td>
                                            <td>{{ $data->penulis }}</td>
                                        </tr>
                                        <tr>
                                            <td>Penerbit</td>
                                            <td>{{ $data->penerbit }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tahun</td>
                                            <td>{{ $data->tahun }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->


    <!-- ***** Contact Us Start ***** -->
    <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <!-- ***** Contact Map Start ***** -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div id="map">
                        <!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3960.230336436779!2d110.45001831431772!3d-6.98212327031226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1640024501777!5m2!1sid!2sid"
                            width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- ***** Contact Map End ***** -->

                <!-- ***** Contact Form Start ***** -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="contact" action="" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" id="name" placeholder="Full Name" required=""
                                            class="contact-field">
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" id="email" placeholder="E-mail" required=""
                                            class="contact-field">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" id="message" placeholder="Your Message"
                                            required="" class="contact-field"></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Send It</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->


    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy; 2020 Art Factory Company

                        . Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('home/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('home/js/popper.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('home/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('home/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('home/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('home/js/imgfix.min.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('home/js/custom.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });

    </script>

</body>

</html>
