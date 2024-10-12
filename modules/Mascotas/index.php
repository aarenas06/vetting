<?php

include($_SERVER['DOCUMENT_ROOT'] . '/Vetting/modules/Mascotas/controller/controller.php');
$control = new Controller;
$Modulos = $control->GetModulos();
$UsuCod = $_SESSION['UsuCod'];
?>
<style>
    .header {
        display: flex;
        justify-content: space-between;
    }

    /* Estilos para la barra de Agresividad */
    .slider-container {
        width: 80%;
        margin: 20px auto;
    }

    .slider-label {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
    }

    input[type="range"] {
        width: 100%;
        -webkit-appearance: none;
        appearance: none;
        background-color: #bbb;
        height: 6px;
        border-radius: 5px;
        outline: none;
        background-image: linear-gradient(#007bff, #007bff);
        background-size: 0% 100%;
        background-repeat: no-repeat;
    }

    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 15px;
        height: 15px;
        background: #007bff;
        border-radius: 50%;
        cursor: pointer;
    }

    input[type="range"]::-moz-range-thumb {
        width: 15px;
        height: 15px;
        background: #007bff;
        border-radius: 50%;
        cursor: pointer;
    }
</style>
<script type="text/javascript" src="/vetting/modules/Mascotas/script.js" defer></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<h3 class="title">Modulo Mascotas</h3>
<h5>Gestiona tus Mascotas</h5>
<hr>
<div class="row">
    <input type="hidden" id="UsuCod" value="<?php echo $UsuCod;?>">
    <div class="col-lg-12">
        <div class="header">
            <div>
                <h4 class="title">Macotas Creadas</h4>
            </div>
            <div>
                <button class="btn btn-primary btn-sm title" data-bs-toggle="modal" data-bs-target="#insertMascota"> <i class="fa-solid fa-plus"></i> Agregar</button>
            </div>
        </div>
        <hr>
        <div class="listMascotas" id="listMascotas"></div>
    </div>

</div>
<!-- Modal New Mascota -->
<div class="modal fade" id="insertMascota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color:#F2F3F4;">
            <div class="modal-header">
                <h1 class="modal-title fs-5 title" id="exampleModalLabel">Crea Tu Mascota <i class="fa-solid fa-paw"></i></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="UsuCod" value="<?= $_SESSION['UsuCod']; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label ">Nombre</label>
                        <input type="text" class="form-control form-control-sm" id="MascoNom">
                        <label class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control form-control-sm" id="MascoFecNaci" onchange="MascoFecNaci()">
                        <label class="form-label ">Sexo</label>
                        <Select class="form-control form-control-sm" id="MascoSexo">
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                        </Select>
                        <label class="form-label ">Pelaje</label>
                        <input type="text" class="form-control form-control-sm" id="MascoPelaje">
                        <label class="form-label">Comida que Consume</label>
                        <input type="text" class="form-control form-control-sm" id="MascoComida">
                        <label class="form-label">Último Celo</label>
                        <input type="text" class="form-control form-control-sm" id="MascoCelo">
                        <label class="form-label">¿Esta en adopción?</label>
                        <Select class="form-control form-control-sm" id="MascoAdopcion">
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </Select>

                    </div>
                    <div class="col-md-6">
                        <label class="form-label ">Raza</label>
                        <Select class="form-control form-control-sm" id="MascoRaza">
                            <option value="" disabled selected>Seleccione...</option>
                            <?php $controller->selectRaza(); ?>
                        </Select>
                        <label class="form-label">Edad Mascota</label>
                        <input type="text" class="form-control form-control-sm" id="MascoEdad" disabled>
                        <!-- <label class="form-label">Raza</label>
                        <input type="text" class="form-control form-control-sm" id="MascoRaza"> -->
                        <label class="form-label">Peso</label>
                        <input type="text" class="form-control form-control-sm" id="MascoPeso">
                        <label class="form-label">Vivienda / ¿Con qué otros animales convive?</label>
                        <input type="text" class="form-control form-control-sm" id="MascoVivienda">
                        <label class="form-label">Chip</label>
                        <input type="text" class="form-control form-control-sm" id="MascoChip" disabled>
                        <div class="slider-container">
                            <div class="slider-label">
                                <label class="form-label" for="agresividad">Agresividad</label>
                                <span id="porcentaje"></span>
                            </div>
                            <input type="range" id="Mascoagresividad" min="0" max="100" value="0" oninput="updatePorcentaje(this)">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="MascoPatologia"></textarea>
                            <label for="floatingTextarea">Patologias PreExistentes</label>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="MascoFotoNombre" placeholder="Foto de Tu Mascota" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                            <input type="file" id="MascoFotoInput" style="display: none;" accept=".jpg,.jpeg,.png" onchange="updateFileName()">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="document.getElementById('MascoFotoInput').click();">Seleccionar</button>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>

                <br>
                <center>
                    <button class="btn btn-primary" onclick="InsertMascota()"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
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


<!-- Modal Historial clinico Masco -->
<div class="modal fade modal-lg" id="HistorialMasco" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Hc"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="InfoHistorial"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>