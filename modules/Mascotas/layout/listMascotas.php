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
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $dt) {
                if ($dt['Estado'] == 1) {
                    $back = 'success';
                    $text = 'Activo';
                } else {
                    $back = 'danger';
                    $text = 'Innactivo';
                }

                $control = new Controller;
                // Obtención de raza, validar si es necesario
                $raza = $control->ObtRaza($dt['Raza']);
                // print_r($raza);
            ?>
                <>
                    <th scope="row"><?= $dt['Cod'] ?></th>
                    <td><?= $dt['Chip'] ?></td>
                    <td><?= $dt['Nombre'] ?></td>
                    <td><?= $raza ?></td>
                    <td><?= $dt['FechNaci'] ?></td>
                    <td><?= $dt['EdadMascota'] ?></td>
                    <td><?= $dt['Sexo'] ?></td>
                    <td><?= $dt['Peso'] ?></td>
                    <td><?= $dt['Patologia'] ?></td>
                    <td><?= $dt['Agresion'] ?></td>
                    <td class="text-center"><button class="btn btn-info btn-sm" onclick="HistorialMasco(<?= $dt['idMasco'] ?>)" data-bs-toggle="modal" data-bs-target="#HistorialMasco"> <i class="fa-solid fa-file-medical fa-beat"></i></button></td>
                    <td class="text-center"> <button onclick="ChangeEstMasco(<?= $dt['idMasco'] ?>,'<?= $dt['Chip'] ?>',<?= $dt['Estado'] ?>)" class="btn btn-sm btn-<?= $back ?>"><?= $text ?></button></td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
</div>