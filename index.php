<!DOCTYPE html>
<html>

<style>
  /* Estilos para los botones */
  .quote_btn-container button {
    color: black;
    border-radius: 12px;
    padding: 10px 20px;
    text-decoration: underline;
    text-decoration-color: green;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  /* Estilo al pasar el mouse (hover), Subrayado */
  .quote_btn-container button:hover {
    background-color: #E7E3E3;
    color: black;
  }

  /* ESTOLOS PARA EL BOTON DE whatsapp */
  .whatsapp-float {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 20px;
    right: 20px;
    background-color: #25d366;
    color: white;
    border-radius: 50px;
    text-align: center;
    font-size: 30px;
    box-shadow: 2px 2px 3px #999;
    z-index: 1000;
    transition: background-color 0.3s ease;
  }

  .whatsapp-float i {
    margin-top: 16px;
    color: white;
    font-size: 35px;
  }

  .whatsapp-float:hover {
    background-color: #22bb53;
  }

  .whatsapp-float:hover i {
    color: #f0f0f0;
  }

  /* Estilos específicos para el modal de registro */
  .custom-modal-registrarse .modal-content {
    background-color: #f8f9fa;
    /* Fondo claro y elegante */
    border-radius: 8px;
    /* Bordes ligeramente redondeados */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    /* Sombra suave */
    border: none;
    /* Sin bordes */
  }

  .custom-modal-registrarse .modal-header {
    background-color: #E0DEDE;
    /* Azul Bootstrap para el encabezado */
    color: black;
    /* Texto en blanco */
    border-bottom: none;
    /* Eliminar borde inferior */
    text-align: center;
    /* Centrar el título */
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
  }

  .custom-modal-registrarse .modal-header h4 {
    margin: 0;
    font-size: 22px;
    /* Tamaño del título */
    font-weight: bold;
  }

  .custom-modal-registrarse .modal-body {
    padding: 20px;
  }

  .custom-modal-registrarse .input-group {
    margin-bottom: 15px;
  }

  .custom-modal-registrarse .input-group .input-group-text {
    background-color: #6c757d;
    /* Color gris oscuro para los íconos */
    color: white;
    /* Color blanco para los íconos */
    border: none;
    /* Sin bordes */
    border-radius: 0.25rem 0 0 0.25rem;
    /* Bordes redondeados para los inputs */
  }

  .custom-modal-registrarse .input-group .form-control {
    border-left: none;
    /* Eliminar borde entre el ícono y el input */
  }

  .custom-modal-registrarse .btn-primary {
    background-color: #469DFF;
    /* Verde elegante */
    border-color: #469DFF;
    padding: 10px 20px;
    /* Espacio interno */
    font-size: 16px;
    /* Tamaño de fuente adecuado */
    border-radius: 25px;
    /* Botón más redondeado */
    transition: background-color 0.3s ease;
    /* Efecto suave al pasar el mouse */
  }

  .custom-modal-registrarse .btn-primary:hover {
    background-color: #218838;
    /* Verde oscuro en hover */
  }

  .custom-modal-registrarse .modal-body hr {
    border-top: 1px solid #007bff;
    /* Personalización del <hr> */
  }

  .custom-modal-registrarse .modal-footer {
    text-align: center;
    /* Centrar el botón */
  }

  /* Extra estilos para una mejor experiencia */
  .custom-modal-registrarse .modal-body input {
    padding: 12px;
    /* Mayor espacio dentro de los inputs */
  }

  .custom-modal-registrarse .modal-body .input-group-text i {
    font-size: 18px;
    /* Tamaño adecuado de los íconos */
    color: white;
  }

  .custom-modal-registrarse .modal-body input::placeholder {
    color: #6c757d;
    /* Placeholder gris claro */
    opacity: 1;
    /* Asegura que el color del placeholder se vea */
  }
</style>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>vetting</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="asset/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="asset/css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

</head>

<body>

  <!-- Botón flotante de WhatsApp -->
  <a href="https://wa.me/1234567890" class="whatsapp-float" target="_blank">
    <i class="fa-brands fa-whatsapp"></i>
  </a>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="">
            <span>
              Petology
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>


          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav">
                <!-- Aquí pueden ir los enlaces de navegación -->
              </ul>
            </div>

            <!-- Botón "Registrate" -->
            <div class="quote_btn-container d-flex justify-content-center">
              <button class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModalRegistrase">Registrase</button>
            </div>

            <!-- Botón "Iniciar Sesion" con margen a la izquierda -->
            <div class="quote_btn-container d-flex justify-content-center ms-2">
              <button class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Iniciar Sesion</button>
            </div>
          </div>


        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="slider_detail-box">
                    <h1>
                      Professional
                      <span>
                        Care Your Pet
                      </span>
                    </h1>
                    <p>
                      Lorem Ipsum is simply dummy text of the printing and
                      typesetting industry.
                      Lorem Ipsum has been the industry's standard dummy text ever
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Buy now
                      </a>
                      <a href="" class="btn-2">
                        Contact
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="slider_img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="slider_detail-box">
                    <h1>
                      Professional
                      <span>
                        Care Your Pet
                      </span>
                    </h1>
                    <p>
                      Lorem Ipsum is simply dummy text of the printing and
                      typesetting industry.
                      Lorem Ipsum has been the industry's standard dummy text ever
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Buy now
                      </a>
                      <a href="" class="btn-2">
                        Contact
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="slider_img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="slider_detail-box">
                    <h1>
                      Professional
                      <span>
                        Care Your Pet
                      </span>
                    </h1>
                    <p>
                      Lorem Ipsum is simply dummy text of the printing and
                      typesetting industry.
                      Lorem Ipsum has been the industry's standard dummy text ever
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Buy now
                      </a>
                      <a href="" class="btn-2">
                        Contact
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="slider_img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="slider_detail-box">
                    <h1>
                      Professional
                      <span>
                        Care Your Pet
                      </span>
                    </h1>
                    <p>
                      Lorem Ipsum is simply dummy text of the printing and
                      typesetting industry.
                      Lorem Ipsum has been the industry's standard dummy text ever
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Buy now
                      </a>
                      <a href="" class="btn-2">
                        Contact
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="slider_img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- Modal Iniciar Sesion-->
  <div class="modal fade" id="exampleModal" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>

            <h2>Inicia Sesión</h2>

          </center>

          <div class="input-group mb-3">
            <span class="input-group-text btn-box btn-1" id="basic-addon1"><i style="color: black;" class="fa-solid fa-user"></i></span>
            <input type="text" class="form-control" id="User" placeholder="Usuario" aria-label="Usuario">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text btn-box" id="basic-addon1"><i style="color: black;" class="fa-solid fa-key"></i></span>
            <input type="password" class="form-control" id="Pass" placeholder="Contraseña" aria-label="Contraseña">
          </div>
          <span>¿Aún no tienes cuenta? <a href="registro.php">Registrate Gratis</a></span> <br>
          <center>
            <button style="margin-top: 10px;" class="btn btn-block btn-success btn-sm" onclick="Validar()">Ingresar</button>
          </center>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Registrarse-->
  <div class="modal fade custom-modal-registrarse" id="exampleModalRegistrase" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <i class="fa-solid fa-address-card" style="color: #ffffff;"></i>
            </span>
            <input type="text" class="form-control" id="IdentPropietarios" placeholder="Identificación" aria-label="IdentPropietarios">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text btn-box">
              <i class="fa-solid fa-phone-volume" style="color: #ffffff;"></i>
            </span>
            <input type="text" class="form-control" id="TelPropietarios" placeholder="Teléfono" aria-label="TelPropietarios">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text btn-box">
              <i class="fa-solid fa-location-dot" style="color: #ffffff;"></i>
            </span>
            <input type="text" class="form-control" id="DirPropietarios" placeholder="Dir. Residencial" aria-label="DirPropietarios">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text btn-box">
              <i class="fa-solid fa-envelope" style="color: #ffffff;"></i>
            </span>
            <input type="email" class="form-control" id="EmailPropietarios" placeholder="Correo Electrónico" aria-label="EmailPropietarios">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text btn-box">
              <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i>
            </span>
            <input type="text" class="form-control" id="UsuPropietarios" placeholder="Usuario" aria-label="UsuPropietarios">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text btn-box">
              <i class="fa-solid fa-key" style="color: #ffffff;"></i>
            </span>
            <input type="password" class="form-control" id="PassPropietarios" placeholder="Contraseña" aria-label="PassPropietarios">
          </div>

          <center>
            <hr>
            <button class="btn btn-block btn-primary btn-sm" onclick="InsertPropietarios()">Registrarse</button>
          </center>
        </div>
      </div>
    </div>
  </div>


  <!-- about Registrarse -->
  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <h2 class="custom_heading">
              About Our Pets
              <span>
                Clinic
              </span>
            </h2>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
              industry's standard dummy text ever since theLorem Ipsum is simply dummy text of the printing and
              typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
            </p>
            <div>
              <a href="">
                About More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- service section -->
  <section class="service_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 offset-md-2">
          <h2 class="custom_heading">
            Our <span>Services</span>
          </h2>
          <div class="container layout_padding2">
            <div class="row">
              <div class="col-md-4">
                <div class="img_box">
                  <img src="images/s-1.png" alt="">
                </div>
                <div class="detail_box">
                  <h6>
                    Pet Care
                  </h6>
                  <p>
                    onsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exe
                  </p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="img_box">
                  <img src="images/s-2.png" alt="">
                </div>
                <div class="detail_box">
                  <h6>
                    Pet Hotel
                  </h6>
                  <p>
                    onsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exe
                  </p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="img_box">
                  <img src="images/s-3.png" alt="">
                </div>
                <div class="detail_box">
                  <h6>
                    Emergency
                  </h6>
                  <p>
                    onsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exe
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <img src="images/tool.png" alt="" class="w-100">
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->

  <!-- end gallery section -->

  <!-- buy section -->

  <section class="buy_section layout_padding">
    <div class="container">
      <h2>
        You Can Buy Pet From Our Clinic
      </h2>
      <p>
        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
      </p>
      <div class="d-flex justify-content-center">
        <a href="">
          Buy Now
        </a>
      </div>
    </div>
  </section>

  <!-- end buy section -->

  <!-- client section -->
  <section class="client_section layout_padding-bottom">
    <div class="container">
      <h2 class="custom_heading text-center">
        What Say Our
        <span>
          clients
        </span>
      </h2>
      <p class="text-center">
        orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut la
      </p>
      <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="layout_padding2 pl-100">
              <div class="client_container ">
                <div class="img_box">
                  <img src="images/client.jpg" alt="">
                </div>
                <div class="detail_box">
                  <h5>
                    Sandy Mark
                  </h5>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea
                    commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="layout_padding2 pl-100">
              <div class="client_container ">
                <div class="img_box">
                  <img src="images/client.jpg" alt="">
                </div>
                <div class="detail_box">
                  <h5>
                    Sandy Mark
                  </h5>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea
                    commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="layout_padding2 pl-100">
              <div class="client_container ">
                <div class="img_box">
                  <img src="images/client.jpg" alt="">
                </div>
                <div class="detail_box">
                  <h5>
                    Sandy Mark
                  </h5>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea
                    commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


    </div>

  </section>
  <!-- end client section -->

  <!-- map section -->

  <section class="map_section">
    <div id="map" class="h-100 w-100 ">
    </div>

    <div class="form_container ">
      <div class="row">
        <div class="col-md-8 col-sm-10 offset-md-4">
          <form action="">
            <div class="text-center">
              <h3>
                Contact Us
              </h3>
            </div>
            <div>
              <input type="text" placeholder="Name" class="pt-3">
            </div>
            <div>
              <input type=" text" placeholder="Pone Number">
            </div>
            <div>
              <input type="email" placeholder="Email">
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message">
            </div>
            <div class="d-flex justify-content-center">
              <button>
                SEND
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </section>


  <!-- end map section -->

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_items">
        <a href="">
          <div class="item ">
            <div class="img-box box-1">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                Location
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-2">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                +02 1234567890
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-3">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                demo@gmail.com
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; 2019 All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.js"></script>

  <script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 40.645037,
          lng: -73.880224
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 40.645037,
          lng: -73.880224
        },
        map: map,
        icon: image
      });
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- google map js -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>

</body>
</body>

</html>