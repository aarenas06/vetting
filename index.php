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

        /* Estilos del botón flotante */
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 20px;
            right: 20px;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            z-index: 1000;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            text-decoration: none;
            transition: transform 0.3s;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <!-- BOTON FLOTANTE DE WHATSAPP -->
    <a href="https://wa.me/573054648486" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

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
            <div class="rd-navbar-wrap responsive">
                <nav class="rd-navbar rd-navbar-corporate">
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <div class="rd-navbar-nav-wrap">
                                <div class="rd-navbar-search" id="rd-navbar-search">
                                    <img class="rd-navbar-search-toggle" src="/vetting/plantilla/assets/img/Vetconnect.png" alt="" width="50%" height="50%">
                                </div>

                                <ul class="rd-navbar-nav" id="navbarItems">
                                    <li class="rd-nav-item active"><a class="rd-nav-link" href="index.php">Home</a></li>
                                    <li class="rd-nav-item active"><a class="rd-nav-link" onclick="ModalRegistrarse()">Registrarse</a></li>
                                    <li class="rd-nav-item active"><a class="rd-nav-link" onclick="ModalIniciosession()">Iniciar sesión</a></li>
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
                            <span class="input-group-text btn-box">
                                <i class="fa-solid fa-key"></i>
                            </span>
                            <input type="password" class="form-control" id="Pass" placeholder="Contraseña" aria-label="Pass">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword" onclick="togglePasswordInicio()" style="border: none;">
                                <i class="fa-solid fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>

                        <div class="text-center mb-2">
                            <span>¿Aún no tienes cuenta?
                                <a href="javascript:void(0);" class="text-primary" onclick="ModalRegistrarseIni()">Regístrate Gratis</a>
                            </span>
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
                            <input type="text" class="form-control" id="NomPropietarios" placeholder="Nombre" aria-label="NomPropietarios"
                                pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+"
                                oninput="this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g, '')">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text btn-box">
                                <i class="fa-solid fa-address-card"></i>
                            </span>
                            <input type="number" class="form-control" id="IdentPropietarios" placeholder="Identificación" aria-label="IdentPropietarios">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text btn-box btn-1" id="basic-addon1">
                                <i class="fa-solid fa-user-large"></i>
                            </span>
                            <select name="SexPropietarios" id="SexPropietarios" class="form-control form-select" aria-label="SexPropietarios">
                                <option value="" disabled selected>Sexo</option>
                                <option value="0">Hombre</option>
                                <option value="1">Mujer</option>
                                <option value="3">Otro..</option>
                            </select>
                        </div>


                        <div class="input-group mb-3">
                            <span class="input-group-text btn-box">
                                <i class="fa-solid fa-phone-volume"></i>
                            </span>
                            <input type="number" class="form-control" id="TelPropietarios" placeholder="Teléfono" aria-label="TelPropietarios">
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
                            <input type="password" class="form-control" id="PassPropietarios" placeholder="Contraseña" aria-label="PassPropietarios">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword" onclick="togglePasswordRegistrar()" style="border: none;">
                                <i class="fa-solid fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>

                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termsConditions">
                                <label class="form-check-label" for="termsConditions">
                                    Acepto los 
                                    <span style="cursor: pointer;" onclick="Opentyc()" onmouseover="this.style.color='blue';" onmouseout="this.style.color='black';">
                                        <b><u>términos y condiciones</u></b>
                                    </span>

                                </label>
                            </div>
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
                                        <h1><span class="font-weight-light"><span>Cuidamos a  tus Mascotas,</span></span><span class="font-weight-bold"><span>Cuidamos de ti</span></span></h1>
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
                        Ofrecemos una variedad de servicios todas las especies de animales. Sólo utilizamos productos de alta calidad que se adaptan a las necesidades de su mascota. Descubra nuestros servicios más populares a continuación.
                    </span></p>
                <div class="row row-30 offset-top-2">
                    <div class="col-sm-6 col-lg-3 wow-outer">
                        <!-- Thumbnail Light-->
                        <article class="thumbnail-light wow slideInLeft"><a class="thumbnail-light-media" href="single-service.html"><img class="thumbnail-light-image" src="/vetting/landing/images/service-thumbnail-2-270x200.jpg" alt="" width="270" height="200" /></a>
                            <h5 class="thumbnail-light-title"><a href="single-service.html">Estilismo Animal</a></h5>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-3 wow-outer">
                        <!-- Thumbnail Light-->
                        <article class="thumbnail-light wow slideInLeft" data-wow-delay=".05s"><a class="thumbnail-light-media" href="single-service.html"><img class="thumbnail-light-image" src="/vetting/landing/images/atencion24h.jpg" alt="" width="270" height="200" /></a>
                            <h5 class="thumbnail-light-title"><a href="single-service.html">Antención 24 Horas</a></h5>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-3 wow-outer">
                        <!-- Thumbnail Light-->
                        <article class="thumbnail-light wow slideInLeft" data-wow-delay=".1s"><a class="thumbnail-light-media" href="single-service.html"><img class="thumbnail-light-image" src="/vetting/landing/images/HC.jfif" alt="" width="270" height="200" /></a>
                            <h5 class="thumbnail-light-title"><a href="single-service.html">Historial clínico</a></h5>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-3 wow-outer">
                        <!-- Thumbnail Light-->
                        <article class="thumbnail-light wow slideInLeft" data-wow-delay=".15s"><a class="thumbnail-light-media" href="single-service.html"><img class="thumbnail-light-image" src="/vetting/landing/images/vacunacion.jpg" alt="" width="270" height="200" /></a>
                            <h5 class="thumbnail-light-title"><a href="single-service.html">Vacunación</h5>
                        </article>
                    </div>
                </div>
            </div>
            <!-- <div class="wow-outer button-outer"><a class="button button-primary-outline button-winona offset-top-2 wow slideInUp" href="services.html">Ver todos los servicios</a></div> -->
        </section>


        <!-- Page Footer-->
        <footer class="section footer-advanced bg-gray-800">
            <div class="footer-advanced-aside">
                <div class="container">
                    <div class="footer-advanced-layout">
                        <!-- <div>
                            <ul class="list-inline list-inline-md">
                                <li><a class="icon icon-sm link-gray-light mdi mdi-facebook" href="#"></a></li>
                                <li><a class="icon icon-sm link-gray-light mdi mdi-twitter" href="#"></a></li>
                                <li><a class="icon icon-sm link-gray-light mdi mdi-instagram" href="#"></a></li>
                                <li><a class="icon icon-sm link-gray-light mdi mdi-google" href="#"></a></li>
                                <li><a class="icon icon-sm link-gray-light mdi mdi-linkedin" href="#"></a></li>
                            </ul>
                        </div> -->
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
    <script>
        function Opentyc() {
            window.open(
                "/vetting/TyC.php",
                "ventana1",
                "w idth=600,height=500,scrollbars=NO"
            );
        }
    </script>
</body>

<!-- Mirrored from ld-wt73.template-help.com/wt_prod-24921/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Oct 2024 14:44:50 GMT -->

</html>