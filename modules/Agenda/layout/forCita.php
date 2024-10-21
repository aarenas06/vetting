<?php foreach ($data as $dt) {
    // Fecha de nacimiento de la mascota
    $Naci = new DateTime($dt['MascoFechNac']);
    $hoy = new DateTime(); // Fecha actual
    $edad = $hoy->diff($Naci); // Calculamos la diferencia

    // Obtener fecha de la cita
    $fechaCita = new DateTime($dt['CitaDate']); // Asumo que esta es la fecha de la cita
    $horaCita = $fechaCita->format('g:i A'); // Formato 12 horas con AM/PM
?>
    <div class="card" style="box-shadow: 4px 4px 4px 4px gray;">
        <div class="card-body">
            <h5 class="card-title">Propietario: <?= $dt['UsuNom'] ?></h5>
            <p class="card-text">Mascota: <?= $dt['MascoNom'] ?> <br>
                Edad: <?= $edad->y ?> años y <?= $edad->m ?> meses <br>
                Hora: <?= $horaCita ?> <br>
                Servicio: <?= $dt['OptNombre'] ?></p>
        </div>
    </div>
<?php } ?>