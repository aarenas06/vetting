<?php

include($_SERVER['DOCUMENT_ROOT'] . '/Vetting/modules/Empleados/controller/controller.php');
$control = new Controller;
$GetRol = $control->GetRol();
?>
<style>
    .header {
        display: flex;
        justify-content: space-between;
    }
</style>
<h3 class="title">Modulo de Empleados</h3>
<h5>Gestiona Tu Personal Administrativo</h5>
<hr>
<div class="row">
    <div class="col-lg-12">
        <div class="header">
            <div>
                <h4 class="title"> Personal registrado:</h4>
            </div>
            <div>
                <button class="btn btn-primary btn-sm title" data-bs-toggle="modal" data-bs-target="#insertEmp"> <i class="fa-solid fa-plus"></i> Agregar</button>
            </div>
        </div>
        <hr>
        <div class="ListEmp" id="ListEmp"></div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="insertEmp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="">Agregar Personal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="" class="form-label">Nombre:</label>
                        <input type="text" class="form-control form-control-sm" id="EmplNom">
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label">Apellido:</label>
                        <input type="text" class="form-control form-control-sm" id="EmplApel">
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label">Numero Identificación:</label>
                        <input type="number" class="form-control form-control-sm" id="EmplCc">
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label">Correo Electronico</label>
                        <input type="text" class="form-control form-control-sm" id="EmplEmail">
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label">Celular</label>
                        <input type="number" class="form-control form-control-sm" id="EmplCelu">
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label">Cedula:</label>
                        <input type="file" class="form-control form-control-sm" id="EmplAdjCel">
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label">Rol</label>
                        <select class="form-select form-select-sm" aria-label="" id="EmplRol">
                            <option selected></option>
                            <?php foreach ($GetRol as $Gr) { ?>
                                <option value="<?= $Gr['idTbRoles'] ?>"><?= $Gr['RolNom'] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label">Sexo</label>
                        <select class="form-select form-select-sm" aria-label="" id="EmpSex">
                            <option selected></option>
                            <option value="1">Maculino</option>
                            <option value="2">Femenino</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="InsertEmpl(this)">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal edit -->
<div class="modal fade" id="EditEmp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualiza Información:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control form-control-sm" id="EmpIdEdit">

                <div class="row">
                    <div class="col-lg-6">
                        <label for="" class="form-label">Nombre:</label>
                        <input type="text" class="form-control form-control-sm" id="EmpNomEdit">
                    </div>
                    <div class="col-lg-6">

                        <label for="" class="form-label">Contacto:</label>
                        <input type="text" class="form-control form-control-sm" id="EmpCelEdit">
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label">Email:</label>
                        <input type="text" class="form-control form-control-sm" id="EmpEmailEdit">
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label">Contraseña:</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-sm" id="EmpClaEdit">
                            <button class="btn btn-sm btn-primary" id="checkbtn"><i class="fa-solid fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="form-label">Rol:</label>
                        <select class="form-select form-select-sm" aria-label="" id="idTbRolesEdit">
                            <option selected></option>
                            <?php foreach ($GetRol as $Gr) { ?>
                                <option value="<?= $Gr['idTbRoles'] ?>"><?= $Gr['RolNom'] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" onclick="UpdateEmp()"><i class="fa-solid fa-floppy-disk"></i> Aceptar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal adjunto -->
<div class="modal fade" id="MdPdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adjunto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="viewPdf" style="display:none;">
                    <iframe id="pdfFrame" style="width:100%; height:600px;" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="Emp" value="<?= $_SESSION['Emp'] ?>">
<input type="hidden" id="UsuCod" value="<?= $_SESSION['UsuCod'] ?>">

<script type="text/javascript" src="/vetting/modules/Empleados/script.js"></script>
<script>
    $(document).ready(function() {
        let isPasswordVisible = true; // Variable para rastrear la visibilidad del campo

        $("#checkbtn").click(function() {
            // Cambiar el tipo del input
            if (isPasswordVisible) {
                $("#EmpClaEdit").attr("type", "text"); // Cambiar a texto
                $(this).html('<i class="fa-solid fa-eye"></i>'); // Cambiar el ícono a "ojo"
            } else {
                $("#EmpClaEdit").attr("type", "password"); // Cambiar a password
                $(this).html('<i class="fa-solid fa-eye-slash"></i>'); // Cambiar el ícono a "ojo tachado"
            }
            isPasswordVisible = !isPasswordVisible; // Alternar el estado de visibilidad
        });
    });
</script>