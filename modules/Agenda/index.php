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
<h3 class="title">Modulo de Agenda:</h3>
<h5>Gestiona Tu calendario</h5>
<hr>
<div class="header">
    <div>
        <h4 class="title">Eventos Registrados:</h4>
    </div>
    <div>
        <button class="btn btn-primary btn-sm title" data-bs-toggle="modal" data-bs-target="#CrearAgenda"> <i class="fa-solid fa-plus"></i>Crear</button>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-8" style="margin-top:10px;">
        <div class="container" style="background-color: white;">
            <div id='calendar'></div>
        </div>
    </div> <br><br>
    <div class="col-lg-4" style="margin-top:10px;">
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

<!-- Modal -->
<div class="modal fade" id="CrearAgenda" data-bs-target="#staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agendar Una Cita</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="display: flex; justify-content: space-between; ">
                    <div>
                        <p class="title">Usuario:<?= $_SESSION['Nombre'] ?> <br>
                            Fecha Actual: <?= date('d-m-Y H:i'); ?><br>
                            Rol:<?= $_SESSION['RolObs'] ?></p>
                    </div>
                    <div>
                        <img src="/vetting/plantilla/assets/img/Vetconnect.png" width="80%" height="80%" alt="">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div style="flex-grow: 1; text-align: center;">
                                <h5 class="title">Datos Mascota</h5>
                            </div>
                            <div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-plus"></i> Nueva
                                    </button>
                                    <ul class="dropdown-menu" style="padding: 5px;">
                                        <li style="cursor: pointer;" onclick="Vent('Clientes')">Propietario</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li style="cursor: pointer;" onclick="Vent('Pacientes')">Mascota</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="idtbMascotas">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="" class="form-label">Ide Mascota:</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control form-control-sm" id="MacoCod">
                                    <button class="btn btn-primary btn-sm" onclick="GetMasco(this)"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">Nombre:</label>
                                <input type="text" class="form-control form-control-sm readonly-input" id="MascoNom" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">Fecha Nacimiento:</label>
                                <input type="text" class="form-control form-control-sm readonly-input" id="MascoFechNac" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">Edad:</label>
                                <input type="text" class="form-control form-control-sm readonly-input" id="MascoEdad" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">Especie:</label>
                                <input type="text" class="form-control form-control-sm readonly-input" id="EspeNom" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">Raza:</label>
                                <input type="text" class="form-control form-control-sm readonly-input" id="RazNom" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">Pelaje:</label>
                                <input type="text" class="form-control form-control-sm readonly-input" id="MascoPelaje" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">Agresividad:</label> <br>
                                <div class="progress" role="progressbar" aria-label="Info example" style="margin-top: 9px; border: 1px solid gray; height: 16px;" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-info" id="barraAgresion" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="title text-center">Datos Propietario</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="" class="form-label">Nombre:</label>
                                <input type="text" class="form-control form-control-sm readonly-input" id="UsuNom" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">N° Identidad:</label>
                                <input type="text" class="form-control form-control-sm readonly-input" id="UsuCC" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">N° Contacto:</label>
                                <input type="text" class="form-control form-control-sm readonly-input" id="UsuCel" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">Email:</label>
                                <input type="text" class="form-control form-control-sm readonly-input" id="UsuDirec" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="title text-center">Datos Cita</h5>
                        <?php if ($_SESSION['Rol'] == 4) { ?>
                            <input type="hidden" id="UsuCod" value="<?= $_SESSION['UsuCod'] ?>">
                        <?php } else { ?>
                            <label for="" class="form-label">Personal Encargado :</label>
                            <select class="form-select form-select-sm" id="UsuCod" aria-label="Small select example">
                                <option selected></option>
                                <?php foreach ($ListEmp as $Le) {
                                    echo '<option value="' . $Le['idTbEmpleados'] . '">' . $Le['EmpNom'] . '</option>';
                                } ?>
                            </select>
                        <?php  } ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="" class="form-label">Nombre de Cita :</label>
                                <input type="text" class="form-control form-control-sm " id="CitaNom">
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">Tipo de Servicio :</label>
                                <select class="form-select form-select-sm" aria-label="Default select example" id="idTbServicios">
                                    <option selected></option>
                                    <?php foreach ($GetService as $Gs) { ?>
                                        <option value="<?= $Gs['idServi'] ?>"><?= $Gs['Servicio'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">Fecha/hora inicio:</label>
                                <input type="datetime-local" class="form-control form-control-sm " id="CitaDate" onchange="CalculeFin()">
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">Fecha/hora Fin:</label>
                                <input type="datetime-local" class="form-control form-control-sm " id="CitaDateFin">
                            </div>

                            <div class="col-lg-12"> <br>
                                <label for="" class="form-label">Observación :</label>
                                <textarea class="form-control" placeholder="Comentarios importantes " id="CitaObs" style="height: 100px"></textarea>
                            </div>

                            <input type="hidden" class="form-control form-control-sm " id="citaPre">
                        </div>
                    </div>
                </div>
                <hr>
                <center>
                    <div class="col-2">
                        <button class="btn btn-primary btn-sm btn-block" onclick="InsertAgen()"><i class="fa-solid fa-floppy-disk"></i> Agendar</button>
                    </div>
                </center>
            </div>

        </div>
    </div>
</div>
<input type="hidden" id="Emp" value="<?= $_SESSION['Emp'] ?>">
<script type="text/javascript" src="/vetting/modules/Agenda/script.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<input type="hidden" id="View" value="1">
<script>
    PintarCalen();

    function Vent(mod) {
        window.open("/vetting/modules/principal.php?p=" + mod + "/index", "v entana1", "w idth=600,height=500,scrollbars=NO")
    }
</script>