<?php

include($_SERVER['DOCUMENT_ROOT'] . '/Vetting/modules/Clientes/controller/controller.php');
$control = new Controller;
$Modulos = $control->GetModulos();
?>
<style>
    .header {
        display: flex;
        justify-content: space-between;
    }
</style>
<h3 class="title">Modulo Clientes</h3>
<h5>Gestión Tus Clientes</h5>
<hr>
<div class="row">
    <div class="col-lg-12">
        <div class="header">
            <div>
                <h4 class="title">Crear Clientes</h4>
            </div>
            <div>
                <button class="btn btn-primary btn-sm title" data-bs-toggle="modal" data-bs-target="#insertPropietarios"> <i class="fa-solid fa-plus"></i> Agregar</button>
            </div>
        </div>
        <hr>
        <div class="listPropietarios" id="listPropietarios"></div>
    </div>

</div>
<!-- Modal Creacion Clientes -->
<div class="modal fade" id="insertPropietarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 title" id="exampleModalLabel">Crear Clientes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="form-label ">Nombre Del Propietario</label>
                <input type="text" class="form-control form-control-sm  " id="NomPropietarios">
                <label class="form-label">Identificación</label>
                <input type="number" class="form-control form-control-sm " id="IdentPropietarios">
                <label class="form-label">Telefono</label>
                <input type="number" class="form-control form-control-sm " id="TelPropietarios">
                <label class="form-label">Dirección Residencial</label>
                <input type="text" class="form-control form-control-sm " id="DirPropietarios">
                <label class="form-label">Correo Electronico</label>
                <input type="text" class="form-control form-control-sm " id="EmailPropietarios">
                <label class="form-label">Sexo</label>
                <select class="form-select form-select-sm" id="SexPro">
                    <option selected></option>
                    <option value="0">Masculino</option>
                    <option value="1">Femino</option>
                </select>
                <hr>
                <br>
                <center>
                    <button class="btn btn-primary" onclick="InsertPropietarios()"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- Modal TbDetalle -->
<div class="modal fade" id="ModalUpdatePropietarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Propietario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="" id="UptIdUsuario">
                <input type="hidden" class="" id="UpIdtRol">
                <label class="form-label ">Nombre Del Propietario</label>
                <input type="text" class="form-control form-control-sm" id="UptNomPropietarios">
                <label class="form-label">Identificación</label>
                <input type="number" class="form-control form-control-sm" id="UptIdentPropietarios">
                <label class="form-label">Telefono</label>
                <input type="number" class="form-control form-control-sm" id="UptTelPropietarios">
                <label class="form-label">Dirección Redencial</label>
                <input type="text" class="form-control form-control-sm" id="UptDirPropietarios">
                <label class="form-label">Correo Electronico</label>
                <input type="text" class="form-control form-control-sm" id="UptEmailPropietarios">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control form-control-sm" id="UptUsuPropietarios">
                <label class="form-label">Clave</label>
                <div class="input-group">
                    <input type="password" class="form-control form-control-sm" id="UptPassPropietarios">
                    <button class="btn btn-outline-secondary" type="button" id="togglePasswordUpt">Mostrar</button>
                </div>
                <hr>
                <br>
                <center>
                    <button class="btn btn-success" onclick="UpdatePropietarios()"><i class="fa-solid fa-pen-nib"></i> Actualizar</button>
                </center>
            </div>
        </div>
    </div>
    <input type="hidden" id="Emp" value="<?= $_SESSION['Emp'] ?>">
</div>
<script type="text/javascript" src="/vetting/modules/Clientes/script.js"></script>