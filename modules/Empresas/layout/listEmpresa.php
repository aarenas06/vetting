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
            <th scope="col">Contrato</th>
            <th scope="col">Adj</th>
            <th scope="col">opt</th>
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
                <td><button class="btn btn-danger"><i class="fa-solid fa-file-pdf"></i></button></td>
                <td><button class="btn btn-primary"><i class="fa-solid fa-id-card"></i></button></td>
                <td></td>

            </tr>
        <?php  } ?>

    </tbody>
</table>