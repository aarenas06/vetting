<?php

// Fecha de nacimiento de la mascota
$Naci = new DateTime($dt['MascoFechNac']);
$hoy = new DateTime(); // Fecha actual
$edad = $hoy->diff($Naci); // Calculamos la diferencia

// Obtener fecha de la cita
$fechaCita = new DateTime($dt['CitaDate']); // Asumo que esta es la fecha de la cita
$horaCita = $fechaCita->format('g:i A'); // Formato 12 horas con AM/PM


?>
<div class="row">
    <div class="col-lg-4">
        <div style="flex-grow: 1; text-align: center;">
            <h5 class="title">Datos Mascota</h5>
        </div>

        <input type="hidden" id="idTbCitas" value="<?= $dt['idTbCitas'] ?>">
        <div class="row">
            <center>
                <div class="circle-img">
                    <img src="data:image/jpeg;base64,<?php echo $dt['pic']; ?>"
                        alt="Foto"
                        class="img-fluid"
                        style="width: 150px; height: 150px; border-radius: 50%; border: 3px solid black; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5), 0px -4px 6px rgba(255, 255, 255, 0.2);">
                </div>
            </center>
            <div class="col-lg-6">
                <label for="" class="form-label">Ide Mascota:</label>
                <input type="text" class="form-control form-control-sm readonly-input" value="<?= $dt['MascoCod'] ?>" id="MacoCod" readonly>
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">Nombre:</label>
                <input type="text" class="form-control form-control-sm readonly-input" value="<?= $dt['MascoNom'] ?>" id="MascoNom" readonly>
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">Fecha Nacimiento:</label>
                <input type="text" class="form-control form-control-sm readonly-input" value="<?= $dt['MascoFechNac'] ?>" id="MascoFechNac" readonly>
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">Edad:</label>
                <input type="text" class="form-control form-control-sm readonly-input" value=" <?= $edad->y ?> años y <?= $edad->m ?> meses" id="MascoEdad" readonly>
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">Especie:</label>
                <input type="text" class="form-control form-control-sm readonly-input" value="<?= $dt['EspeNom'] ?>" id="EspeNom" readonly>
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">Raza:</label>
                <input type="text" class="form-control form-control-sm readonly-input" value="<?= $dt['RazNom'] ?>" id="RazNom" readonly>
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">Pelaje:</label>
                <input type="text" class="form-control form-control-sm readonly-input" value="<?= $dt['MascoPelaje'] ?>" id="MascoPelaje" readonly>
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">Agresividad:</label> <br>
                <div class="progress" role="progressbar" aria-label="Info example" style="margin-top: 9px; border: 1px solid gray; height: 16px;" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-info" id="barraAgresion" style="width: <?= $dt['MascoAgresion'] ?>%"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">Comida Habitual:</label>
                <input type="text" class="form-control form-control-sm readonly-input" value="<?= $dt['RazNom'] ?>" id="RazNom" readonly>
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">Patologias:</label>
                <textarea name="" class="form-control readonly-input" id="MascoPatologia"><?= $dt['MascoPatologia'] ?></textarea>
            </div>
        </div>
        <hr>

    </div>
    <div class="col-lg-4">
        <h5 class="title text-center">Datos Propietario</h5>
        <div class="row">
            <div class="col-lg-6">
                <label for="" class="form-label">Nombre:</label>
                <input type="text" class="form-control form-control-sm readonly-input" value="<?= $dt['UsuNom'] ?>" id="UsuNom" readonly>
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">N° Identidad:</label>
                <input type="text" class="form-control form-control-sm readonly-input" value="<?= $dt['UsuCC'] ?>" id="UsuCC" readonly>
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">N° Contacto:</label>
                <input type="text" class="form-control form-control-sm readonly-input" value="<?= $dt['UsuCel'] ?>" id="UsuCel" readonly>
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">Email:</label>
                <input type="text" class="form-control form-control-sm readonly-input" value="<?= $dt['UsuDirec'] ?>" id="UsuDirec" readonly>
            </div>
        </div>
        <hr>
        <h5 class="title text-center">Datos Cita</h5>
        <div class="row">
            <div class="col-lg-6">
                <label for="" class="form-label">Nombre de Cita :</label>
                <input type="text" class="form-control form-control-sm readonly-input" value="<?= $dt['CitaNom'] ?>" id="CitaNom">
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">Tipo de Servicio :</label>
                <input type="text" class="form-control form-control-sm readonly-input" value="<?= $dt['OptNombre'] ?>" id="OptNombre">
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">Fecha/hora inicio:</label>
                <input type="datetime-local" class="form-control form-control-sm readonly-input " value="<?= $dt['CitaDate'] ?>" id="CitaDate">
            </div>
            <div class="col-lg-6">
                <label for="" class="form-label">Usuario Programa:</label>
                <input type="text" class="form-control form-control-sm readonly-input " value="<?= $dt['EmpNom'] ?>" id="CitaDate">
            </div>
            <div class="col-lg-12"> <br>
                <label for="" class="form-label">Observación :</label>
                <textarea class="form-control readonly-input" placeholder="" id="CitaObs" style="height: 100px"><?= $dt['CitaObs'] ?></textarea>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div style="flex-grow: 1; text-align: center;">
            <h5 class="title">Gestión Agenda</h5>
        </div>
        <?php if ($dt['IND'] == 's') { ?>
            <div class="mb-3">
                <label for="" class="form-label">Estado Cita: <span style="color:red;">*</span></label>
                <select class="form-select" aria-label="Default select example" id="HisEst">
                    <option selected></option>
                    <option value="1">Confirmada</option>
                    <option value="0">Rechazada</option>
                </select>
                <label for="" class="form-label">Resultados-Recomendaciones: <span style="color:red;">*</span></label>
                <textarea class="form-control" id="HisObserv" rows="3"></textarea>
                <label for="" class="form-label">Adjunto Soporte :</label>
                <input type="file" class="form-control" id="HisAdj">
            </div>
            <br><br>
            <center>
                <button class="btn btn-primary btn-sm" onclick="InsertHisto()"><i class="fa-solid fa-floppy-disk"></i> Guardar Proceso</button>
            </center>
        <?php  } else { ?>
            <p class="title">Esta Cita ya fue desarrollada</p>
        <?php   } ?>

    </div>
</div>