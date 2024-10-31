<div class="table-responsive">
    <table class="table table-hover" id="tbMascotas">
        <thead>
            <tr>
                <th scope="col">Cod</th>
                <th scope="col">Chip</th>
                <th scope="col">Nombre</th>
                <th scope="col">Raza</th>
                <th scope="col">F. Nacimiento</th>
                <th scope="col">Edad</th>
                <th scope="col">Sexo</th>
                <th scope="col">Peso</th>
                <th scope="col">Patologia</th>
                <th scope="col">Agresión</th>
                <th scope="col">Historial</th>
                <th scope="col">Editar</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datos as $dt) {
                if ($dt['Estado'] == 1) {
                    $back = 'success';
                    $text = 'Activo';
                } else {
                    $back = 'danger';
                    $text = 'Inactivo';
                }

                $control = new Controller;
                // Obtención de raza, validar si es necesario
                $raza = $control->ObtRaza($dt['Raza']);
            ?>
                <tr> <!-- Se añade la apertura de la fila -->
                    <th scope="row"><?= $dt['Cod'] ?></th>
                    <td><?= $dt['Chip'] ?></td>
                    <td><?= $dt['Nombre'] ?></td>
                    <td><?= $raza ?></td>
                    <td><?= $dt['FechNaci'] ?></td>
                    <td><?php
                        //Calulo de la Edad Mascota, de acuerdo a la fecha de nacimineot y la fecha actual
                        $fechaNacimiento = $dt['FechNaci'];
                        $fechaActual = new DateTime();
                        $fechaNac = new DateTime($fechaNacimiento);
                        // Calcular la diferencia
                        $diferencia = $fechaActual->diff($fechaNac);
                        // Extraer años y meses de la diferencia
                        $anios = $diferencia->y;
                        $meses = $diferencia->m;
                        $edad = "{$anios} Años - {$meses} Meses";
                        echo $edad;
                        ?></td>
                    <td><?= $dt['Sexo'] ?></td>
                    <td><?= $dt['Peso'] ?></td>
                    <td><?= $dt['Patologia'] ?></td>
                    <td><?= $dt['Agresion'] . '%'?></td>
                    <td class="text-center"><button class="btn btn-info btn-sm" onclick="HistorialMasco(<?= $dt['idMasco'] ?>)" data-bs-toggle="modal" data-bs-target="#HistorialMasco"> <i class="fa-solid fa-file-medical fa-beat"></i></button></td>
                    <td class="text-center"> <button onclick="ChangeEstMasco(<?= $dt['idMasco'] ?>,'<?= $dt['Chip'] ?>',<?= $dt['Estado'] ?>)" class="btn btn-sm btn-<?= $back ?>"><?= $text ?></button></td>
                    <td class="text-center"><button class="btn btn-warning btn-sm" onclick="EditDataMasco(<?= $dt['idMasco'] ?>)"> <i class="fa-solid fa-pen-to-square"></i></button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>