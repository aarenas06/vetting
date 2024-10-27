<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<!-- Mirrored from ld-wt73.template-help.com/wt_prod-24921/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Oct 2024 14:44:30 GMT -->

<head>
    <title>VET CONNET</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0 maximum-scale=1.0 user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="/vetting/plantilla/assets/img/icon.png" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Work+Sans:300,700,800%7COswald:300,400,500">
    <link rel="stylesheet" href="/vetting/landing/css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css" />

    <!-- Aletar -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }
    </style>
</head>

<body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="/vetting/landing/images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
        <div class="preloader-logo"><img src="plantilla/assets/img/Vetconnect.png" alt="" width="167" height="44" />
        </div>
        <div class="preloader-body">
            <div id="loadingProgressG">
                <div class="loadingProgressG" id="loadingProgressG_1"></div>
            </div>
        </div>
    </div>
    <div class="page">
        <!-- Page Header-->
        <header class="section page-header">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="118px" data-xl-stick-up-offset="118px" data-xxl-stick-up-offset="118px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">

                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <div class="rd-navbar-nav-wrap" id="rd-navbar-nav-wrap">
                                <!-- RD Navbar Search-->
                                <div class="rd-navbar-search" id="rd-navbar-search">
                                    <img class="rd-navbar-search-toggle" src="/vetting/plantilla/assets/img/Vetconnect.png" alt="" width="50%" height="50%">
                                </div>
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item active"><a class="rd-nav-link" href="index-2.html">Home</a>
                                    </li>
                                    <li class="rd-nav-item active"><a class="rd-nav-link" onclick="ModalRegistrarse()">Registrarse</a>
                                    </li>
                                    <li class="rd-nav-item active"><a class="rd-nav-link" onclick="ModalIniciosession()">Inciar sesion</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <!-- Modal Iniciar Sesion-->
        <div class="modal fade custom-modal-iniciosesion" id="ModalIniciosession" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light d-flex flex-column align-items-center">
                        <img src="plantilla/assets/img/Vetconnect.png" alt="Vetconnect Logo" width="167" height="40" class="mt-2" />
                        <br>
                        <h3 class="modal-title"><b>Inicia Sesión</b></h3>
                    </div>

                    <hr>
                    <div class="modal-body px-4 py-3"> <!-- Ajusta padding -->
                        <div class="input-group mb-3">
                            <span class="input-group-text btn-box btn-1"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control" id="User" placeholder="Usuario" aria-label="Usuario">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text btn-box"><i class="fa-solid fa-key"></i></span>
                            <input type="password" class="form-control" id="Pass" placeholder="Contraseña" aria-label="Contraseña">
                        </div>
                        <div class="text-center mb-2">
                            <span>¿Aún no tienes cuenta? <a href="registro.php" class="text-primary">Registrate Gratis</a></span>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success w-100" onclick="Validar()">Ingresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Registrarse-->
        <div class="modal fade custom-modal-registrarse" id="ModalRegistrarse" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Registrarse</h4>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text btn-box btn-1" id="basic-addon1">
                                <i class="fa-solid fa-user-large"></i>
                            </span>
                            <input type="text" class="form-control" id="NomPropietarios" placeholder="Nombre" aria-label="NomPropietarios">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text btn-box">
                                <i class="fa-solid fa-address-card"></i>
                            </span>
                            <input type="text" class="form-control" id="IdentPropietarios" placeholder="Identificación" aria-label="IdentPropietarios">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text btn-box">
                                <i class="fa-solid fa-phone-volume"></i>
                            </span>
                            <input type="text" class="form-control" id="TelPropietarios" placeholder="Teléfono" aria-label="TelPropietarios">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text btn-box">
                                <i class="fa-solid fa-location-dot"></i>
                            </span>
                            <input type="text" class="form-control" id="DirPropietarios" placeholder="Dir. Residencial" aria-label="DirPropietarios">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text btn-box">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control" id="EmailPropietarios" placeholder="Correo Electrónico" aria-label="EmailPropietarios">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text btn-box">
                                <i class="fa-solid fa-user-plus"></i>
                            </span>
                            <input type="text" class="form-control" id="UsuPropietarios" placeholder="Usuario" aria-label="UsuPropietarios">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text btn-box">
                                <i class="fa-solid fa-key"></i>
                            </span>
                            <input type=" password" class="form-control" id="PassPropietarios" placeholder="Contraseña" aria-label="PassPropietarios">
                        </div>

                        <center>
                            <hr>
                            <button class="btn btn-block btn-primary btn-sm" onclick="InsertPropietarios()">Registrarse</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modals Registrarse-->


        <!-- Slider Light-->
        <section class="swiper-container swiper-slider swiper-slider-light bg-image-1" data-loop="false" data-autoplay="false" data-simulate-touch="false" data-custom-slide-effect="inter-leave-effect" data-inter-leave-offset="-.5">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="container">
                            <div class="swiper-slide-caption">
                                <div class="row row-30">
                                    <div class="col-lg-6 text-center text-lg-left">
                                        <h1><span class="font-weight-light"><span>Haz que tus Mascotas</span></span><span class="font-weight-bold"><span>Luzcan lo mejor posible</span></span></h1>
                                        <!-- <div class="button-outer"><a class="button button-lg button-primary button-winona" href="#">Free consultation</a></div> -->
                                    </div>
                                    <div class="col-lg-6 position-static">
                                        <div class="floating-image"><img src="/vetting/landing/images/swiper-image-1-960x776.jpg" alt="" width="960" height="776" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="container">
                            <div class="swiper-slide-caption">
                                <div class="row row-30">
                                    <div class="col-lg-6 text-center text-lg-left">
                                        <h1><span class="font-weight-light"><span>Servicios Reales</span></span><span class="font-weight-bold"><span>Para su perro</span></span></h1>
                                        <!-- <div class="button-outer"><a class="button button-lg button-primary button-winona" href="#">Free consultation</a></div> -->
                                    </div>
                                    <div class="col-lg-6 position-static">
                                        <div class="floating-image"><img src="/vetting/landing/images/swiper-image-2-960x776.jpg" alt="" width="960" height="776" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="container">
                            <div class="swiper-slide-caption">
                                <div class="row row-30">
                                    <div class="col-lg-6 text-center text-lg-left">
                                        <h1><span class="font-weight-light"><span>Excepcional</span></span><span class="font-weight-bold"><span>Peluquería canina</span></span></h1>
                                        <!-- <div class="button-outer"><a class="button button-lg button-primary button-winona" href="#">Free consultation</a></div> -->
                                    </div>
                                    <div class="col-lg-6 position-static">
                                        <div class="floating-image"><img src="/vetting/landing/images/swiper-image-3-960x776.jpg" alt="" width="960" height="776" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination-outer container">
                <div class="swiper-pagination swiper-pagination-modern swiper-pagination-marked" data-index-bullet="true"></div>
            </div>
        </section>
        <!-- A Few Words About Us-->
        <section class="section section-decorated-1">
            <div class="decor-1"><img src="/vetting/landing/images/bubbles-219x209.png" alt="" width="219" height="209" />
            </div>
            <div class="decor-2"><img src="/vetting/landing/images/bubbles-224x306.png" alt="" width="224" height="306" />
            </div>
            <div class="container">
                <div class="row row-50 justify-content-center justify-content-lg-between flex-lg-row-reverse align-items-center">
                    <div class="col-md-10 col-lg-6 col-xl-5">
                        <h3 class="wow-outer"><span class="wow slideInDown">Sobre nosotros</span></h3>
                        <p class="wow-outer" style="text-align: justify;"><span class="wow slideInDown" data-wow-delay=".05s">
                                Vetconect es una plataforma integral diseñada para conectar y optimizar los servicios de diversas veterinarias, con el objetivo de ofrecer un sistema centralizado, eficiente y escalable para empresas medianas del sector veterinario. Este proyecto ha sido creado
                                pensando en la consolidación de los servicios veterinarios, permitiendo a las clínicas y consultorios acceder a herramientas tecnológicas avanzadas
                                que faciliten su gestión diaria y potencien su capacidad de crecimiento.
                            </span></p>
                        <p class="wow-outer" style="text-align: justify;"><span class="wow slideInDown" data-wow-delay=".1s">
                                Con Vetconect, las veterinarias pueden integrar y unificar la gestión de sus operaciones, desde el manejo de expedientes médicos de los animales, hasta la administración de citas, facturación y control de inventarios, todo desde una sola plataforma. Esta integración no solo reduce la complejidad operativa,
                                sino que también permite a las veterinarias mejorar la calidad de atención al cliente, optimizar sus procesos internos, y aumentar su competitividad en el mercado.
                            </span></p>
                        <!-- <div class="wow-outer button-outer"><a class="button button-lg button-primary button-winona" data-wow-delay=".1s" href="about-us.html">Learn more</a></div> -->
                    </div>
                    <div class="col-md-10 col-lg-6 wow-outer"><img class="img-responsive wow slideInLeft" src="/vetting/landing/images/about-501-526.jpg" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- Small Features-->
        <section class="section section-md bg-gray-light">
            <div class="container">
                <div class="row row-40 align-items-center">
                    <div class="col-xl-8">
                        <div class="row row-xl-60">
                            <div class="col-sm-6 wow-outer">
                                <!-- Box Minimal-->
                                <article class="box-minimal">
                                    <div class="box-minimal-icon linearicons-star wow fadeIn"></div>
                                    <div class="box-minimal-main wow-outer">
                                        <h4 class="box-minimal-title wow slideInDown">Empleados cualificados</h4>
                                        <p class="wow fadeInUpSmall">
                                            Nuestro equipo está formado por más de 20 contables, comercializadores y gestores cualificados y experimentados.
                                        </p>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 wow-outer">
                                <!-- Box Minimal-->
                                <article class="box-minimal">
                                    <div class="box-minimal-icon linearicons-heart wow fadeIn" data-wow-delay=".1s"></div>
                                    <div class="box-minimal-main wow-outer">
                                        <h4 class="box-minimal-title wow slideInDown" data-wow-delay=".1s">Consultas gratuitas</h4>
                                        <p class="wow fadeInUpSmall" data-wow-delay=".1s">
                                            Nuestra relación con el cliente comienza siempre con una consulta gratuita para encontrar posibles soluciones a sus problemas.
                                        </p>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 wow-outer">
                                <!-- Box Minimal-->
                                <article class="box-minimal">
                                    <div class="box-minimal-icon linearicons-scissors wow fadeIn" data-wow-delay=".2s"></div>
                                    <div class="box-minimal-main wow-outer">
                                        <h4 class="box-minimal-title wow slideInDown" data-wow-delay=".2s">100% garantizado</h4>
                                        <p class="wow fadeInUpSmall" data-wow-delay=".2s">
                                            Todos los resultados que obtenga de nosotros están 100% garantizados para llevarte a un nuevo nivel de rentabilidad y éxito financiero.
                                        </p>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 wow-outer">
                                <!-- Box Minimal-->
                                <article class="box-minimal">
                                    <div class="box-minimal-icon linearicons-trophy2 wow fadeIn" data-wow-delay=".2s"></div>
                                    <div class="box-minimal-main wow-outer">
                                        <h4 class="box-minimal-title wow slideInDown" data-wow-delay=".2s">100% Recomendados</h4>
                                        <p class="wow fadeInUpSmall" data-wow-delay=".2s">
                                            Optimiza tu veterinaria con Vetconect: una plataforma integral que mejora la atención, agiliza procesos y potencia tu negocio. ¡Únete a quienes ya transformaron su clínica!
                                        </p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="offset-negative-70"><img src="/vetting/landing/images/home-2-386x503.jpg" alt="" width="386" height="503" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Thin CTA-->
        <section class="section section-xs bg-primary-darker text-center section-decorated-2">
            <div class="decor-1"><img src="/vetting/landing/images/bubbles-225x463.png" alt="" width="225" height="463" />
            </div>
            <div class="decor-2"><img src="/vetting/landing/images/bubbles-83x127.png" alt="" width="83" height="127" />
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-12">
                        <div class="box-cta-thin">
                            <h4 class="wow-outer"><span class="wow slideInRight">Cuidado personal cualificado para sus mascotas</span></h4>
                            <!-- <div class="wow-outer button-outer"><a class="button button-primary button-winona wow slideInLeft" href="pricing.html">View all pricing</a></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="section-lg text-center">
            <div class="container">
                <h3 class="wow-outer"><span class="wow slideInUp">Servicicos</span></h3>
                <p class="wow-outer"><span class="wow slideInDown text-width-1">
                        Ofrecemos una variedad de servicios de peluquería para perros de todas las razas y edades. Sólo utilizamos productos de alta calidad que se adaptan a las necesidades de su mascota. Descubra nuestros servicios más populares a continuación.
                    </span></p>
                <div class="row row-30 offset-top-2">
                    <div class="col-sm-6 col-lg-3 wow-outer">
                        <!-- Thumbnail Light-->
                        <article class="thumbnail-light wow slideInLeft"><a class="thumbnail-light-media" href="single-service.html"><img class="thumbnail-light-image" src="/vetting/landing/images/service-thumbnail-1-270x200.jpg" alt="" width="270" height="200" /></a>
                            <h5 class="thumbnail-light-title"><a href="single-service.html">Estilismo</a></h5>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-3 wow-outer">
                        <!-- Thumbnail Light-->
                        <article class="thumbnail-light wow slideInLeft" data-wow-delay=".05s"><a class="thumbnail-light-media" href="single-service.html"><img class="thumbnail-light-image" src="/vetting/landing/images/service-thumbnail-2-270x200.jpg" alt="" width="270" height="200" /></a>
                            <h5 class="thumbnail-light-title"><a href="single-service.html">Peluquería integral</a></h5>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-3 wow-outer">
                        <!-- Thumbnail Light-->
                        <article class="thumbnail-light wow slideInLeft" data-wow-delay=".1s"><a class="thumbnail-light-media" href="single-service.html"><img class="thumbnail-light-image" src="/vetting/landing/images/service-thumbnail-3-270x200.jpg" alt="" width="270" height="200" /></a>
                            <h5 class="thumbnail-light-title"><a href="single-service.html">Baño y aseo</a></h5>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-3 wow-outer">
                        <!-- Thumbnail Light-->
                        <article class="thumbnail-light wow slideInLeft" data-wow-delay=".15s"><a class="thumbnail-light-media" href="single-service.html"><img class="thumbnail-light-image" src="/vetting/landing/images/service-thumbnail-4-270x200.jpg" alt="" width="270" height="200" /></a>
                            <h5 class="thumbnail-light-title"><a href="single-service.html">Baño de lujo</a></h5>
                        </article>
                    </div>
                </div>
            </div>
            <div class="wow-outer button-outer"><a class="button button-primary-outline button-winona offset-top-2 wow slideInUp" href="services.html">Ver todos los servicios</a></div>
        </section>
        <!-- Pricing-->
        <!-- <section class="section section-lg bg-gray-100 section-decorated-7">
            <div class="decor-1"><img src="/vetting/landing/images/bubbles-171x230.png" alt="" width="171" height="230" />
            </div>
            <div class="container">
                <h3 class="wow-outer text-center"><span class="wow slideInDown">Precios</span></h3>
                <div class="row row-30">
                    <div class="col-sm-6 col-lg-4 wow-outer">
                        
                        <article class="pricing-minimal wow slideInRight">
                            <h5 class="pricing-minimal-title"><a href="single-service.html">Basic Package</a></h5>
                            <p class="pricing-minimal-price"><span class="pricing-minimal-price-currency">$</span>49.00</p>
                            <div class="pricing-minimal-divider"></div>
                            <p>
                                Nuestro paquete básico es una parte importante de la peluquería canina, ya que ofrece un baño y cepillado asequibles para perros de cualquier raza.
                            </p>
                            <a class="button button-primary button-winona" href="single-service.html">Haz tu pedido</a>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-4 wow-outer">
                        <article class="pricing-minimal wow slideInRight" data-wow-delay=".05s">
                            <h5 class="pricing-minimal-title"><a href="single-service.html">Paquete avanzado</a></h5>
                            <p class="pricing-minimal-price"><span class="pricing-minimal-price-currency">$</span>67.00</p>
                            <div class="pricing-minimal-divider"></div>
                            <p>
                                Nuestro paquete mejorado está diseñado para perros que necesitan un poco más de cariño manteniendo la piel hidratada, utilizando un champú y acondicionador especializados.
                            </p>
                            <a class="button button-primary button-winona" href="single-service.html">Haz tu pedido</a>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-4 wow-outer">
                        <article class="pricing-minimal wow slideInRight" data-wow-delay=".1s">
                            <h5 class="pricing-minimal-title"><a href="single-service.html">Paquete Pro</a></h5>
                            <p class="pricing-minimal-price"><span class="pricing-minimal-price-currency">$</span>86.00</p>
                            <div class="pricing-minimal-divider"></div>
                            <p>
                                Este paquete de spa definitivo está pensado para el cachorro mimado que necesita el trabajo y quiere disfrutar de un día de relajación y belleza.
                            </p>
                            <a class="button button-primary button-winona" href="single-service.html">Haz tu pedido</a>
                        </article>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- Testimonials-->
        <!-- <section class="section section-lg text-center">
            <div class="container">
                <h3 class="wow-outer"><span class="wow slideInDown">Testimonials</span></h3>
                <div class="owl-carousel wow fadeIn" data-items="1" data-md-items="2" data-lg-items="3" data-dots="true" data-nav="false" data-loop="true" data-margin="30" data-stage-padding="0" data-mouse-drag="false">
                    <blockquote class="quote-classic">
                        <div class="quote-classic-meta">
                            <div class="quote-classic-avatar"><img src="/vetting/landing/images/testimonials-person-1-96x96.jpg" alt="" width="96" height="96" />
                            </div>
                            <div class="quote-classic-info">
                                <cite class="quote-classic-cite">Kelly McMillan</cite>
                                <p class="quote-classic-caption">Private Entrepreneur</p>
                            </div>
                        </div>
                        <div class="quote-classic-text">
                            <p>My dog is 10 this year. She has been going to this grooming salon every day for the past five years. Thanks to the care and special shampoos used at SpaDog, she is now in very good health again.</p>
                        </div>
                    </blockquote>
                    <blockquote class="quote-classic">
                        <div class="quote-classic-meta">
                            <div class="quote-classic-avatar"><img src="/vetting/landing/images/testimonials-person-2-96x96.jpg" alt="" width="96" height="96" />
                            </div>
                            <div class="quote-classic-info">
                                <cite class="quote-classic-cite">Harold Barnett</cite>
                                <p class="quote-classic-caption">Regional Manager</p>
                            </div>
                        </div>
                        <div class="quote-classic-text">
                            <p>I bring my Westie “Dougie” to SpaDog for the past 4 years. Their groomers are fantastic, always do an amazing job and are always so nice and cheerful. Would recommend them to every dog owner!</p>
                        </div>
                    </blockquote>
                    <blockquote class="quote-classic">
                        <div class="quote-classic-meta">
                            <div class="quote-classic-avatar"><img src="/vetting/landing/images/testimonials-person-3-96x96.jpg" alt="" width="96" height="96" />
                            </div>
                            <div class="quote-classic-info">
                                <cite class="quote-classic-cite">Albert Webb</cite>
                                <p class="quote-classic-caption">CEO at Majestic</p>
                            </div>
                        </div>
                        <div class="quote-classic-text">
                            <p>My Yorkie ‘Toby’ has been coming to this grooming studio for over 8 years and always looks beautiful afterward. Having tried other grooming salons before, I wouldn’t bring him anywhere else.</p>
                        </div>
                    </blockquote>
                    <blockquote class="quote-classic">
                        <div class="quote-classic-meta">
                            <div class="quote-classic-avatar"><img src="/vetting/landing/images/testimonials-person-4-96x96.jpg" alt="" width="96" height="96" />
                            </div>
                            <div class="quote-classic-info">
                                <cite class="quote-classic-cite">Samantha Lee</cite>
                                <p class="quote-classic-caption">Sales Manager at Hillplan</p>
                            </div>
                        </div>
                        <div class="quote-classic-text">
                            <p>I really feel comfortable leaving my Max at SpaDog. He always comes homes happy and relaxed and the groomers there are warm, friendly and welcoming. They always do what you ask.</p>
                        </div>
                    </blockquote>
                    <blockquote class="quote-classic">
                        <div class="quote-classic-meta">
                            <div class="quote-classic-avatar"><img src="/vetting/landing/images/testimonials-person-5-96x96.jpg" alt="" width="96" height="96" />
                            </div>
                            <div class="quote-classic-info">
                                <cite class="quote-classic-cite">Bill Warner</cite>
                                <p class="quote-classic-caption">Private Entrepreneur</p>
                            </div>
                        </div>
                        <div class="quote-classic-text">
                            <p>We are in the area for a few months and my 2 furry boys needed grooming. SpaDog team was very friendly and the boys liked it there. They did not have to spend a lot of time there like so many places.</p>
                        </div>
                    </blockquote>
                    <blockquote class="quote-classic">
                        <div class="quote-classic-meta">
                            <div class="quote-classic-avatar"><img src="/vetting/landing/images/testimonials-person-6-96x96.jpg" alt="" width="96" height="96" />
                            </div>
                            <div class="quote-classic-info">
                                <cite class="quote-classic-cite">Adam Smith</cite>
                                <p class="quote-classic-caption">CEO at Majestic</p>
                            </div>
                        </div>
                        <div class="quote-classic-text">
                            <p>Thank you for making my dog look so fantastic! He was a smelly matted mess and now he looks so handsome! I will surely recommend your grooming salon to my friends and colleagues.</p>
                        </div>
                    </blockquote>
                </div>
            </div>
        </section> -->

        <!-- Centered CTA-->
        <!-- <section class="section section-1 bg-primary-darker text-center section-decorated-3">
            <div class="decor-1"><img src="/vetting/landing/images/bubbles-187x131.png" alt="" width="187" height="131" />
            </div>
            <div class="decor-2"><img src="/vetting/landing/images/bubbles-295x474.png" alt="" width="295" height="474" />
            </div>
            <div class="decor-3"><img src="/vetting/landing/images/home-3-359x546.png" alt="" width="359" height="546" />
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-lg-7 col-xl-6">
                        <h3 class="wow-outer"><span class="wow slideInDown">Best Grooming Services for Your Furry Friend</span></h3>
                        <p class="wow-outer offset-top-3"><span class="wow slideInDown" data-wow-delay=".05s">Our dog grooming salon is always ready to offer the best services for your pets. Schedule an appointment to make your dog look awesome!</span></p>
                        <div class="wow-outer button-outer"><a class="button button-primary button-winona wow slideInDown" href="#" data-wow-delay=".1s">Free consultation</a></div>
                    </div>
                </div>
            </div>
        </section> -->


        <!-- Latest Blog Posts-->
        <!-- <section class="section section-lg text-center section-decorated-4">
            <div class="decor-1"><img src="/vetting/landing/images/bubbles-187x131.png" alt="" width="187" height="131" />
            </div>
            <div class="container">
                <h3 class="wow-outer text-center"><span class="wow slideInDown">Latest Blog Posts</span></h3>
                <div class="row row-50">
                    <div class="col-md-6 wow-outer">
                        <article class="post-modern wow slideInLeft"><a class="post-modern-media" href="single-blog-post.html"><img src="/vetting/landing/images/grid-blog-1-570x353.jpg" alt="" width="570" height="353" /></a>
                            <h4 class="post-modern-title"><a href="single-blog-post.html">How To Keep Your Dog Cool In Summer</a></h4>
                            <ul class="post-modern-meta">
                                <li>by Theresa Barnes</li>
                                <li>
                                    <time datetime="2020">Apr 21, 2020 at 12:05 pm</time>
                                </li>
                                <li><a class="button-winona" href="#">News</a></li>
                            </ul>
                            <p>With summer upon us, it’s natural for us to all want to get out and enjoy the sunshine. However, if you’re a dog owner, extra care and consideration need to be taken during the warmer months. Sun...</p>
                        </article>
                    </div>
                    <div class="col-md-6 wow-outer">
                        <article class="post-modern wow slideInLeft"><a class="post-modern-media" href="single-blog-post.html"><img src="/vetting/landing/images/grid-blog-2-570x353.jpg" alt="" width="570" height="353" /></a>
                            <h4 class="post-modern-title"><a href="single-blog-post.html">Top Tips for Grooming an Unruly Doodle Coat</a></h4>
                            <ul class="post-modern-meta">
                                <li>by Theresa Barnes</li>
                                <li>
                                    <time datetime="2020">Apr 21, 2020 at 12:05 pm</time>
                                </li>
                                <li><a class="button-winona" href="#">News</a></li>
                            </ul>
                            <p>Doodle breeds have taken the world by storm in recent years. We’ve fallen head over heels in love with Labradoodles, Cockapoos, Cavapoos and Poochons. But with all that wavy fluff comes a...</p>
                        </article>
                    </div>
                </div>
                <div class="wow-outer button-outer"><a class="button button-primary-outline button-winona wow slideInUp" href="grid-blog.html">View all Blog posts</a></div>
            </div>
        </section> -->

        <!-- Contacts-->
        <section class="section bg-gray-100">
            <div class="range justify-content-xl-between">
                <div class="cell-xl-6 align-self-center container">
                    <div class="row">
                        <div class="col-lg-9 cell-inner">
                            <div class="section-lg">
                                <h3 class="wow-outer"><span class="wow slideInDown">Contactenos</span></h3>
                                <!-- RD Mailform-->
                                <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="https://ld-wt73.template-help.com/wt_prod-24921/bat/rd-mailform.php">
                                    <div class="row row-10">
                                        <div class="col-md-6 wow-outer">
                                            <div class="form-wrap wow fadeSlideInUp">
                                                <label class="form-label-outside" for="contact-first-name">Nombre</label>
                                                <input class="form-input" id="contact-first-name" type="text" name="name" data-constraints="@Required">
                                            </div>
                                        </div>
                                        <div class="col-md-6 wow-outer">
                                            <div class="form-wrap wow fadeSlideInUp">
                                                <label class="form-label-outside" for="contact-last-name">Apellidos</label>
                                                <input class="form-input" id="contact-last-name" type="text" name="name" data-constraints="@Required">
                                            </div>
                                        </div>
                                        <div class="col-md-6 wow-outer">
                                            <div class="form-wrap wow fadeSlideInUp">
                                                <label class="form-label-outside" for="contact-email">E-mail</label>
                                                <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Required @Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6 wow-outer">
                                            <div class="form-wrap wow fadeSlideInUp">
                                                <label class="form-label-outside" for="contact-phone">Teléfono</label>
                                                <input class="form-input" id="contact-phone" type="text" name="phone" data-constraints="@Required @PhoneNumber">
                                            </div>
                                        </div>
                                        <div class="col-12 wow-outer">
                                            <div class="form-wrap wow fadeSlideInUp">
                                                <label class="form-label-outside" for="contact-message">Tu Mensaje</label>
                                                <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="group group-middle">
                                        <div class="wow-outer">
                                            <button class="button button-primary button-winona wow slideInRight" type="submit">Enviar mensaje</button>
                                        </div>
                                        <!-- <p>or use</p>
                                        <div class="wow-outer"><a class="button button-primary-outline button-icon button-icon-left button-winona wow slideInLeft" href="#"><span class="icon text-primary mdi mdi-facebook-messenger"></span>Messenger</a></div> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell-xl-5 height-fill wow fadeIn">
                    <!-- <section class="col-md-12" style="background-color:red;">
                        <div id="maps" style="height: 350px; width: 100%;"></div>
                    </section> -->
                    <div class="google-map-container" data-marker="asset/imagesP/gmap_marker.png" data-marker-active="asset/imagesP/gmap_marker_active.png" data-styles="[{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#e9e9e9&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:29},{&quot;weight&quot;:0.2}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:18}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:21}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#dedede&quot;},{&quot;lightness&quot;:21}]},{&quot;elementType&quot;:&quot;labels.text.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:36},{&quot;color&quot;:&quot;#333333&quot;},{&quot;lightness&quot;:40}]},{&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;},{&quot;lightness&quot;:19}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:17},{&quot;weight&quot;:1.2}]}]" data-zoom="5" data-x="-73.9874068" data-y="40.643180">
                        <div class="google-map"></div>
                        <ul class="google-map-markers">
                            <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-description="9870 St Vincent Place, Glasgow"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Info-->
        <section class="section section-sm section-decorated-5">
            <div class="decor-1"><img src="/vetting/landing/images/bubbles-201x215.png" alt="" width="201" height="215" />
            </div>
            <div class="container">
                <div class="layout-bordered">
                    <div class="layout-bordered-item wow-outer">
                        <div class="layout-bordered-item-inner wow slideInUp">
                            <div class="icon icon-lg mdi mdi-phone text-primary"></div>
                            <ul class="list-0">
                                <li><a class="link-default" href="tel:#">+57 305 4648486</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="layout-bordered-item wow-outer">
                        <div class="layout-bordered-item-inner wow slideInUp">
                            <div class="icon icon-lg mdi mdi-email text-primary"></div>
                            <div><a class="link-default" href="mailto:#">vetconnet@gmail.com</a></div>
                        </div>
                    </div>
                    <div class="layout-bordered-item wow-outer">
                        <div class="layout-bordered-item-inner wow slideInUp">
                            <div class="icon icon-lg mdi mdi-map-marker text-primary"></div>
                            <div><a class="link-default" href="#">Colombia, Neiva-Huila</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Footer-->
        <footer class="section footer-advanced bg-gray-800">
            <!-- <div class="footer-advanced-main">
                <div class="container">
                    <div class="row row-50">
                        <div class="col-lg-4">
                            <h4>About Us</h4>
                            <p class="footer-advanced-text">Our firm is one of the leading accounting firms in the area. By combining our expertise, experience and the energy of our staff, each client receives close personal and professional attention. Our high standards, service and specialized staff spell the difference between our outstanding performance and other firms.</p>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <h4>Recent Blog Posts</h4>
                
                            <article class="post-inline">
                                <p class="post-inline-title"><a href="single-blog-post.html">Top Tips from Accountants: How To Handle IRS Scams</a></p>
                                <ul class="post-inline-meta">
                                    <li>by Theresa Barnes</li>
                                    <li><a href="single-blog-post.html">2 days ago</a></li>
                                </ul>
                            </article>
                            <article class="post-inline">
                                <p class="post-inline-title"><a href="single-blog-post.html">Blogging for Financial Advisors: Build a Trusted Relationship Through Your Blog</a></p>
                                <ul class="post-inline-meta">
                                    <li>by Theresa Barnes</li>
                                    <li><a href="single-blog-post.html">2 days ago</a></li>
                                </ul>
                            </article>
                        </div>
                        <div class="col-sm-6 col-lg-4 block-1">
                            <h4>Our Projects</h4>
                            <div class="row row-x-10" data-lightgallery="group">
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal" href="images/gallery-original-1-1200x800.jpg" data-lightgallery="item"><img class="thumbnail-minimal-image" src="/vetting/landing/images/footer-gallery-1-85x85.jpg" alt="" width="85" height="85" />
                                        <div class="thumbnail-minimal-caption"></div>
                                    </a></div>
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal" href="images/gallery-original-2-1200x800.jpg" data-lightgallery="item"><img class="thumbnail-minimal-image" src="/vetting/landing/images/footer-gallery-2-85x85.jpg" alt="" width="85" height="85" />
                                        <div class="thumbnail-minimal-caption"></div>
                                    </a></div>
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal" href="images/gallery-original-3-1200x800.jpg" data-lightgallery="item"><img class="thumbnail-minimal-image" src="/vetting/landing/images/footer-gallery-3-85x85.jpg" alt="" width="85" height="85" />
                                        <div class="thumbnail-minimal-caption"></div>
                                    </a></div>
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal" href="images/gallery-original-4-1200x800.jpg" data-lightgallery="item"><img class="thumbnail-minimal-image" src="/vetting/landing/images/footer-gallery-4-85x85.jpg" alt="" width="85" height="85" />
                                        <div class="thumbnail-minimal-caption"></div>
                                    </a></div>
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal" href="images/gallery-original-5-1200x800.jpg" data-lightgallery="item"><img class="thumbnail-minimal-image" src="/vetting/landing/images/footer-gallery-5-85x85.jpg" alt="" width="85" height="85" />
                                        <div class="thumbnail-minimal-caption"></div>
                                    </a></div>
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal" href="images/gallery-original-6-1200x800.jpg" data-lightgallery="item"><img class="thumbnail-minimal-image" src="/vetting/landing/images/footer-gallery-6-85x85.jpg" alt="" width="85" height="85" />
                                        <div class="thumbnail-minimal-caption"> </div>
                                    </a></div>
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal" href="images/gallery-original-7-1200x800.jpg" data-lightgallery="item"><img class="thumbnail-minimal-image" src="/vetting/landing/images/footer-gallery-7-85x85.jpg" alt="" width="85" height="85" />
                                        <div class="thumbnail-minimal-caption"></div>
                                    </a></div>
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal" href="images/gallery-original-8-1200x800.jpg" data-lightgallery="item"><img class="thumbnail-minimal-image" src="/vetting/landing/images/footer-gallery-8-85x85.jpg" alt="" width="85" height="85" />
                                        <div class="thumbnail-minimal-caption"></div>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="footer-advanced-aside">
                <div class="container">
                    <div class="footer-advanced-layout">
                        <!-- <div>
                            <ul class="list-nav">
                                <li><a href="index-2.html">Home</a></li>
                                <li><a href="about-us.html">About</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="grid-gallery.html">Gallery</a></li>
                                <li><a href="grid-blog.html">Blog</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                            </ul>
                        </div> -->
                        <div>
                            <ul class="list-inline list-inline-md">
                                <li><a class="icon icon-sm link-gray-light mdi mdi-facebook" href="#"></a></li>
                                <li><a class="icon icon-sm link-gray-light mdi mdi-twitter" href="#"></a></li>
                                <li><a class="icon icon-sm link-gray-light mdi mdi-instagram" href="#"></a></li>
                                <li><a class="icon icon-sm link-gray-light mdi mdi-google" href="#"></a></li>
                                <li><a class="icon icon-sm link-gray-light mdi mdi-linkedin" href="#"></a></li>
                            </ul>
                        </div>
                        <div class="container">
                            <div class="footer-advanced-layout"><a class="brand" href="index-2.html"><img src="plantilla/assets/img/Vetconnect.png" alt="" width="167" height="44" /></a>
                                <!-- Rights-->
                                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>Todos los derechos reservados Para Vetconect.</span><span>&nbsp;</span><br class="d-sm-none" /></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="/vetting/landing/js/core.min.js"></script>
    <script src="/vetting/landing/js/script.js"></script>
</body>

<!-- Mirrored from ld-wt73.template-help.com/wt_prod-24921/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Oct 2024 14:44:50 GMT -->

</html>