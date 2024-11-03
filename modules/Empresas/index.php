<?php

include($_SERVER['DOCUMENT_ROOT'] . '/Vetting/modules/Empresas/controller/controller.php');
$control = new Controller;
$GetPlanes = $control->GetPlanes();
?>
<style>
    .header {
        display: flex;
        justify-content: space-between;
    }
</style>
<h3 class="title">Modulo de Empresas</h3>
<h5>Gestiona Tu empresas aliadas</h5>
<hr>
<div class="header">
    <div>
        <h4 class="title">Empresas Registradas</h4>
    </div>
    <div>
        <button class="btn btn-primary btn-sm title" data-bs-toggle="modal" data-bs-target="#insertEmpresa"> <i class="fa-solid fa-plus"></i>Crear</button>
    </div>
</div>
<hr>
<div class="listEmpresa" id="listEmpresa"></div>

<!-- Modal Creacion Plan -->
<div class="modal fade" id="insertEmpresa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 title" id="exampleModalLabel">Registra Tu Siguiente Empresa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="form-label ">Nombre De la Empresa</label>
                <input type="text" class="form-control form-control-sm  " id="EmpreNom">
                <label class="form-label">Nit Empresa // CC Representante </label>
                <input type="number" class="form-control form-control-sm  " id="EmpreNit">
                <label class="form-label">Nit Empresa // CC Representante Adjunto</label>
                <input type="file" class="form-control form-control-sm  " id="EmpreAdj">
                <label class="form-label ">Dirección De La Empresa</label>
                <input type="text" class="form-control form-control-sm  " id="EmpreDir">
                <label class="form-label">Nombre Representante Legal</label>
                <input type="text" class="form-control form-control-sm " id="EmpreRepre">
                <label class="form-label">CC Representante</label>
                <input type="number" class="form-control form-control-sm " id="EmpreRepreCC">
                <label class="form-label">Celular Representante</label>
                <input type="number" class="form-control form-control-sm " id="EmpreRepreTel">
                <label class="form-label">Contrato Firmado</label>
                <input type="file" class="form-control form-control-sm " id="EmpreContr">
                <label class="form-label">Correo Electronico</label>
                <input type="email" class="form-control form-control-sm " id="EmpreEmail">
                <label class="form-label ">Plan firmado:</label>
                <select class="form-select form-select-sm" id="PlanSelect">
                    <option selected></option>
                    <?php foreach ($GetPlanes as $Gp) { ?>
                        <option value="<?= $Gp['idTbPlanes'] ?>"><?= $Gp['PlanNom'] ?></option>
                    <?php } ?>
                </select>
                <input type="hidden" id="UsuCod" value="<?= $_SESSION['UsuCod'] ?>">
                <hr>
                <br>
                <center>
                    <button class="btn btn-primary" onclick="InsertEmp()"><i class="fa-solid fa-floppy-disk"></i> Crear</button>
                </center>
            </div>

        </div>
    </div>
</div>
<!-- Modal Visual Pdf -->
<div class="modal fade" id="mdPdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Visualización documentacion:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="viewPdf" id="viewPdf"></div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Actualizar Paquete -->
<div class="modal fade" id="BuyNewPlan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualiza tu Plan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="IdEmpreNew">
                <input type="text" id="NameEmpreNew">
                <p> <span class="text-danger">Nota:</span><br>
                    Tu paquete actual <span id="PaqueteAct"></span> Podria Caducar, Actualiza tu Poximo Paquete</p>
                <label class="form-label">Contrato Firmado</label>
                <input type="file" class="form-control form-control-sm " id="EmpreContrNew">
                <label class="form-label ">Plan firmado:</label>
                <select class="form-select form-select-sm" id="PlanSelectNew">
                    <option selected></option>
                    <?php foreach ($GetPlanes as $Gp) { ?>
                        <option value="<?= $Gp['idTbPlanes'] ?>"><?= $Gp['PlanNom'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="BuyNewPlan()"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/vetting/modules/Empresas/script.js"></script>