<?php
if (!isset($_POST)) {
    echo 'hay accion';
    print_r($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    <title>VetConnect-Login</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="author" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="/vetting/plantilla/assets/img/icon.png" />

    <link id="themeColors" rel="stylesheet" href="/vetting/plantilla/assets/dist/css/style.min.css" />
</head>

<body>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8">
                        <a href="./index.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                            <img src="/vetting/plantilla/assets/img/Vetconnect.png" width="180" alt="">
                        </a>
                        <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
                            <img src="/vetting/plantilla/assets/img/banner2.png" alt="" class="img-fluid" width="700">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="col-sm-8 col-md-6 col-xl-9">
                                <center><img src="/vetting/plantilla/assets/img/icon.png" alt=""></center><br>
                                <h2 class="mb-3 fs-7 fw-bolder">Bienvenido a VetConnect</h2>
                                <p class=" mb-9">Cuidando a tus mascotas, cuidamos de ti.</p>

                                <hr>
                                <form method="post" action="#">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Usuario</label>
                                        <input type="text" class="form-control" name="UserEmp" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" name="PassEmp">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <!-- <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                Recordar en este dispositivo
                                            </label>
                                        </div> -->
                                        <a class="text-primary fw-medium" href="./authentication-forgot-password.html">¿Olvidaste la contraseña ?</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Entrar</button>
                                    <!-- <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-medium">¿Nuevo en VetConnect?</p>
                                        <a class="text-primary fw-medium ms-2" href="/vetting/plantilla/index.php/Portal/Registro">Crear una cuenta</a>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--  Import Js Files -->
    <script src="/vetting/plantilla/assets/dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="/vetting/plantilla/assets//dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="/vetting/plantilla/assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--  core files -->
    <script src="/vetting/plantilla/assets/dist/js/app.min.js"></script>
    <script src="/vetting/plantilla/assets/dist/js/app.init.js"></script>
    <script src="/vetting/plantilla/assets/dist/js/app-style-switcher.js"></script>
    <script src="/vetting/plantilla/assets/dist/js/sidebarmenu.js"></script>
    <script src="/vetting/plantilla/assets/dist/js/custom.js"></script>
</body>

</html>