<table class="table table-sm table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col" class="tex-center">Nombre Modulo</th>
            <th scope="col" class="tex-center">Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) {
            if ($dt['Est'] == 1) {
                $back = 'success';
                $text = 'Activo';
            } else {
                $back = 'danger';
                $text = 'Innactivo';
            }
        ?>
            <tr>
                <th scope="row" class="tex-center"><?= $dt['OptNombre'] ?></th>
                <td class="text-center"> <button onclick="ChangeEst(<?= $dt['IdoptServicios'] ?>,<?= $dt['idPlan'] ?>,<?= $dt['Est'] ?>)" class="btn btn-sm btn-<?= $back ?>"><?= $text ?></button></td>
            </tr>
        <?php  } ?>
    </tbody>
</table>