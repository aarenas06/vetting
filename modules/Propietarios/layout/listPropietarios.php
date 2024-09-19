<div class="table-responsive">
    <table class="table table-hover" id="tbPropietarios">
        <thead>
            <tr>
                <th scope="col">Nombre Propietario</th>
                <th scope="col">Identificación</th>
                <th scope="col">Telefono</th>
                <th scope="col">Dir Residencia</th>
                <th scope="col">Email</th>
                <th scope="col">User Propietario</th>
                <th scope="col">Opt</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $Propietarios) { ?>
                <tr>
                    <td><?= $Propietarios['UsuNom']; ?></td>
                    <td><?= number_format($Propietarios['UsuCC'], 0, '', '.'); ?></td>
                    <td><?= $Propietarios['UsuCel']; ?></td>
                    <td><?= $Propietarios['UsuDirec']; ?></td>
                    <td><?= $Propietarios['UsuEmail']; ?></td>
                    <td><?= $Propietarios['UsuUser']; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary btn-sm" onclick="GetDataPropietarios(<?= $Propietarios['idTbUsuarios'] ?>,<?= $Propietarios['idTbRoles'] ?>)" data-bs-toggle="modal" data-bs-target="#ModalUpdatePropietarios"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="DeletePropietarios(<?= $Propietarios['idTbUsuarios'] ?>)" data-bs-toggle="modal"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </td>
                </tr>
            <?php    } ?>
        </tbody>
    </table>
</div>