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
                <th scope="col">Contrato</th>
                <th scope="col">Adj</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $dt) {
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
                    <td><?= $dt['FechaTerminacion'] ?></td>
                    <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#mdPdf" onclick="ModalPdf('<?= $dt['EmpreContr'] ?>','<?= $dt['EmpreNom'] ?>')"><i class="fa-solid fa-file-pdf"></i></button></td>
                    <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdPdf" onclick="ModalPdf('<?= $dt['EmpreAdj'] ?>','<?= $dt['EmpreNom'] ?>')"><i class="fa-solid fa-id-card"></i></button></td>
                </tr>
            <?php  } ?>

        </tbody>
    </table>
</div>