<div class="table-responsive">
    <table class="table table-hover  " id="tb1">
        <thead>
            <tr>
                <th scope="col">Ide</th>
                <th scope="col">Nombre</th>
                <th scope="col">Usuario</th>
                <th scope="col">Rol</th>
                <th scope="col">Estado</th>
                <th scope="col">Contacto</th>
                <th scope="col">Email</th>
                <th scope="col">Fech_Crea</th>
                <th scope="col">Usu_Crea</th>
                <th scope="col">Opt</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $dt) {
                if ($dt['EmpEst'] == 1) {
                    $back = 'success';
                    $text = 'Activo';
                } else {
                    $back = 'danger';
                    $text = 'Innactivo';
                } ?>
                <tr>
                    <th scope="row"><?= $dt['EmpNit'] ?></th>
                    <td><?= $dt['Nom'] ?></td>
                    <td><?= $dt['UsuCod'] ?></td>
                    <td><?= $dt['RolNom'] ?></td>
                    <td class="text-center"> <button onclick="ChangeEstEmpl(<?= $dt['idTbEmpleados'] ?>,<?= $dt['EmpEst'] ?>)" class="btn btn-sm btn-<?= $back ?>"><?= $text ?></button></td>
                    <td><?= $dt['EmpCel'] ?></td>
                    <td><?= $dt['EmpEmail'] ?></td>
                    <td><?= $dt['EmpFechCrea'] ?></td>
                    <td><?= $dt['UsuCrea'] ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#EditEmp" onclick="infoEmp(<?= $dt['idTbEmpleados'] ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#MdPdf" onclick="OpenPdf('<?= $dt['EmpreNom'] ?>','<?= $dt['UsuCod'] ?>')"><i class="fa-solid fa-address-card"></i></button>
                        </div>
                    </td>
                </tr>
            <?php    } ?>

        </tbody>
    </table>
</div>