<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perpustakaan MTsN 4 Kota Padang</title>
    <link rel="icon" href="{{ asset('assets-admin/img/car-rent-logo-web.png') }}" type="image/png">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets-user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-user/css/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-user/css/slimselect.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-user/css/main.css') }}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('icon/favicon-32x32.png') }}">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
</head>

<body>
    <!-- header -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__content">
                        <div class="header__logo">
                            <a href="/">
                                <img src="../assets-admin/img/logo.png" alt="">
                            </a>
                        </div>

                        <div class="header__actions">
                            <div class="header__action">
                                <a class="header__action-btn" href="{{ route('login') }}">
                                    <span>Login</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M6.62,13.08a.9.9,0,0,0-.54.54,1,1,0,0,0,1.3,1.3,1.15,1.15,0,0,0,.33-.21,1.15,1.15,0,0,0,.21-.33A.84.84,0,0,0,8,14a1.05,1.05,0,0,0-.29-.71A1,1,0,0,0,6.62,13.08Zm13.14-4L18.4,5.05a3,3,0,0,0-2.84-2H8.44A3,3,0,0,0,5.6,5.05L4.24,9.11A3,3,0,0,0,2,12v4a3,3,0,0,0,2,2.82V20a1,1,0,0,0,2,0V19H18v1a1,1,0,0,0,2,0V18.82A3,3,0,0,0,22,16V12A3,3,0,0,0,19.76,9.11ZM7.49,5.68A1,1,0,0,1,8.44,5h7.12a1,1,0,0,1,1,.68L17.61,9H6.39ZM20,16a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H19a1,1,0,0,1,1,1Zm-3.38-2.92a.9.9,0,0,0-.54.54,1,1,0,0,0,1.3,1.3.9.9,0,0,0,.54-.54A.84.84,0,0,0,18,14a1.05,1.05,0,0,0-.29-.71A1,1,0,0,0,16.62,13.08ZM13,13H11a1,1,0,0,0,0,2h2a1,1,0,0,0,0-2Z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="header__action">
                                <a class="header__action-btn" href="/register">
                                    <span>Register</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M6.62,13.08a.9.9,0,0,0-.54.54,1,1,0,0,0,1.3,1.3,1.15,1.15,0,0,0,.33-.21,1.15,1.15,0,0,0,.21-.33A.84.84,0,0,0,8,14a1.05,1.05,0,0,0-.29-.71A1,1,0,0,0,6.62,13.08Zm13.14-4L18.4,5.05a3,3,0,0,0-2.84-2H8.44A3,3,0,0,0,5.6,5.05L4.24,9.11A3,3,0,0,0,2,12v4a3,3,0,0,0,2,2.82V20a1,1,0,0,0,2,0V19H18v1a1,1,0,0,0,2,0V18.82A3,3,0,0,0,22,16V12A3,3,0,0,0,19.76,9.11ZM7.49,5.68A1,1,0,0,1,8.44,5h7.12a1,1,0,0,1,1,.68L17.61,9H6.39ZM20,16a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H19a1,1,0,0,1,1,1Zm-3.38-2.92a.9.9,0,0,0-.54.54,1,1,0,0,0,1.3,1.3.9.9,0,0,0,.54-.54A.84.84,0,0,0,18,14a1.05,1.05,0,0,0-.29-.71A1,1,0,0,0,16.62,13.08ZM13,13H11a1,1,0,0,0,0,2h2a1,1,0,0,0,0-2Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <button class="header__btn" type="button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->

    <!-- main content -->
    <main class="main">
        <!-- home -->
        <div class="home">
            <!-- home bg -->
            <div class="home__bg"></div>
            <!-- end home bg -->

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="home__content">
                            <h1 class="home__title">Selamat datang di<br>Perpustakaan MTsN 4<br>Kota Padang</h1>
                            <p class="home__text">Sistem informasi perpustakaan yang memudahkan siswa <br>
                                dalam melakukan peminjaman buku dan melihat ketersediaan buku<br>
                            dengan mudah, cepat, aman &amp; nyaman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end home -->


        <!-- end news -->
    </main>
    <!-- end main content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-4 order-4 order-md-1 order-lg-4 order-xl-1">
                    <div class="footer__logo">
                        <img src="../assets-user/img/logo.png" alt="">
                    </div>

                    <p class="footer__tagline">Sistem Informasi Perpustakaan di MTsN 4 Kota Padang.<br>
                        Memudahkan siswa dalam melihat ketersediaan buku di <br>pustaka dan melakukan peminjaman buku secara online.
                    </p>

                    <div class="footer__lang">
                        <a class="footer__lang-btn" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="../assets-user/img/flags/uk.svg" alt="">
                            <span>English</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M17,9.17a1,1,0,0,0-1.41,0L12,12.71,8.46,9.17a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42l4.24,4.24a1,1,0,0,0,1.42,0L17,10.59A1,1,0,0,0,17,9.17Z" />
                            </svg>
                        </a>

                        <ul class="dropdown-menu footer__lang-dropdown">
                            <li><a href="#"><img src="../assets-user/img/flags/spain.svg"
                                        alt=""><span>Spanish</span></a>
                            </li>
                            <li><a href="#"><img src="../assets-user/img/flags/france.svg"
                                        alt=""><span>French</span></a>
                            </li>
                            <li><a href="#"><img src="../assets-user/img/flags/china.svg"
                                        alt=""><span>Chinese</span></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div
                    class="col-6 col-md-4 col-lg-3 col-xl-2 order-1 order-md-2 order-lg-2 order-xl-3 offset-md-2 offset-lg-0">
                    <h6 class="footer__title">Company</h6>
                    <div class="footer__nav">
                        <a href="about.html">About us</a>
                        <a href="pricing.html">Pricing plans</a>
                        <a href="blog.html">Our blog</a>
                        <a href="contacts.html">Contacts</a>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-6 col-xl-4 order-3 order-md-3 order-lg-1 order-xl-2">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="footer__title">Our Branch in Indonesia</h6>
                        </div>

                        <div class="col-6">
                            <div class="footer__nav">
                                <a href="cars.html">Jakarta</a>
                                <a href="cars.html">Bandung</a>
                                <a href="cars.html">Padang</a>
                                <a href="cars.html">Surabaya</a>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="footer__nav">
                                <a href="cars.html">Yogyakarta</a>
                                <a href="cars.html">Malang</a>
                                <a href="cars.html">Bali</a>
                                <a href="cars.html">Palembang</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3 col-xl-2 order-2 order-md-4 order-lg-3 order-xl-4">
                    <h6 class="footer__title">Support</h6>
                    <div class="footer__nav">
                        <a href="faq.html">Help center</a>
                        <a href="contacts.html">Ask a question</a>
                        <a href="privacy.html">Privacy policy</a>
                        <a href="privacy.html">Terms & conditions</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="footer__content">
                        <div class="footer__social">
                            <a href="https://www.facebook.com/dedek.fpp" target="_blank"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M20.9,2H3.1A1.1,1.1,0,0,0,2,3.1V20.9A1.1,1.1,0,0,0,3.1,22h9.58V14.25h-2.6v-3h2.6V9a3.64,3.64,0,0,1,3.88-4,20.26,20.26,0,0,1,2.33.12v2.7H17.3c-1.26,0-1.5.6-1.5,1.47v1.93h3l-.39,3H15.8V22h5.1A1.1,1.1,0,0,0,22,20.9V3.1A1.1,1.1,0,0,0,20.9,2Z" />
                                </svg></a>

                            <a href="https://www.instagram.com/dedekfajarpp" target="_blank"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M17.34,5.46h0a1.2,1.2,0,1,0,1.2,1.2A1.2,1.2,0,0,0,17.34,5.46Zm4.6,2.42a7.59,7.59,0,0,0-.46-2.43,4.94,4.94,0,0,0-1.16-1.77,4.7,4.7,0,0,0-1.77-1.15,7.3,7.3,0,0,0-2.43-.47C15.06,2,14.72,2,12,2s-3.06,0-4.12.06a7.3,7.3,0,0,0-2.43.47A4.78,4.78,0,0,0,3.68,3.68,4.7,4.7,0,0,0,2.53,5.45a7.3,7.3,0,0,0-.47,2.43C2,8.94,2,9.28,2,12s0,3.06.06,4.12a7.3,7.3,0,0,0,.47,2.43,4.7,4.7,0,0,0,1.15,1.77,4.78,4.78,0,0,0,1.77,1.15,7.3,7.3,0,0,0,2.43.47C8.94,22,9.28,22,12,22s3.06,0,4.12-.06a7.3,7.3,0,0,0,2.43-.47,4.7,4.7,0,0,0,1.77-1.15,4.85,4.85,0,0,0,1.16-1.77,7.59,7.59,0,0,0,.46-2.43c0-1.06.06-1.4.06-4.12S22,8.94,21.94,7.88ZM20.14,16a5.61,5.61,0,0,1-.34,1.86,3.06,3.06,0,0,1-.75,1.15,3.19,3.19,0,0,1-1.15.75,5.61,5.61,0,0,1-1.86.34c-1,.05-1.37.06-4,.06s-3,0-4-.06A5.73,5.73,0,0,1,6.1,19.8,3.27,3.27,0,0,1,5,19.05a3,3,0,0,1-.74-1.15A5.54,5.54,0,0,1,3.86,16c0-1-.06-1.37-.06-4s0-3,.06-4A5.54,5.54,0,0,1,4.21,6.1,3,3,0,0,1,5,5,3.14,3.14,0,0,1,6.1,4.2,5.73,5.73,0,0,1,8,3.86c1,0,1.37-.06,4-.06s3,0,4,.06a5.61,5.61,0,0,1,1.86.34A3.06,3.06,0,0,1,19.05,5,3.06,3.06,0,0,1,19.8,6.1,5.61,5.61,0,0,1,20.14,8c.05,1,.06,1.37.06,4S20.19,15,20.14,16ZM12,6.87A5.13,5.13,0,1,0,17.14,12,5.12,5.12,0,0,0,12,6.87Zm0,8.46A3.33,3.33,0,1,1,15.33,12,3.33,3.33,0,0,1,12,15.33Z" />
                                </svg></a>
                            <a href="https://www.linkedin.com/in/fajar-putra-pratama" target="_blank"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M19,4H5A3,3,0,0,0,2,7V17a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4Zm-.41,2-5.88,5.88a1,1,0,0,1-1.42,0L5.41,6ZM20,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V7.41l5.88,5.88a3,3,0,0,0,4.24,0L20,7.41Z" />
                                </svg></a>
                        </div>

                        <small class="footer__copyright">© Rifki Mulfianda, 2024. Created by <a
                                href="https://github.com" target="_blank">Rifki Mulfianda</a>.</small>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- JS -->
    <script src="{{ asset('assets-user/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-user/js/splide.min.js') }}"></script>
    <script src="{{ asset('assets-user/js/slimselect.min.js') }}"></script>
    <script src="{{ asset('assets-user/js/smooth-scrollbar.js') }}"></script>
    <script src="{{ asset('assets-user/js/main.js') }}"></script>
</body>

</html>
