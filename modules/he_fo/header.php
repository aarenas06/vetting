<?php session_start();
// Verifica si las variables de sesión no existen
if (!isset($_SESSION["UsuCod"])) {
    // Muestra el mensaje
    echo '<script>alert("No has iniciado sesión");</script>';

    // Redirige a la pantalla principal
    echo '<script>window.location.href = "http://localhost/vetting/";</script>';
    exit; // Agrega exit para detener la ejecución del script después de la redirección
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    <title>VetConnect</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <!--  Favicon -->
    <link rel="shortcut icon" href="/vetting/plantilla/assets/img/icon.png" />
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="/vetting/plantilla/assets/dist/css/tabler-icons/tabler-icons.css">

    <link rel="stylesheet" href="/vetting/plantilla/assets/dist/css/owl.carousel.min.css">
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="/vetting/plantilla/assets/dist/css/style.min.css" />

    <link rel="stylesheet" href="/vetting/plantilla/assets/css/mystyle.css" />

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-yboEl7AImU6k6HjdnRn7hxOxlQpFRKlNeI3+KkI4UgDq+qFOmj7fwboXf1g8oTbiuID9AO48ewAHVV9mkgfsIg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- text -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;1,700&family=Kanit:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">


    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jszip@3.1.3/dist/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<style>
    .title {
        font-family: 'Kanit', sans-serif;
    }

    #sidebar-nav {
        text-align: left;
        margin-left: 0;
        padding-left: 0;
    }
</style>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar w-xs-20">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="/vetting/plantilla/assets/img/Vetconnect.png" class="dark-logo" width="180" alt="" />
                    </a>
                    <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8 text-muted"></i>
                    </div>
                </div>
                <nav class="sidebar-nav scroll-sidebar" id="sidebar-nav" data-simplebar>
                    <ul id="sidebarnav">
                        <?php if ($_SESSION['Tip'] == 1 || $_SESSION['Tip'] == 3) { ?>
                            <li class="nav-small-cap">
                                <span class="hide-menu">Disponibilidad</span>
                                <div class="switch-container">
                                    <label class="switch">
                                        <input type="checkbox" id="toggleSwitch">
                                        <span class="slider"></span>
                                    </label> </br></br>

                                </div>
                            </li>
                        <?php } ?>


                        <?php if ($_SESSION['Tip'] == 3) { ?>
                            <li class="nav-small-cap" style="margin-top:0px;">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Admin</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="?p=Planes/index" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-aperture"></i>
                                    </span>
                                    <span class="hide-menu">Planes</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="?p=Empresas/index" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-aperture"></i>
                                    </span>
                                    <span class="hide-menu">Empresas</span>
                                </a>
                            </li>
                        <?php } ?>


                        <?php if ($_SESSION['Tip'] == 1 || $_SESSION['Tip'] == 3) { ?>
                            <li class="nav-small-cap" style="margin-top: 0px;">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Empresas</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="?p=Empleados/index" aria-expanded="false">
                                    <span>
                                        <i class="fa-solid fa-people-line"></i>
                                    </span>
                                    <span class="hide-menu">Personal</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="?p=Clientes/index" aria-expanded="false">
                                    <span>
                                        <i class="fa-solid fa-person"></i>
                                    </span>

                                    <span class="hide-menu">Clientes</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="?p=Agenda/index" aria-expanded="false">
                                    <span>
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </span>
                                    <span class="hide-menu">Agenda</span>

                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($_SESSION['Tip'] == 2 || $_SESSION['Tip'] == 3) { ?>

                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Usuarios</span>
                            </li>
                            <li class="sidebar-item">

                                <a class="sidebar-link" href="?p=Home/index" aria-expanded="false">
                                    <span>
                                        <i class="fa-solid fa-house"></i>
                                    </span>
                                    <span class="hide-menu">Home</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="?p=Mascotas/index" aria-expanded="false">
                                    <span>
                                        <i class="fa-solid fa-paw"></i>
                                    </span>
                                    <span class="hide-menu">Mascotas </span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>

            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="d-block d-lg-none"></div>
                    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="p-2">
                            <i class="ti ti-dots fs-7"></i>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                                <i class="ti ti-align-justified fs-7"></i>
                            </a>
                            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">

                                <!-- Botón de notificaciones -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link position-relative" href="javascript:void(0)" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-bell fs-4"></i>
                                        <!-- Insignia de notificaciones dinámica -->
                                        <span id="notificationCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="transform: translate(-50%, -50%); font-size: 0.75rem; padding: 0.2em 0.4em;">
                                            <!-- Número dinámico de notificaciones -->
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="notificationDropdown">
                                        <div class="p-3">
                                            <h6 class="m-0">Notificaciones</h6>
                                        </div>
                                        <div class="list-group list-group-flush" id="contenNotifi">
                                            <!-- Las notificaciones se agregarán aquí dinámicamente -->
                                        </div>
                                    </div>
                                </li>

                                <!-- Botón de perfil (ya existente) -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <input type="hidden" id="UsuCod" value="<?= $_SESSION['UsuCod']; ?>">
                                            <div class="user-profile-img">
                                                <div id="HeadFotoPerfil">
                                                    <!-- La imagen se insertará aquí desde JavaScript -->
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                        <div class="profile-dropdown position-relative" data-simplebar>
                                            <div class="py-3 px-7 pb-0">
                                                <h5 class="mb-0 fs-5 fw-semibold">Perfil</h5>
                                            </div>
                                            <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                <img src="" id="FotoPerfilPerfil" class="rounded-circle" width="80" height="80" alt="" />
                                                <div class="ms-3">
                                                    <h5 class="mb-1 fs-3"><?= $_SESSION['Nombre'] ?></h5>
                                                    <span class="mb-1 d-block text-dark"><?= $_SESSION['RolObs'] ?></span>
                                                    <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                        <i class="ti ti-mail fs-4"></i> <?= $_SESSION['UsuEmail'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="message-body">
                                                <a href="/vetting/modules/principal.php?p=perfilUser/index" class="py-8 px-7 mt-8 d-flex align-items-center">
                                                    <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                        <img src="/vetting/plantilla/assets/img/home/icon-account.svg" alt="" width="24" height="24">
                                                    </span>
                                                    <div class="w-75 d-inline-block v-middle ps-3">
                                                        <h6 class="mb-1 bg-hover-primary fw-semibold"> Perfil </h6>
                                                        <span class="d-block text-dark">Configuración cuenta</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="d-grid py-4 px-7 pt-8">
                                                <a href="/vetting/modules/he_fo/logout.php?ind=<?= $_SESSION['Emp'] ?>" class="btn btn-outline-primary">Cerrar Sesión</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>

            <div class="contenido" style="padding-top: calc(40px + 15px); margin-left:20px;margin-right:20px; background-image: url('https://www.discolmedica.com.co/assets/img/background.png');   background-attachment: fixed;" cz-shortcut-listen="true">
                <script type="text/javascript" src="/vetting/modules/he_fo/script.js"></script>