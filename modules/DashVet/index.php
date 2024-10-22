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
<input type="hidden" id="View" value="2">
<input type="hidden" id="Emp" value="<?= $_SESSION['Emp'] ?>">
<input type="hidden" id="UsuCod" value="<?= $_SESSION['UsuCod'] ?>">
<script type="text/javascript" src="/vetting/modules/Agenda/script.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>
    PintarCalen();
</script>