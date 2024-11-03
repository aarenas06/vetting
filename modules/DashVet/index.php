<?php

include($_SERVER['DOCUMENT_ROOT'] . '/Vetting/modules/Agenda/controller/controller.php');
$control = new Controller;
$GetService = $control->GetService($_SESSION['Emp']);
$ListEmp = $control->ListEmpl($_SESSION['Emp']);
?>
<style>
    .header {
        display: flex;
        justify-content: space-between;
    }

    .readonly-input {
        background-color: #e9ecef;
        /* Color de fondo gris */
        color: #6c757d;
        /* Color de texto gris */
        cursor: not-allowed;
        /* Cambia el cursor a "no permitido" */
    }




    .circle-img img {
        border-radius: 50%;
    }
</style>
<h3 class="title">Bienvenid@ <?= $_SESSION['Nombre'] ?></h3>
<h5>Gestiona tus compromisos</h5>
<hr>
<br>
<div class="row">
    <div class="col-lg-8">
        <div class="container" style="background-color: white;">
            <div id='calendar'></div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Citas de Hoy
            </div>
            <div class="card-body">
                <div class="" style="max-height: 710px;overflow-y: auto;">
                    <div class="citasHoyFor" id="citasHoyFor"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal desarrollo -->
<div class="modal fade" id="MdDesarrollo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Desarrollo Agenda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="display: flex; justify-content: space-between; ">
                    <div>
                        <p class="title">Usuario:<?= $_SESSION['Nombre'] ?> <br>
                            Fecha Actual: <?= date('d-m-Y'); ?><br>
                            Rol:<?= $_SESSION['RolObs'] ?></p>
                    </div>
                    <div>
                        <img src="/vetting/plantilla/assets/img/Vetconnect.png" width="80%" height="80%" alt="">
                    </div>
                </div>
                <hr>
                <div class="DesarrolloCita" id="DesarrolloCita"></div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="View" value="2">
<input type="hidden" id="Emp" value="<?= $_SESSION['Emp'] ?>">
<input type="hidden" id="UsuCod" value="<?= $_SESSION['UsuCod'] ?>">
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script type="text/javascript" src="/vetting/modules/DashVet/script.js"></script>
<script>
    PintarCalen();
</script>