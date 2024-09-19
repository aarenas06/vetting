<?php

include($_SERVER['DOCUMENT_ROOT'] . '/Vetting/modules/Mascotas/controller/controller.php');
$control = new Controller;
$Modulos = $control->GetModulos();
?>
<style> 
    .header {
        display: flex;
        justify-content: space-between;
    }
</style>
<h3 class="title">Modulo Mascotas</h3>
<h5>Gestiona tus Mascotas</h5>
<hr>
<div class="row">
    <div class="col-lg-8">
        <div class="header">
            <div>
                <h4 class="title">Planes Creados</h4>
            </div>
            <div>
                <button class="btn btn-primary btn-sm title" data-bs-toggle="modal" data-bs-target="#insertPlanModal"> <i class="fa-solid fa-plus"></i> Agregar</button>
            </div>
        </div>
        <hr>
        <div class="listPlanes" id="listPlanes"></div>
    </div>
    <div class="col-lg-4">
        <h4 class="title">Reconteo de Planes</h4>
        <hr>
        <h6>Aqui Iria un resumen ya cuando la empresa adquiera el servicio</h6>
    </div>
</div>
<!-- Modal Creacion Plan -->
<div class="modal fade" id="insertPlanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 title" id="exampleModalLabel">Crea Tu Siguiente Plan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="form-label ">Nombre Del Plan</label>
                <input type="text" class="form-control form-control-sm  " id="PlanNom">
                <label class="form-label">Vigencia Por Dias</label>
                <input type="number" class="form-control form-control-sm " id="PlanVigenciaDia">
                <label class="form-label">Costo</label>
                <input type="tel" class="form-control form-control-sm " id="PlanCosto" oninput="formatoConComas(this)">
                <label class="form-label">Vigencia Por Meses</label>
                <input type="number" class="form-control form-control-sm " id="PlanVigenciaMes">
                <hr>
                <label class="form-label ">Servicios:</label>
                <div class="row">
                    <?php foreach ($Modulos as $Md) { ?>
                        <div class="col-6">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="<?= $Md['IdoptServicios'] ?>">
                                <label class="form-check-label" for="<?= $Md['IdoptServicios'] ?>"><?= $Md['OptNombre'] ?></label>
                            </div>
                        </div>
                    <?php   } ?>
                </div>
                <br>
                <center>
                    <button class="btn btn-primary" onclick="InsertPlan()"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </center>
            </div>

        </div>
    </div>
</div>
<!-- Modal TbDetalle -->
<div class="modal fade" id="ModalDetalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detallado Plan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="tbDetalle" id="tbDetalle"></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Data -->
<div class="modal fade" id="ModalData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modifica Plan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ListData" id="ListData"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/vetting/modules/Planes/script.js"></script>