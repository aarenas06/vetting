<div class="table-responsive">
    <table class="table" id="tb2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nit</th>
                <th scope="col">Empresa</th>
                <th scope="col">Representante</th>
                <th scope="col">Ide Representante</th>
                <th scope="col">Telefono</th>
                <th scope="col">Estado</th>
                <th scope="col">Plan Activo</th>
                <th scope="col">Fecha Activación</th>
                <th scope="col">Fecha Finalización</th>
                <th scope="col">OPT</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $dt) {
                $fechaTerminacion = $dt['FechaTerminacion'];

                // Convertir la fecha de terminación a un objeto DateTime
                $fechaTerminacionObj = new DateTime($fechaTerminacion);
                $fechaActual = new DateTime(); // Obtener la fecha actual

                // Calcular la diferencia en días
                $diferencia = $fechaActual->diff($fechaTerminacionObj);

                if ($diferencia->invert == 1) {
                    // Si la diferencia es negativa (invert es 1), significa que ya ha pasado la fecha
                    $clase = "bg-danger"; // Clase para vencido
                } elseif ($diferencia->days <= 15) {
                    // Si faltan 15 días o menos
                    $clase = "bg-warning"; // Clase para advertencia
                } else {
                    // Si faltan más de 15 días
                    $clase = "bg-success"; // Clase por defecto (sin alerta)
                }


                if ($dt['EmpreEst'] == 1) {
                    $back = 'success';
                    $text = 'Activo';
                } else {
                    $back = 'danger';
                    $text = 'Innactivo';
                } ?>
                <tr>
                    <th scope="row"><?= $dt['idTbEmpresas'] ?></th>
                    <td><?= $dt['EmpreNit'] ?></td>
                    <td><?= $dt['EmpreNom'] ?></td>
                    <td><?= $dt['EmpreRepre'] ?></td>
                    <td><?= $dt['EmpreRepreCC'] ?></td>
                    <td><?= $dt['EmpreRepreTel'] ?></td>
                    <td class="text-center"> <button onclick="ChangeEstEmp(<?= $dt['idTbEmpresas'] ?>,<?= $dt['EmpreEst'] ?>)" class="btn btn-sm btn-<?= $back ?>"><?= $text ?></button></td>
                    <td><?= $dt['PlanNom'] ?></td>
                    <td><?= $dt['HistPagoFec'] ?></td>
                    <td class="<?= $clase ?>" style="cursor: pointer;" data-bs-toggle="modal" onclick="OpenNewPla(<?= $dt['idTbEmpresas'] ?>,'<?= $dt['EmpreNom'] ?>')" data-bs-target="#BuyNewPlan"><?= $fechaTerminacion ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#mdPdf" onclick="ModalPdf('<?= $dt['EmpreContr'] ?>','<?= $dt['EmpreNom'] ?>')"><i class="fa-solid fa-file-pdf"></i></button>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mdPdf" onclick="ModalPdf('<?= $dt['EmpreAdj'] ?>','<?= $dt['EmpreNom'] ?>')"><i class="fa-solid fa-id-card"></i></button>
                            <a type="button" href="/vetting/Empresa.php?PreDict=<?= $dt['EmpreNit'] ?>&pack=<?= $dt['EmpreTok'] ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa-solid fa-link"></i></a>
                        </div>
                    </td>
                </tr>
            <?php  } ?>

        </tbody>
    </table>
</div>