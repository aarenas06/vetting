<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Vetting/modules/perfilUser/controller/controller.php');
$control = new Controller;
$Modulos = $control->GetModulos();
$UsuCod = $_SESSION['UsuCod'];
$User = $_SESSION['User'];
?>

<style>
    /* Flex container para organizar las cartas */
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        /* Espacio entre cartas */
    }

    /* Cada carta ocupa el 25% del ancho del contenedor */
    .card-item {
        width: calc(25% - 16px);
        /* Ajuste para el margen */
        box-sizing: border-box;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<input type="hidden" id="UsuCod" value="<?= $UsuCod; ?>">
<input type="hidden" id="User" value="<?= $User; ?>">
<div class="contenido">
    <div class="container-fluid">
        <div class="card overflow-hidden">
            <div class="card-body p-0">
                <img src="/vetting/modules/perfilUser/wallpaper.jpg" alt="" class="img-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-4 order-lg-1 order-2">
                        <div class="d-flex align-items-center justify-content-around m-4">
                            <div class="text-center">

                            </div>
                            <div class="text-center">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                        <div class="mt-n5">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 110px; height: 110px;" ;>
                                    <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                        style="width: 100px; height: 100px;" ;>
                                        <img src="/vetting/plantilla/assets/img/home/profile.jpg" alt=""
                                            class="w-100 h-100">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="fs-5 mb-0 fw-semibold" id="Nombre"></h5>
                                <p class="mb-0 fs-4" id="Rol"></p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 order-last">
                        <ul
                            class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-start my-3 gap-3">
                            <li class="position-relative">
                                <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle"
                                    href="javascript:void(0)" width="30" height="30">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                    href="javascript:void(0)">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                    href="javascript:void(0)">
                                    <i class="ti ti-brand-dribbble"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                    href="javascript:void(0)">
                                    <i class="ti ti-brand-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </div>
                <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 bg-light-info rounded-2"
                    id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                            id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                            role="tab" aria-controls="pills-profile" aria-selected="true">
                            <i class="ti ti-user-circle me-2 fs-6"></i>
                            <span class="d-none d-md-block">Perfil</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                            id="pills-followers-tab" data-bs-toggle="pill" data-bs-target="#pills-followers"
                            type="button" role="tab" aria-controls="pills-followers" aria-selected="false">
                            <i class="ti ti-heart me-2 fs-6"></i>
                            <span class="d-none d-md-block">Mascotas</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                    <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Configura tu Perfil <span
                            class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2"></span></h3>
                </div>
                <div class="contenedor" style="margin:20px">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="InputNombre"
                                    placeholder="Nombre...">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Identificación</label>
                                <input type="text" class="form-control" id="InputIdentificacion"
                                    placeholder="Identificación...">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="InputDireccion"
                                    placeholder="Direccion...">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Celular</label>
                                <input type="number" class="form-control" id="InputCelular"
                                    placeholder="Celular...">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="InputEmail"
                                    placeholder="Email...">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="InputContrasena" placeholder="Contraseña...">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword" onclick="togglePassword()" style="border: none;">
                                        <i class="fa-solid fa-eye" id="toggleIcon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="FotoNombre" placeholder="Foto de Tu Mascota" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                                <input type="file" id="FotoInput" style="display: none;" accept=".jpg,.jpeg" onchange="updateFileName()">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="document.getElementById('FotoInput').click();">Seleccionar</button>
                            </div>
                        </div>
                    </div>

                    <center>
                        <button class="btn btn-primary" onclick="UpdateDataPerfil()">Actualizar</button>
                    </center>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-followers" role="tabpanel" aria-labelledby="pills-followers-tab"
                tabindex="0">
                <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                    <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Mascotas </h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="cartaMasco" class="card-container">
                            <!-- Aquí se añadirán las cartas dinámicamente -->
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/vetting/modules/perfilUser/script.js"></script>